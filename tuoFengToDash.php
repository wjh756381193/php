<?php
/**
 * 将函数名的驼峰写法转换为下划线写法
 * @param $str functionName
 * @return string 转换后的functionName
 * 如果传入的参数非法，返回相应的错误信息
 */
function TuofengToDash($str){
    if(!is_string($str)){
        return 0;
    }
    if(!preg_match('/[a-zA-Z-]/',$str[0])){
        return 1;
    }
    if(preg_match('/[\*\\\'\#\?\,\<\>\:\|\}\{\[\]\"\$\@\!\~\`\%\&\^\.\=\+\-\;\(\)]/',$str)){
        return 2;
    }
    $str=lcfirst($str);
    $pattern='/[A-Z]/';
    $str=preg_replace($pattern,'_$0',$str);
    return strtolower($str).'()';
}
echo TuofengToDash('CmdInsertUser');