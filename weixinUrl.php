<?php
/**
 * User: wangjh
 * DateTime: 2015/8/13 15:32
 * CompanyEmail:wangjh@uuzu.com 
 * PersonEmail:wangjinghua1215225@163.com or wjh756381193@qq.com
 * Description : If you have any problems about the code below. Please feel free to ask me for more information!
 * By the way copy the code you think that is illegal in the email!
 */
$url=array(
    'wxValid'=>array(
        'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET',
//        get access_token
        'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=ACCESS_TOKEN',
//        get server ip
    ),
    'user'=>array(
        'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=ACCESS_TOKEN',
//        set up the remark name
        'https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN',
//        get one user's basic information by openid
        'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=ACCESS_TOKEN',
//        get some users' basic information by openids
        'https://api.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&next_openid=NEXT_OPENID',
//        get the list of the users who subscribed the public platform number
    ),
    'message'=>array(
        'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=ACCESS_TOKEN',
//        set industry
        'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token=ACCESS_TOKEN',
//        get templates id
        'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=ACCESS_TOKEN',
//        send template messages
    ),
    'file'=>array(
        "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE",
        // 原来的上传多媒体文件 现在称为新增临时素材接口
        'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE',
        // upload media material to the server
        "https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID",
        // 原来的下载多媒体文件 现在称为获取临时素材接口
        "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID",
        // download the material uploaded to the server
    ),
    'group'=>array(
        'https://api.weixin.qq.com/cgi-bin/groups/create?access_token=ACCESS_TOKEN',
//        create A Group
        'https://api.weixin.qq.com/cgi-bin/groups/get?access_token=ACCESS_TOKEN',
//        get all groups' related information
        'https://api.weixin.qq.com/cgi-bin/groups/getid?access_token=ACCESS_TOKEN',
//        get a group id of one user
        'https://api.weixin.qq.com/cgi-bin/groups/update?access_token=ACCESS_TOKEN',
//        rename one group
        'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=ACCESS_TOKEN',
//        move a user to a new group
        'https://api.weixin.qq.com/sns/auth?access_token=ACCESS_TOKEN&openid=OPENID',
//        move listed users to a group
        'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token=ACCESS_TOKEN'
//        delete a group
    ),
    'menu'=>array(
        'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN',
//        create a menu list
        'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=ACCESS_TOKEN',
//        get a menu list
        'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=ACCESS_TOKEN',
//        delete a menu list
        'https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=ACCESS_TOKEN',
//        get current menu's configure information
    ),
    'oauth'=>array(
        'https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect',
//       First step: get the code
        'https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code',
//       Second step: get web authorization access_token (not the same with basic support access_token)
        'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=APPID&grant_type=refresh_token&refresh_token=REFRESH_TOKEN',
//       Third step: get a refresh access_token (not necessary);
        'https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN',
//       Forth step: get a userinfo !
        'https://api.weixin.qq.com/sns/auth?access_token=ACCESS_TOKEN&openid=OPENID',
//       check if a access_token is valid
    ),
    'material'=>array(
        'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE',
//        add a temporary material
        'https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID',
//        get a temporary material
        'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=ACCESS_TOKEN',
//        add a permanent material
        'https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=ACCESS_TOKEN',
//        get a permanent material
        'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=ACCESS_TOKEN',
//        delete a permanent material
        'https://api.weixin.qq.com/cgi-bin/material/update_news?access_token=ACCESS_TOKEN',
//        modify a permanent material
        'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=ACCESS_TOKEN',
//        get the amount of the permanent material
        'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN'
//        get the list of the permanent material
    ),
    'analysis'=>array(
        'https://api.weixin.qq.com/datacube/getusersummary?access_token=ACCESS_TOKEN',
//        get the increasing/decreasing number of the subscribed users;
        'https://api.weixin.qq.com/datacube/getusercumulate?access_token=ACCESS_TOKEN',
//        get the amount users data
        ''
    ),
);