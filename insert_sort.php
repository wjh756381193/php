<?php
/**
 * @param int $index    要插入的位置
 * @param string $ele   要插入的元素
 * @param array $arr    要插入的数组
 * @return array|string 返回插入后的数组或者错误信息字符串
 */
function rightMoveOneElement($index=0,$ele='',array $arr){
    $len=count($arr);
    if($index>count($arr)){
        $arr[count($arr)]=$ele;
    }
    if(!$len){
        return 'invalid data';
    }
    for($i=$len;$i>=0;$i--){
        if($index < $i){
            $arr[$i]=$arr[$i-1];
        }elseif($index==$i){
            $arr[$i]=$ele;
        }
    }
    return $arr;
}

function insertElement($element,array $arr){
    if($element<=$arr[0]){
        $arr=rightMoveOneElement(0,$element,$arr);
    }elseif($element > $arr[count($arr)-1]){
        $arr=rightMoveOneElement(count($arr),$element,$arr);
    }else{
        $len=count($arr);
        for($i=0;$i<$len-1;$i++)
        {
            if($element>=$arr[$i]&&$element<$arr[$i+1]) {
                    $arr=rightMoveOneElement($i+1,$element,$arr);
            }
        }
    }
    return $arr;
}

function insert_sort(array $arr)
{
    $sorted=array($arr[0]);
    for($i=1;$i<count($arr);$i++){
        $sorted=insertElement($arr[$i],$sorted);
    }
    return $sorted;
}

$arr=array(10,3,44,23,98);
$sortedArr=insert_sort($arr);
var_dump($sortedArr);