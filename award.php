<?php 
header("Content-type:text/html;charset=utf8");
/**
 * 循环定位抽中的点
 * @param $totalMoney 红包的总金额
 * @param $arr 已经标记过的点的列表
 * @param $unit 每个红包的最小单位
 * @return int 本次运行后定位的点的位置
 */
function lottery($totalMoney,$arr,$unit){
    $num=rand(1,$totalMoney/$unit-1);
    if(in_array($num,$arr)){
        $num=lottery($totalMoney,$arr,$unit);
    }
    return $num;
}

/**
 * 原理说明 设想一根绳子有一个固定的长度（即本红包的总金额/红包的金额最小单位），在上面标记整数位的点
 * 进行N-1(抽奖人数-1)次的随机打点 如果点重复则再次打点 当这些点全部打出来后，组合上首位位置0点和 $totalMoney/$unit位
 * 展开这条绳子，在这些点的位置截断，每个绳子的长度(排序后，$data[$i+1]-$data[$i])就是每个人的中奖的金额！！！ 
 * 仿微信红包功能
 * @param $totalPeople 红包的总个数
 * @param $totalMoney 红包的总金额
 * @param int $unit 红包的金额的最小单位
 * @return array|int 如果参数异常返回相应的错误码，反之，返回抽奖的结果
 */
function award($totalPeople,$totalMoney,$unit=1){
    if($totalMoney/$totalPeople<$unit){
        return -1;
    }
    if(!is_int($totalMoney/$unit)){
        return -3;
    }
    if(!is_int($totalPeople)){
        return -2;
    }
    $data[0]=0;
    for($i=1;$i<$totalPeople;$i++){
        $num=lottery($totalMoney,$data,$unit);
        array_push($data,$num);
    }
    $data[$totalPeople]=$totalMoney/$unit;
    sort($data);
    $money=array();
    for($i=0;$i<$totalPeople;$i++){
        $money[$i]=($data[$i+1]-$data[$i])*$unit;
    }
    return $money;
}
$rs=award(11,100,1);
echo '<pre>';
print_r($rs);
?>