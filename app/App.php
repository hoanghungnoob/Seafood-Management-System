<?php
class App{
    private $__controller, $__action,$__params;

    function __construct(){
       $this->__controller = 'home';
       $this->__action ='index';
       $this->__params = [];
       $this->handleUrl();
    }
    function getUrl(){
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        }
        else{
            $url = '/';
        }
        return $url;
    }
    public function handleUrl(){
        $url = $this->getUrl();
        $urlArray = array_filter(explode('/' ,$url));
        $urlArray = array_values($urlArray);

        if(!empty($urlArray[0])){
            $this->__controller = ucfirst($urlArray[0]);
            if(file_exists('app/controllers/' . ($this->__controller) . '.php')){
                require_once 'controllers/' . ($this->__controller) . '.php';
            }else{
                echo "lỗi";
            }
        }

    }
}