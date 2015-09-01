<?php 
    /**
     * 作用：生成$length长度的随机码
     * @param int $length 要生成的随机码的长度 默认长度为18
     * @return string 返回的随机码字符串
     */
    private function GenerateCode($length=18){
        $str='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $strLen=strlen($str);
        $rs='';
        for($i=0;$i<$length;$i++){
            $position=rand(0,$strLen-1);
            $rs.=$str[$position];
        }
        return $rs;
    }