<?php 
/**
 *求两个已知经纬度之间的距离,单位为米
 * @param float $lng1 第一点的经度
 * @param float $lat1 第一点的维度
 * @param float $lng2 第二点的经度
 * @param float $lat2 第二点的维度
 * @return boolean 小于五公里时返回true，反之返回false;
 * @author wjh
 */
function getDistance($lng1=0.0,$lat1=0.0,$lng2=0.0,$lat2=0.0){
    //将角度转为狐度
    $radLat1=deg2rad($lat1); //deg2rad()函数将角度转换为弧度
    $radLat2=deg2rad($lat2);
    $radLng1=deg2rad($lng1);
    $radLng2=deg2rad($lng2);
    $a=$radLat1-$radLat2;
    $b=$radLng1-$radLng2;
    $s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*1000;
    return $s<5000?true:false;
}