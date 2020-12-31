<?php

class ValidationLogin extends ViewUser{
    private $data;
    private $errors;
    private static $fields =['email', 'psw'];


    public function __construct($post){
        $this->data = $post;
    }
    
    public function validateLogin(){

        foreach (self::$fields as $field) {
           if(!array_key_exists($field, $this->data)){
            $this->addError($field , "This field does not exist" ."</br>");
            return;
           }
        }
        $this->validateData();

        return $this->errors; 
    }

    private function validateData(){
        $password = htmlspecialchars(trim($this->data['psw']));
        $email = htmlspecialchars(strtolower(trim($this->data['email'])));
       
        if(empty($email)){
            $this->addError("email", "E-mail is empty!" ."</br>");
        }elseif($email !== $this->oneUserEmail($email)){
            $this->addError("email", "User is not registerd!" ."</br>");     
        }elseif($email === $this->oneUserEmail($email)){
            if(empty($password)){
                $this->addError("psw", "Password is empty! "."</br>");
            }elseif(!password_verify($password, $this->oneUserPassword($email))){
                $this->addError("psw", "Incorrect password!"."</br>");
            }
        }
        if($this->errors === null){
            $login = new Session;
            $login->login($this->oneUserId($email));

        }
    }

    private function addError($key, $error){
        $this->errors[$key] = $error;
    }
}