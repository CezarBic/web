<?php
class Logout extends Session{

    public function userLogout(){
        $user = $this->logout($_SESSION['_id']);
        header('Location: ./index.php');
        return $user;
    }
}