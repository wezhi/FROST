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
class Curl_frost
{
    private $setOpt;
    function __construct(Array $setOpt = null)
    {
        if ($setOpt){
            $this->setOpt = $setOpt;
        }
    }
}