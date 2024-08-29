<?php
namespace App\Controllers;

use Core\View;
use App\Model\ModelDeseos;
use App\Config\env;
class ControllerXv {

    public function store()
    {   
        if($_SERVER['REQUEST_METHOD']=="POST"){
            try {
                $uid=$_POST['huid'];
                $deseos = new ModelDeseos();
                if($this->getexist($uid)){
                    echo json_encode(['status'=>false,'message'=>'Usted ya confirmo sus asistencia, mucha gracias'],400);
                    return;
                }else{
                    $insert = $deseos->setasistencia($_POST,$uid);
                    echo json_encode(['status'=>true,],200);
                }
                

            } catch (\Throwable $e) {
                echo json_encode(['status'=>false,'message'=>'error en la solicitud'],400);
            }
        
        }else{
            echo json_encode(['status'=>false,'message'=>'Solicitud no permitida'],400);
        }
    }

    private function getexist($uid){
        $deseos = new ModelDeseos();
        $asiste=$deseos->getconfirAsistencia($uid);

        return $asiste;
    }

}