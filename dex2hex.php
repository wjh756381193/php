<?php 
/**
 * 十进制转换为十六进制
 * @param $no  要转换的数字
 * @return string 返回对应的十六进制数字
 */
function Dex2Hex($no){
    $result = '';
    while($no) {
        $result = sprintf('%02X%s', bcmod($no, 256), $result);
        $no = bcdiv($cmd, 256);
    }
    return $result;
}