<?php


class User extends Database{

    public $firstNameUser;
    public $lastNameUser;
    
    protected $emailUser;
    protected $typeUser;

    protected function checkConnectedUser(string $session, string $type) :void
    {
        if( empty( $session) || empty( $type) )
        {
            header("Location: ../index.php");
            exit();
        }
        else{

            $this->emailUser = $session;
            $this->typeUser = $type;
        }    
    
    }

    protected function searchConnectedUser(string $session, string $type) :array
    {
        $this->checkConnectedUser($session,$type);
        
        $mysql = 'SELECT * FROM users WHERE mail_user='.$session.' AND '



    }



}