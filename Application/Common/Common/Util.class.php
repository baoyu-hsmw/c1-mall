<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 15:42
 */

namespace Common\Common;


class Util
{
    static function password($pwd, $salt = ''){
        $with_salt = false;
        if(!$salt){
            $salt = self::salt();
            $with_salt = false;
        } else {
            $with_salt = true;
        }
        $p = md5(md5($pwd).$salt);
        return $with_salt ? $p : [$p, $salt];
    }

    static function salt($len = 6){
        return substr(md5(microtime(true)), 32 -$len, $len);
    }
}