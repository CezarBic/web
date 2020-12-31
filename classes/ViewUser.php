<?php

class ViewUser extends Users{
    
    protected function viewAllUsers(){
        $result = $this->getAllUsers();
        for($i = 0; $i < count($result); $i++){
            echo  "Full name: " . $result[$i]['_full_name'] ." "
                                .$result[$i]['_email'] ." "
                                .$result[$i]['_password'] ." "
                                .$result[$i]['_created_at'] ." "
                                .$result[$i]['priority']."</br>";
        }
        
    }
    
    protected function oneUser($email){
        $result = $this->getUser($email);
        return $result[0];
        
    }

    
    protected function oneUserEmail($email){
        $result = $this->getUser($email);
        $emailResult = $result[0]['_email'];
        return $emailResult;   
    }

    protected function oneUserPassword($email){
        $result = $this->getUser($email);
        $passwordResult = $result[0]['_password'];
        return $passwordResult;   
    }
    protected function oneUserId($email){
        $result = $this->getUser($email);
        $idResult = $result[0]['_id'];
        return $idResult;   
    }

    protected function oneUserCreatedDate($email){
        $result = $this->getUser($email);
        $createdResult = $result[0]['_created_at'];
        return $createdResult;   
    }

    protected function oneUserPriority($email){
        $result = $this->getUser($email);
        $priorityResult = $result[0]['_priority'];
        return $priorityResult;   
    }
}