<?php 

class Session{
    private $login = false;
    private $userId;

    public function __construct()
    {   
        session_start();
        $this->checkLogin();

        
    }

    public function isLoggedIn()
    {
        return $this->login;
    }

    public function login($user)
    {
        if($user){
            $this->userId = $_SESSION['_id'] =$user;
            $this->login = true;
            header('Location: ./index.php');
        
        }else{
            unset($this->userId);
            $this->login = false;
        }
        
    }

    protected function logout($user)
    {
        unset($_SESSION['_id']);
        unset($this->userId);
        $this->login = false;
        echo "You logged out!";
    }

    private function checkLogin(){
        if(isset($_SESSION['_id'])){
            $this->userId = $_SESSION['_id'];
            $this->login = true;
        }else{
            unset($this->userId);
            $this->login = false;
        }
    }
}