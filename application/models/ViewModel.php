<?php

class View_Model { 

    private $data = array();
    private $render = FALSE;
    private $uri = array();

    public function __construct(array $getUri) {
//        echo $getUri[1];
        if($getUri[1] === 'Header'){
            $file = Router::getDirView().strtolower($getUri[0]).'/'.ucfirst($getUri[0]).'Header.php';
            if(file_exists($file)){
                $this->render = $file;
            }else{
                $this->render = Router::getDirView().'layout/'.'MainHeader.php';
            }    
        }else if($getUri[1] === 'Footer'){
            $file = Router::getDirView().strtolower($getUri[0]).'/'.ucfirst($getUri[0]).'Footer.php';
            if(file_exists($file)){
               $this->render = $file;
            }else{
                $this->render = Router::getDirView().'layout/'.'MainFooter.php';
            } 
        }else if($getUri[1] === 'Main'){
            $file = Router::getDirView().'layout/'.ucfirst($getUri[0]).'View.php';
            if(file_exists($file)){
               $this->render = $file;
            }   
        }else{
            $file = Router::getDirView().strtolower($getUri[0]).'/'.ucfirst($getUri[0]).'View.php';
            $files = Router::getDirView().ucfirst($getUri[0]).'View.php';
            if(file_exists($file)){
                $this->render = $file;
            }else if(file_exists($files)){
                $this->render = $files;    
            }else{
                $this->render = Router::getDirView().'layout/'.'NotView.php';
            }
        }

    }

    public function assign($variable , $value) { 
        $this->data[$variable] = $value;   
    }
    
    public function render($direct_output = TRUE){
        if($direct_output !== TRUE){
            ob_start();
        }
        
        $data = $this->data;
        
        require($this->render);
        
        if($direct_output !== TRUE){
            return ob_get_clean();
        }
        
    }

    public function __destruct() { 
        
        
    }
    
}

?>
