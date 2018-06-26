<?php
class Curl{
    protected $curl;
    public function __construct($url,$POST_DATA){
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $url) ;
        curl_setopt($this->curl, CURLOPT_HTTP_VERSION, 1.0) ;
        curl_setopt($this->curl, CURLOPT_PORT, 80) ;
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 10) ;
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1) ;
        curl_setopt($this->curl, CURLOPT_POST, 1) ;
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 3) ;
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($POST_DATA)) ;
    }
    public function get_result(){
        $result['raw']      = curl_exec($this->curl);
        $result['execinfo'] = curl_getinfo($this->curl);
        $result['status']   = $result['execinfo']['http_code'];
        return $result;
    }
}

