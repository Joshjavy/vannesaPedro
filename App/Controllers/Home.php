<?php

namespace App\Controllers;

use Core\View;
use App\Model\Adminmodel;
use App\Model\ModelDeseos;
use App\Config\env;

class Home
{
    public function index()
    {
            $db = new ModelDeseos();
            $invitado = isset($_GET['invitado']) ? $db->getinvitado($_GET['invitado']) : 'anonimo';
            $views = ['home/index'];
            $args  = ['title' => 'Home','deseos' => $db->getAll(), 'invitado' => $invitado];
            View::render($views, $args); 
    }

    public function dashboard()
    {
        $db = new Adminmodel();
        $views = ['admin/index'];
        $args  = ['title' => 'Home'];
        View::render($views, $args);
    }

    public function login()
    {
        if (!isset($_POST['email'], $_POST['password'])) {

            $views = ['admin/login'];
            $args  = ['title' => 'Home'];
            View::render($views, $args);

        } else if (empty($_POST['email']) || empty($_POST['password'])) { 

            $views = ['admin/login'];
            $args  = ['title' => 'Home'];
            View::render($views, $args);
        }

            try {
                $Admin = new Adminmodel();
                $dbD = new ModelDeseos();
                $dataUser = $Admin->getuser($_POST['email']);
                //echo json_encode(['status'=>true,'data'=>$this->getadmin()],200);
                $result=$dataUser? true:false;

                if(!$result){

                    $views = ['admin/login'];
                    $args  = ['title' => 'Home'];
                    View::render($views, $args);
                   // echo json_encode(['status' => false, 'message' => 'Verifique sus credenciales'], 400);
                }else{

                    if (password_verify($_POST['password'], $dataUser->password)) {
                        
                        // session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $dataUser->username;
                        $db = new Adminmodel();

                        $views = ['admin/invitados'];
                        $args  = ['title' => 'Home', 'site' => env::site, 'datos' => $db->getinvitados(),'asistencias' => $dbD->getAsistencia()];
                        View::render($views, $args);

                        //echo json_encode(['status' => true, 'data' => $result ], 200);
                    } else {
                        $views = ['admin/login'];
                        $args  = ['title' => 'Home'];
                        View::render($views, $args);
                        //echo json_encode(['status' => false, 'message' => 'Verifique sus credenciales'], 400);//
                    }
                }
              
            } catch (\Throwable $e) {

                $views = ['admin/login'];
                $args  = ['title' => 'Home'];
                View::render($views, $args);
                //echo json_encode(['status' => false, 'message' => 'error en la solicitud DB'], 400);
            }


        $db = new Adminmodel();
        

    }

    public function invitados()
    {   
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $db = new Adminmodel();
        $views = ['admin/invitados'];
        $args  = ['title' => 'Home', 'site' => env::site, 'datos' => $db->getinvitados()];
        View::render($views, $args);
    }

    public function asistencia()
    {
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $db = new ModelDeseos();

        $views = ['admin/asistencia'];
        $args  = ['title' => 'Home', 'site' => env::site, 'datos' => $db->getAsistencia()];
        View::render($views, $args);
    }

    public function subirinvitados()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $db = new Adminmodel();
            try {
                $rows     = [];
                $total    = 0;
                $inserted = 0;
                $errors   = 0;

                if (!isset($_FILES["archivo"])) {
                    echo ("Selecciona un archivo CSV válido.");
                }

                $file     = $_FILES["archivo"];
                $tmp      = $file["tmp_name"];
                $filename = $file["name"];
                $size     = $file["size"];

                if ($size < 0) {
                    echo ("Selecciona un archivo válido por favor.");
                }

                $handle = fopen($tmp, "r");

                while (($data = fgetcsv($handle)) !== false) {
                    $rows[] = $data;
                }

                unset($rows[0]); // se eliminan las cabeceras
                $total = count($rows);

                if ($total <= 0) {
                    echo ("El archivo proporcionado está vacio.");
                }

                // Insertando información
                foreach ($rows as $r) {
                    $pase = isset($r[1]) ? $r[1] : '';
                    $pasen = isset($r[2]) ? $r[2] : '';
                    if ($db->setInvitados($r[0], $pase, $pasen) == false) {
                        $errors++;
                        continue;
                    }

                    $inserted++;
                }

                echo ('Se han insertado <b>%s</b> de <b>%s</b> registros con éxito.');

                if ($errors > 0) {
                    echo 'Tuvimos problemas al importar <b>%s</b> registros.';
                }
            } catch (\Exception $e) {
            }
        }
    }
}
