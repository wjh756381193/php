<?php

function select_sort($arr){
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

function bubble_sort($arr){
    for($i=0;$i<count($arr)-1;$i++){
        for($j=0; $j<count($arr)-$i-1;$j++){
            if($arr[$j]>$arr[$j+1]){
                $temp=$arr[$j+1];
                $arr[$j+1]=$arr[$j];
                $arr[$j]=$temp;
            }
        }
    }
    return $arr;
}

$arr=array(3,7,4,5,8);
$a=bubble_sort_two($arr);
var_dump($a);