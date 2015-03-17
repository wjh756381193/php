<?php 
	/**
     * 日志生成函数 Author:WJH
     * @param string $log 要在日志中显示的信息
     * @param string $filePrefix 日志文件名的前缀
	 * @param string $fileSuffix 日志文件名的后缀
	 * @param return -3 打开文件失败 -2 写入文件失败 -1 关闭文件失败 0 成功
     */
	
	function AddLog($log='',$filePrefix='',$fileSuffix='.log',$time='day'){
        $time=date('Y-m-d H:i:s',mktime());
		if($time=='year'){
			$period=date('Y',mktime());
		}elseif($time=='month'){
			$period=date('Ym',mktime());
		}elseif($time=='hour'){
			$period=date('YmdH',mktime());
		}elseif($time=='minute'){
			$period=date('YmdHi',mktime());
		}elseif($time=='second'){
			$period=date('YmdHis',mktime());
		}else{
			$period=date('Ymd',mktime());
		}
        $filename=$filePrefix.$period.$filePrefix;
        $fp=fopen($filename,'a');
		if($fp){
			$wr=fwrite($fp,$time."\n".$log."\n");
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