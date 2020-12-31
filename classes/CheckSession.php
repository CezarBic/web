<?php

class CheckSession extends Session{

    public function isLoginUser(){
        return $this->isLoggedIn();

    }
}