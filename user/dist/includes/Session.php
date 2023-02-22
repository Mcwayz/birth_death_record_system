<?php
class Session
{

    public function init()
    {
        if (!PHP_SESSION_ACTIVE) :
            session_start();
        endif;
    }


    public function getAuthSession()
    {
        if (isset($_SESSION['user'])) {
            return  $_SESSION['user'];
        } else {
            echo $this->redirectNonAuth();
        }
    }

    public function checkSession()
    {
        $this->init();
        $this->getAuthSession();
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            echo $this->redirectNonAuth();
        }
    }
    function redirectNonAuth()
    {
        return "<script>alert('Not Authorised');window.location.href = '../../index.php'</script>";
    }
    public function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        echo $this->redirectNonAuth();
    }

    public function redirect($role)
    {
        if ($role == 'admin') {
            header('Location:admin.php');
        } else {
            header('Location:home.php');
        }
    }
}
