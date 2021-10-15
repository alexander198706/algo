<?php
namespace algo\network;

class Http{
    public static function log(){
        echo 'success';
    }

    public static function post($url, $data = null)
    {
        $ch = curl_init();//返回会话句柄
        //为cURL会话句柄设置选项。
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        if (!empty($data)) {
            //类型为：application/x-www-form-urlencoded。
            curl_setopt($ch, CURLOPT_POST, true);//POST请求，
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//数据
        }
        // curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);//curl_exec()成功:返回执行的结果,失败FALSE
        $return_data = curl_exec($ch);
        curl_close($ch);//关闭句柄
        return $return_data;//返回json数据结果
    }
}