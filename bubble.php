<?php
function bubble_sort($arr){
    for($i=0;$i<count($arr)-1;$i++){
        for($j=$i+1;$j<count($arr);$j++){
            if($arr[$i]>$arr[$j]){
                $temp=$arr[$i];
                $arr[$i]=$arr[$j];
                $arr[$j]=$temp;
            }
        }
    }
    return $arr;
}

$arr=array(3,4);

$a=bubble_sort($arr);
var_dump($a);