<?php

namespace App\Model;
use Core\Model;

class ModelDeseos extends Model
{
    public function getAll()
    {
        try{
            $this->db->beginTransaction();
            $query = $this->db->prepare("SELECT id, nombre,deseo, DATE(created_at) AS ffirma FROM deseos ORDER BY id DESC");
            $query->execute();
            $this->db->commit();
            return $query->fetchAll();
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
    }
    
    public function getInvitados()
    {
        $sql = "SELECT id, Nombre,pases FROM invitados";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getAsistencia()
    {
        $sql = "SELECT id, uid,Nombre,pases,paseschildren FROM asistencia";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function setasistencia($datos,$uid)
    {   
        try{
            
            $statement = $this->db->prepare('INSERT INTO asistencia (uid, Nombre,pases,paseschildren) VALUES (:uid,:Nombre,:pases,:paseschildren)');

                $status = $statement->execute([
                    'uid' => $uid,
                    'Nombre' => $datos['nombre'],
                    'pases'=>$datos['pases'],
                    'paseschildren'=>isset($datos['paseschildren'])? $datos['paseschildren']:'',
                    ]);
            return ['status'=>$status,'error'=>false,'id'=>$this->db->lastInsertId()];
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
        
    }

    public function getinvitado($uid)
    {
        try{
            $query = $this->db->prepare("SELECT Nombre,pases,paseschildren, uid FROM invitados where uid=:uid  ORDER BY id DESC");
            $query->execute(
                ['uid'=>$uid]
            );
            return $query->fetch();
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
    }

    public function getconfirAsistencia($uid)
    {
        try{
            $query = $this->db->prepare("SELECT uid FROM asistencia where uid=:uid  ORDER BY id DESC");
            $query->execute(
                ['uid'=>$uid]
            );
            return $query->fetch();
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
    }

    public function setDeseos($datos)
    {   
        try{
            
            $statement = $this->db->prepare('INSERT INTO deseos (nombre, deseo,created_at) VALUES (:nombre, :deseo,:created_at)');

                $status = $statement->execute([
                    'nombre' => $datos['nombre'],
                    'deseo' => $datos['deseos'],
                    'created_at'=>date("Y/m/d")
                    ]);
            return ['status'=>$status,'error'=>false,'id'=>$this->db->lastInsertId()];
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
        
    }

    public function getdeseo()
    {
        try{
            $query = $this->db->prepare("SELECT id, nombre,deseo, DATE(created_at) AS ffirma FROM deseos ORDER BY id DESC");
            $query->execute();
            return $query->fetchAll();
        }catch(\PDOException $e){
            return ['status'=>0,'error'=>true];
        }
        
    }

}