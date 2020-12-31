<?php

class ValidationSignup extends ViewUser{

    private $data;
    private $errors;
    private static $fields =['email_signup', 'password_signup', 'passwordc_signup','fullname_signup'];


    public function __construct($post){
        $this->data = $post;
    }

    public function validateSignup(){
        foreach (self::$fields as $field) {
            if(!array_key_exists($field, $this->data)){
             $this->addError($field , "This field does not exist" ."</br>");
             return;
            }
         }
         $this->validateEmailSignup();
         $this->validatePasswordSignup();
         $this->validateFullnameSignup();

        if($this->errors === null){
            //TODO insert data into Database

        }
         return $this->errors; 
    }

    private function validateEmailSignup(){
        $email = htmlspecialchars(trim($this->data['email_signup']));
        
        if(empty($email)){
            $this->addError("email_signup", "E-mail is empty!" ."</br>");
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->addError("email_signup", "Email is not valid!." ."</br>");  
            }
        }
        
    }

    private function validatePasswordSignup(){
        $password = htmlspecialchars(trim($this->data['password_signup']));
        $passwordc = htmlspecialchars(trim($this->data['passwordc_signup']));
        if(empty($password)){
            $this->addError("password_signup", "Password is empty! "."</br>");
        }else{
            if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $password)){
                $this->addError("password_signup", "Password must be 8 chars long, alfanumeric and a special char!"."</br>");  
            }
        }
        if(!$passwordc === $password){
            $this->addError("passwordc_signup", "Password does not match!"."</br>");
        }

    }

    private function validateFullnameSignup(){
        $fullname = htmlspecialchars(strtolower($this->data['fullname_signup']));
        if(empty($fullname)){
            $this->addError("fullname_signup", "Your full name is empty!" ."</br>");
        }
        if(!preg_match('/^[a-zA-Z]+$/', $fullname)){
            $this->addError("fullname_signup", "Your full name must contain only letters" ."</br>");
        }
        
    }

    private function addError($key, $error){
        $this->errors[$key] = $error;
    }
}