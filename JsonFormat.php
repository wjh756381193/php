<?php 
/**
 * Author:wjh
 * Date:2015-01-09 03:23
 * $array:要进行编码的数组
 * @param :$array 处理后的数组 此时用json_encode()不会产生乱码的问题
 */
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
    static $recursive_counter = 0;
    if (++$recursive_counter > 1000) {
        die('possible deep recursion attack');
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }

        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
    $recursive_counter--;
}

    /**************************************************************
 	 *
 	 *  将数组转换为JSON字符串（兼容中文）
 	 *  @param  array   $array      要转换的数组
 	 *  @return string      转换得到的json字符串
 	 *  @access public
 	 *
 	 ************************************************************
     */
function JSON($array) {
    arrayRecursive($array, 'urlencode', true);
    $json = json_encode($array);
    return urldecode($json);
}
// 把任意的变量转换为相应的对象或者json
function encode($var)
	{
		switch (gettype($var)) {
			case 'boolean':
				return $var ? 'true' : 'false';

			case 'NULL':
				return 'null';

			case 'integer':
				return (int) $var;

			case 'double':
			case 'float':
				return str_replace(',','.',(float)$var); // locale-independent representation

			case 'string':
				if (($enc=strtoupper(Yii::app()->charset))!=='UTF-8')
					$var=iconv($enc, 'UTF-8', $var);

				if(function_exists('json_encode'))
					return json_encode($var);

				// STRINGS ARE EXPECTED TO BE IN ASCII OR UTF-8 FORMAT
				$ascii = '';
				$strlen_var = strlen($var);

			   /*
				* Iterate over every character in the string,
				* escaping with a slash or encoding to UTF-8 where necessary
				*/
				for ($c = 0; $c < $strlen_var; ++$c) {

					$ord_var_c = ord($var{$c});

					switch (true) {
						case $ord_var_c == 0x08:
							$ascii .= '\b';
							break;
						case $ord_var_c == 0x09:
							$ascii .= '\t';
							break;
						case $ord_var_c == 0x0A:
							$ascii .= '\n';
							break;
						case $ord_var_c == 0x0C:
							$ascii .= '\f';
							break;
						case $ord_var_c == 0x0D:
							$ascii .= '\r';
							break;

						case $ord_var_c == 0x22:
						case $ord_var_c == 0x2F:
						case $ord_var_c == 0x5C:
							// double quote, slash, slosh
							$ascii .= '\\'.$var{$c};
							break;

						case (($ord_var_c >= 0x20) && ($ord_var_c <= 0x7F)):
							// characters U-00000000 - U-0000007F (same as ASCII)
							$ascii .= $var{$c};
							break;

						case (($ord_var_c & 0xE0) == 0xC0):
							// characters U-00000080 - U-000007FF, mask 110XXXXX
							// see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
							$char = pack('C*', $ord_var_c, ord($var{$c+1}));
							$c+=1;
							$utf16 =  self::utf8ToUTF16BE($char);
							$ascii .= sprintf('\u%04s', bin2hex($utf16));
							break;

						case (($ord_var_c & 0xF0) == 0xE0):
							// characters U-00000800 - U-0000FFFF, mask 1110XXXX
							// see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
							$char = pack('C*', $ord_var_c,
										 ord($var{$c+1}),
										 ord($var{$c+2}));
							$c+=2;
							$utf16 = self::utf8ToUTF16BE($char);
							$ascii .= sprintf('\u%04s', bin2hex($utf16));
							break;

						case (($ord_var_c & 0xF8) == 0xF0):
							// characters U-00010000 - U-001FFFFF, mask 11110XXX
							// see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
							$char = pack('C*', $ord_var_c,
										 ord($var{$c+1}),
										 ord($var{$c+2}),
										 ord($var{$c+3}));
							$c+=3;
							$utf16 = self::utf8ToUTF16BE($char);
							$ascii .= sprintf('\u%04s', bin2hex($utf16));
							break;

						case (($ord_var_c & 0xFC) == 0xF8):
							// characters U-00200000 - U-03FFFFFF, mask 111110XX
							// see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
							$char = pack('C*', $ord_var_c,
										 ord($var{$c+1}),
										 ord($var{$c+2}),
										 ord($var{$c+3}),
										 ord($var{$c+4}));
							$c+=4;
							$utf16 = self::utf8ToUTF16BE($char);
							$ascii .= sprintf('\u%04s', bin2hex($utf16));
							break;

						case (($ord_var_c & 0xFE) == 0xFC):
							// characters U-04000000 - U-7FFFFFFF, mask 1111110X
							// see http://www.cl.cam.ac.uk/~mgk25/unicode.html#utf-8
							$char = pack('C*', $ord_var_c,
										 ord($var{$c+1}),
										 ord($var{$c+2}),
										 ord($var{$c+3}),
										 ord($var{$c+4}),
										 ord($var{$c+5}));
							$c+=5;
							$utf16 = self::utf8ToUTF16BE($char);
							$ascii .= sprintf('\u%04s', bin2hex($utf16));
							break;
					}
				}

				return '"'.$ascii.'"';

			case 'array':
			   /*
				* As per JSON spec if any array key is not an integer
				* we must treat the the whole array as an object. We
				* also try to catch a sparsely populated associative
				* array with numeric keys here because some JS engines
				* will create an array with empty indexes up to
				* max_index which can cause memory issues and because
				* the keys, which may be relevant, will be remapped
				* otherwise.
				*
				* As per the ECMA and JSON specification an object may
				* have any string as a property. Unfortunately due to
				* a hole in the ECMA specification if the key is a
				* ECMA reserved word or starts with a digit the
				* parameter is only accessible using ECMAScript's
				* bracket notation.
				*/

				// treat as a JSON object
				if (is_array($var) && count($var) && (array_keys($var) !== range(0, sizeof($var) - 1))) {
					return '{' .
						   join(',', array_map(array('CJSON', 'nameValue'),
											   array_keys($var),
											   array_values($var)))
						   . '}';
				}

				// treat it like a regular array
				return '[' . join(',', array_map(array('CJSON', 'encode'), $var)) . ']';

			case 'object':
				if ($var instanceof Traversable)
				{
					$vars = array();
					foreach ($var as $k=>$v)
						$vars[$k] = $v;
				}
				else
					$vars = get_object_vars($var);
				return '{' .
					   join(',', array_map(array('CJSON', 'nameValue'),
										   array_keys($vars),
										   array_values($vars)))
					   . '}';

			default:
				return '';
		}
	}



?>