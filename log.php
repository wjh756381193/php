<?php 
	/**
     * 日志生成函数 Author:WJH
     * @param string $log 要在日志中显示的信息
     * @param string $filePrefix 日志文件名的前缀
	 * @param string $fileSuffix 日志文件名的后缀
	 * @param return -3 打开文件失败 -2 写入文件失败 -1 关闭文件失败 0 成功
     */
	
	function AddLog($log='',$filePrefix='',$fileSuffix='.log',$time='day'){
        $time1=date('Y-m-d H:i:s',time());
		if($time=='year'){
			$period=date('Y',time());
		}elseif($time=='month'){
			$period=date('Ym',time());
		}elseif($time=='hour'){
			$period=date('YmdH',time());
		}elseif($time=='minute'){
			$period=date('YmdHi',time());
		}elseif($time=='second'){
			$period=date('YmdHis',time());
		}else{
			$period=date('Ymd',time());
		}
        $filename=$filePrefix.$period.$fileSuffix;
        $fp=fopen($filename,'a');
		if($fp){
			$wr=fwrite($fp,$time1."\n".$log."\n");
			if($wr){
				$close=fclose($fp);
				if($close){
					return 1;
				}else{
					return -1;
				}
			}else{
				return -2;
			}
		}else{
			return -3;
		}
    }
?>
