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
?>