<?php

namespace App\Controllers;

use Core\View;
use App\Model\Adminmodel;

class Admin
{

    public function login()
    {
        $Admin = new Adminmodel();
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            if (!isset($_POST['email'], $_POST['password'])) {

                echo json_encode(['status' => false, 'message' => 'No se puede procesar su solicitud SD'], 400);
            } else if (empty($_POST['email']) || empty($_POST['password'])) { 
                echo json_encode(['status' => false, 'message' => 'No se puede procesar su solicitud SD'], 400);
            }

                try {
                    $Admin = new Adminmodel();
                    $dataUser = $Admin->getuser($_POST['email']);
                    //echo json_encode(['status'=>true,'data'=>$this->getadmin()],200);
                    $result=$dataUser? true:false;

                    if(!$result){
                        echo json_encode(['status' => false, 'message' => 'Verifique sus credenciales'], 400);
                    }else{

                        if (password_verify($_POST['password'], $dataUser->password)) {
                            session_start();
                            // session_regenerate_id();
                            $_SESSION['loggedin'] = TRUE;
                            $_SESSION['name'] = $dataUser->username;
                            echo json_encode(['status' => true, 'data' => $result ], 200);
                        } else {
                            
                            echo json_encode(['status' => false, 'message' => 'Verifique sus credenciales'], 400);
                        }
                    }
                  
                } catch (\Throwable $e) {
                    echo json_encode(['status' => false, 'message' => 'error en la solicitud DB'], 400);
                }

            } else {
                echo json_encode(['status' => false, 'message' => 'Solicitud no permitida SP'], 400);
            }
        
    }

    public function logout(){
        session_start();
        session_destroy();
        echo json_encode(['status' => true, 'data' => true ], 200);
    }
}
