<?php

    class Base_Controllers extends BaseController{
        public function main(array $getUri) { 
             $modlename = $getUri['controller'] . '_Model';
             $model = new $modlename;
             
//             $header = new View_Model(array($getUri['controller'],'Header'));
//             $footer = new View_Model(array($getUri['controller'],'Footer'));
             $master = new View_Model(array($getUri['controller'],'View'));
             $master->assign('data', $model->getSelectDB());
//             $master->assign('header',$header->render(FALSE));
//             $master->assign('footer',$footer->render(FALSE));
             $master->render();

        }
    }
    
?>
