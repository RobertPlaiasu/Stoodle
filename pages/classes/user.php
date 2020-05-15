<?php


class User extends Database
{
    
    public $idUser;
    public $firstNameUser;
    public $lastNameUser;
    public $profilUser;
    public $passionUser;
    public $passionIntensityUser;
    public $jobUser;
    public $subject1User;
    public $subject2User;
    public $subject3User;
    public $booksUser;
    public $sportUser;
    public $socialUser;
    public $stressUser;
    public $countyUser;
    public $pictureUser;
    
    protected $emailUser;
    protected $typeUser;
    protected $arrayUserInformation;

    function __constructor(string $session,string $type)
    {
        $arrayUserInformation = $this->searchConnectedUser($session, $type);

        //protected
        $this->emailUser = $session;
        $this->typeUser = $type;


        //public
        $this->idUser = $arrayUserInformation['id_user'];
        $this->firstNameUser = $arrayUserInformation['first_name_user'];
        $this->lastNameUser = $arrayUserInformation['name_user'];
        $this->profilUser = $arrayUserInformation['profil_user'];
        $this->passionUser = $arrayUserInformation['passion_user'];
        $this->passionIntensityUser = $arrayUserInformation['passion_intensity_user'];
        $this->jobUser = $arrayUserInformation['job_user'];
        $this->subject1User = $arrayUserInformation['subject1_user'];
        $this->subject2User = $arrayUserInformation['subject2_user'];
        $this->subject3User = $arrayUserInformation['subject3_user'];
        $this->booksUser = $arrayUserInformation['books_user'];
        $this->sportUser = $arrayUserInformation['sport_user'];
        $this->socialUser = $arrayUserInformation['social_user'];
        $this->stressUser = $arrayUserInformation['stress_user'];
        $this->countyUser = $arrayUserInformation['county_user'];
        $this->pictureUser = $arrayUserInformation['picture_user'];

    }

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
        
        $mysql = 'SELECT * FROM users WHERE mail_user= ? AND type_user= ?';
        $stmt = $this->connection()->prepare($mysql);

        $stmt->execute( [$session, $type] );
        $row = $stmt->fetch(); 

        return $row;

    }



}