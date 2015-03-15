<?php 
/*	
	简介
    https_request是方倍工作室写的一个用于微信接口数据传输的万能函数，几乎适应于所有微信接口数据的访问及提交，
    其原理是使用curl实现向微信公众平台接口http及https协议时的get，post方式。
    函数实现如下
*/
    function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    /*
		举例
		以自定义菜单的开发为例，使用如下
	*/
    $access_token = "";
    $jsonmenu = '{
          "button":[
          {
                "name":"天气预报",
               "sub_button":[
                {
                   "type":"click",
                   "name":"北京天气",
                   "key":"天气北京"
                },
                {
                   "type":"click",
                   "name":"上海天气",
                   "key":"天气上海"
                },
                {
                   "type":"click",
                   "name":"广州天气",
                   "key":"天气广州"
                },
                {
                   "type":"click",
                   "name":"深圳天气",
                   "key":"天气深圳"
                },
                {
                    "type":"view",
                    "name":"本地天气",
                    "url":"http://m.hao123.com/a/tianqi"
                }]
          

           },
           {
               "name":"方倍工作室",
               "sub_button":[
                {
                   "type":"click",
                   "name":"公司简介",
                   "key":"company"
                },
                {
                   "type":"click",
                   "name":"趣味游戏",
                   "key":"游戏"
                },
                {
                    "type":"click",
                    "name":"讲个笑话",
                    "key":"笑话"
                }]
           

           }]
     }';
    $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
    $result = https_request($url, $jsonmenu);
    var_dump($result);
?>