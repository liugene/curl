<?php
namespace linkphp\curl;

class Curl
{

    public function get($url,$data=[])
    {
        if (is_array($url)) {
            $data = $url;
            $url = (string)$this->url;
        }
        $this->setUrl($url, $data);
        $this->setOpt(CURLOPT_CUSTOMREQUEST, 'GET');
        $this->setOpt(CURLOPT_HTTPGET, true);
        return $this->exec();
    }
    public function post($url,$data=[]){}
    static public function request($type,$url,$data=''){

        //模拟GET请求
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        switch($type){
            case 'get';
                break;
            case 'post';
                curl_setopt($curl,CURLOPT_POST,true);
                $post_data = $data;
                curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
                break;
        }
        //处理响应数据
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}