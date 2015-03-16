<?php 
	/**
     * 日志生成函数 Author:WJH
     * @param string $log 要在日志中显示的字符串
     * @param string $filePrefix 日志文件名的前缀
     */
	function AddLog($log=''){
        $time=date('Y-m-d H:i:s',mktime());
        $filename=date('YmdH',mktime()).'.log';
        $fp=fopen($filename,'a');
        fwrite($fp,$time."\n".$log."\n");
        fclose($fp);
    }
?>