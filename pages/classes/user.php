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

    public $arrayColleges;
    
    protected $emailUser;
    protected $typeUser;

    protected $arrayUserInformation;

    function __construct(string $session,string $type)
    {
        $this->emailUser = $session;
        $this->typeUser = $type;

    }

    //check if session exists
    public function checkConnectedUserIsset (string $session, string $type) :void
    {

        if( isset($session) && isset($type) )
        {
            header("Location: ../homePage.php");
            exit();
        }
    
    }

    //check if session doesn't exist 
    public function checkConnectedUserEmpty (string $session, string $type) :void
    {

        if(empty($session) && empty($type))
        {
            header("Location: ../homePage.php");
            exit();
        }
    
    }

    //search for data of the user in the table users
    protected function searchConnectedUser(string $session, string $type) :array
    {
        
        $mysql = 'SELECT * FROM users WHERE mail_user= ? AND type_user= ?';
        $stmt = $this->connection()->prepare($mysql);

        $stmt->execute( [$session, $type] );
        $row = $stmt->fetch(); 

        return $row;

    }


    public function checkFormCompleted (string $session,string $type) :void
    {

        $this->arrayUserInformation = $this->searchConnectedUser ($session,$type);

        //verify if the formular is completed
        if ( empty($this->arrayUserInformation['profil_user']))
        {
            header("Location: ./formularTemplate.php");
            exit();
        }
        else 
        {
            //public all
            $this->idUser = $this->arrayUserInformation['id_user'];
            $this->firstNameUser = $this->arrayUserInformation['first_name_user'];
            $this->lastNameUser = $this->arrayUserInformation['name_user'];
            $this->profilUser = $this->arrayUserInformation['profil_user'];
            $this->passionUser = $this->arrayUserInformation['passion_user'];
            $this->passionIntensityUser = $this->arrayUserInformation['passion_intensity_user'];
            $this->jobUser = $this->arrayUserInformation['job_user'];
            $this->subject1User = $this->arrayUserInformation['subject1_user'];
            $this->subject2User = $this->arrayUserInformation['subject2_user'];
            $this->subject3User = $this->arrayUserInformation['subject3_user'];
            $this->booksUser = $this->arrayUserInformation['books_user'];
            $this->sportUser = $this->arrayUserInformation['sport_user'];
            $this->socialUser = $this->arrayUserInformation['social_user'];
            $this->stressUser = $this->arrayUserInformation['stress_user'];
            $this->countyUser = $this->arrayUserInformation['county_user'];
            $this->pictureUser = $this->arrayUserInformation['picture_user'];

        }

    }

    private function collegeAndUserCompability ()
    {
        
        
    }



    private function getAllColleges () :array
    {

        $mysql = 'SELECT * FROM college';
        $stmt = $this->connection()->query($mysql);

        $rows = $stmt->fetchAll();
        return $rows;

    }

    /*search 2 elements in an array*/ 
    private function foundInArray (array $array, string $userString, string $collegeString) :bool
    {
        if( in_array ($userString,$array) && in_array ($collegeString,$array) )
            return true;
        else
            return false;
    }

    // search 4 elements in an array
    private function foundInArrayMoreStrings (array $array, string $userString, string $collegeString1,
                                              string $collegeString2, string $collegeString3) :bool
    {
        
        if($this->foundInArray ($array, $userString, $collegeString1) ||
           $this->foundInArray ($array, $userString, $collegeString2) ||
           $this->foundInArray ($array, $userString, $collegeString3)) 
               
            return true;  

        else
            return false;

    }

    private function compareSubject (string $userString, string $collegeString1,
                                     string $collegeString2, string $collegeString3) :int
    {

        $subjectBiologie = array ("Chimie","Biologie","Fizica","Matematica");
        $subjectStraine = array ("Engleza","Franceza","Germana","Spaniola","Latina");
        $subjectMatematica = array ("Matematica","Fizica","Informatica");
        $subjectInformatica = array ("TIC","Informatica","Matematica");
        $subjectAntreprenor = array ("ATP","Economie","Educatie civica");
        $subjectPsihologie = array ("Psihologie","Sociologie");
        $subjectGeografie = array ("Geografie","Istorie");

        if($userString == $collegeString1 || $userString == $collegeString2 || $userString == $collegeString3)
            return 5;

        if($this->foundInArrayMoreStrings ($subjectBiologie, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectStraine, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectMatematica, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectInformatica, $userString, $collegeString1, $collegeString2, $collegeString3) || 
           $this->foundInArrayMoreStrings ($subjectAntreprenor, $userString, $collegeString1, $collegeString2, $collegeString3) ||
        )
            return 3;
        
        return 0;


    }

    private function comparePassion () :int
    {

    }



}