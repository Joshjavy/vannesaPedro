<?php
namespace App\Model;
use Core\Model;
use Ramsey\Uuid\Uuid;

class Adminmodel extends Model{

    public function getuser($mail)
    {
        try{
            $query = $this->db->prepare("SELECT username, password,email FROM accounts where email=:email  ORDER BY id DESC");
            $query->execute(
                ['email'=>$mail]
            );
            return $query->fetch();
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
    }

    public function setInvitados($datos,$pase,$pasen)
    {   
        try{
            
            $statement = $this->db->prepare('INSERT INTO invitados (Nombre,pases,paseschildren, uid) VALUES (:Nombre,:pases,:paseschildren,:uid)');

                $status = $statement->execute([
                    'Nombre' => $datos,
                    'pases'=>$pase,
                    'paseschildren'=>$pasen,
                    'uid' => Uuid::uuid4(),
                    ]);
            return ['status'=>$status,'error'=>false,'id'=>$this->db->lastInsertId()];
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
        
    }

    public function getinvitados()
    {
        $sql = "SELECT Nombre,pases,paseschildren,uid FROM invitados";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}