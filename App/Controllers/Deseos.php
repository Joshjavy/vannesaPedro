<?php

namespace App\Controllers;

use Core\View;
use App\Model\ModelDeseos;

class Deseos
{
    public function store()
    {   
        if($_SERVER['REQUEST_METHOD']=="POST"){
            try {
                
                $deseos = new ModelDeseos();
                $insert = $deseos->setDeseos($_POST);
                echo json_encode(['status'=>true,'data'=>$this->getDeseos()],200);

            } catch (\Throwable $e) {
                echo json_encode(['status'=>false,'message'=>'error en la solicitud'],400);
            }
        
        }else{
            echo json_encode(['status'=>false,'message'=>'Solicitud no permitida'],400);
        }
    }

    private function getDeseos(){
        $deseos = new ModelDeseos();
        return $deseos->getdeseo();
    }
}
