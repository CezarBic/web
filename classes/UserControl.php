<?php 

class UserControl extends Users{

    public function createUser($fullName, $email, $password){
        $user = $this->insert($fullName, $email, $password);
        
        echo "Contul a fost creat cu succes!";
    
       
    }

    public function updateUser($id, $fullName, $email, $password, $priority){
        $user = $this->update($id, $fullName, $email, $password, $priority);
        
      
        echo "Schimbarile au fost efectuate cu succes!";
     
    }

    public function deleteUser($id){
        $user = $this->delete($id);
        
      
        echo "Userul a fost sters cu succes!";
     
    }
}