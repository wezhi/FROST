<?php

/**
 * 微信核心类
 * Description：     基础接口（获取access_token、微信服务器IP地址），消息回复（文本消息、图文消息
 * Version：         1.0
 * Create：          2015/11/18 14:34
 * Project：         FROST
 * Support：         http://www.wezhi12.com
 * Contact：         support@wezhi12.com
 */
class WeChat_frost
{
    private $appId;
    private $appSecret;
    private $access_token;
    private $expires_in;
    private $access_token_timeout;
    public function __construct($app_id, $app_secret)
    {
        $this->appId = $app_id;
        $this->appSecret = $app_secret;
        if (!$this->Get_access_token()) {
            die("初始化失败，请提供有效的公众号凭据。");
        }
    }

    public function __get($name)
    {
        if (isset($name)){
            return $this->$name;
        }else{
            return null;
        }
    }

    /**
     * 获取公众号的access_token
     * @return mixed|null
     */
    private function Get_access_token(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
        $output = Curl_frost::Get_by_url($url);
        if ($output !== false){
            $res_out = json_decode($output);
            if (isset($res_out->errcode)){  //是否返回的错误消息
                return false;
            }
            $this->access_token = $res_out->access_token;
            $this->expires_in = $res_out->expires_in;
            $GLOBALS["access_token_timeout"] = time() + $this->expires_in;
            return true;
        }
        return false;
    }

    /**
     * 获取微信服务器地址
     * @param $access_token
     * @return bool
     */
    public function Get_server_ip($access_token){
        $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=$access_token";
        $output = Curl_frost::Get_by_url($url);
        if ($output !== false){
            $res_out = json_decode($output);
            if (isset($res_out->errcode)){  //是否返回的错误消息
                return false;
            }
            return $res_out->ip_list;
        }
        return false;
    }

    private function Is_timeout_access_token(){
        //好吧，直接更新至本地文件中.txt或是xml文件中都行，存储一个+expires_in的时间值
        return false;
    }
}