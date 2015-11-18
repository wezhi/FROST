<?php

/**
 * cUrl基础操作类
 * Description：     此类不参与业务逻辑判定，只执行基础的cUrl类配置、方法，并返回值
 * Version：         1.0
 * Create：          2015/11/18 11:18
 * Project：         FROST
 * Support：         http://www.wezhi12.com
 * Contact：         support@wezhi12.com
 */

/**
 * Class Curl_frost
 * 日记
 * ？使用curl_getinfo返回的数组，应该可以开发进度条
 */
class Curl_frost
{
    private $setOpt = array(

    );
    private $curl;
    function __construct()
    {

    }

    /**
     * Get方式提交，目前测试的功能有：微信获取access_toke
     * 可自定义cUrl配置参数，数组
     * @param $url
     * @param array|null $setOpt
     * @return mixed|string
     */
    public static function Get_by_url($url,array $setOpt = null){
        $cl = curl_init();
        if ($setOpt){
            curl_setopt_array($cl,$setOpt);
        }else{
            curl_setopt($cl,CURLOPT_URL,$url);
            curl_setopt($cl,CURLOPT_HEADER,0);
            curl_setopt($cl,CURLOPT_RETURNTRANSFER,1);
            //以https请求时，需添加，否则报错：
            //SSL certificate problem: unable to get local issuer certificate
            curl_setopt($cl,CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($cl,CURLOPT_SSL_VERIFYHOST,0);
        }
        $output = curl_exec($cl);
        //用 === 而不是 ==
//        if ($output === false){
//            return curl_error($cl);
//        }
        curl_close($cl);
        return $output;
    }

}