<?php

class Users extends Db {

    protected function getAllUsers (){
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        $users = $stmt->fetchAll();
    
        return $users;
        
    }

    protected function getUser ($email){
        $sql = "SELECT * FROM users WHERE _email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $users = $stmt->fetchAll();
        
        return $users;
    }
    
    protected function insert($fullName, $email, $password){
        $sql = "INSERT INTO users(_full_name, _email, _password, _created_at, _priority) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $date = date("F j, Y, g:i a");  
        $tostring = strval($date);
        $priority = "1";
        
        $stmt->execute([$fullName, $email, $password, $tostring,$priority]);
       
    }

    protected function update($id,$fullName, $email, $password, $priority ){
        $sql = "UPDATE users SET    _full_name=:fullName, _email=:email, 
                                    _password=:password, _priority=:priority WHERE _id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([":fullName"=>$fullName, ":email"=>$email, ":password"=>$password, 
                        ":priority"=>$priority, ":id"=>$id]);
        
    }

    protected function delete($id){
        $sql = "DELETE FROM users WHERE _id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([":id"=>$id]);
        
    }
}