<?php



class User extends Database
{
    
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
    public $soccialUser;
    public $stressUser;
    public $countyUser;
    public $pictureUser;

    public $arrayColleges;

    protected $idUser;
    protected $emailUser;
    protected $typeUser;


    function __construct()
    {
        session_start();

        if(isset($_SESSION['mail']))
            $this->emailUser = $_SESSION['mail'];
        if(isset($_SESSION['type']))
            $this->typeUser = $_SESSION['type'];

    }

    //check if session exists
    public function checkConnectedUserIsset() :void
    {

        if( isset($this->emailUser) && isset($this->typeUser) )
        {
            header("Location: ./home.php");
            exit();
        }
    
    }

    //check if session doesn't exist 
    public function checkConnectedUserEmpty () :void
    {

        if(empty($this->emailUser) && empty($this->typeUser))
        {
            header("Location: ../index.php");
            exit();
        }
    
    }

    //search for data of the user in the table users
    protected function searchConnectedUser() :array
    {
        
        $mysql = 'SELECT * FROM users WHERE mail_user= ? AND type_user= ?';
        $stmt = $this->connection()->prepare($mysql);

        $stmt->execute( [$this->emailUser, $this->typeUser] );
        $row = $stmt->fetch(); 

        return $row;

    }

    // check if the form with questions is completed
    // use  this in all pages execpt reset,register and login
    public function checkFormCompleted() :void
    {

        
        $this->checkConnectedUserEmpty();

        $arrayUserInformation = $this->searchConnectedUser();

        //verify if the formular is completed
        if ( empty($arrayUserInformation['profil_user']))
        {
            header("Location: ./formularTemplate.php");
            exit();
        }
        else 
        {
            //public all
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

    }

    //algorithm to calculate the compability for every college 
    protected function collegeAndUserCompability (int $jobCollege,int $sportCollege,int $soccialCollege,int $stressCollege,
                                                  string $profilCollege,string $passionCollege,string $subject1College,
                                                  string $subject2College,string $subject3College,string $countyCollege,
                                                  string $booksCollege) :int
    {
        
        $compabilitySum = 0;
        $compabilityMax = 110;

        if($this->booksUser == $booksCollege)
            $compabilitySum +=5;

        $compabilitySum += $this->compareSimpleElements($this->jobUser,$jobCollege);
        $compabilitySum += $this->compareSimpleElements($this->sportUser,$sportCollege);
        $compabilitySum += $this->compareSimpleElements($this->soccialUser,$soccialCollege);
        $compabilitySum += $this->compareSimpleElements($this->stressUser,$stressCollege);

        $compabilitySum += $this->compareProfil($profilCollege);
        $compabilitySum += $this->comparePassion($passionCollege);
        $compabilitySum += $this->compareSubject($subject1College);
        $compabilitySum += $this->compareSubject($subject2College);
        $compabilitySum += $this->compareSubject($subject3College);
        $compabilitySum += $this->compareCounty($countyCollege);

        return floor(($compabilitySum/$compabilityMax) * 100);
        
    }


    //get all the colleges from the database
    protected function getAllColleges () :array
    {

        $mysql = 'SELECT * FROM college';
        $stmt = $this->connection()->query($mysql);

        $rows = $stmt->fetchAll();
        return $rows;

    }

    //compare the values from the college with 0 and 1 stored in them
    protected function compareSimpleElements (int $userIntSimpleValues,int $collegeIntSimpleValues) :int
    {

        if($userIntSimpleValues == $collegeIntSimpleValues)
            return 5;

    } 

    /*search 2 elements in an array*/ 
    protected function foundInArray (array $array, string $userString, string $collegeString) :bool
    {
        if( in_array ($userString,$array) && in_array ($collegeString,$array) )
            return true;
        return false;
    }

    // search 4 elements in an array
    protected function foundInArrayMoreStrings (array $array, string $collegeString,string $userString1,
                                              string $userString2,string $userString3) :bool
    {
        
        if($this->foundInArray ($array, $collegeString, $userString1) ||
           $this->foundInArray ($array, $collegeString, $userString2) ||
           $this->foundInArray ($array, $collegeString, $userString3)) 
               
            return true;  

        
        return false;

    }

    //compare the subject between college and user
    protected function compareSubject (string $collegeSubject) :int
    {

        $subjectBiology = array ("Chimie","Biologie","Fizica","Matematica");
        $subjecForeign = array ("Engleza","Franceza","Germana","Spaniola","Latina");
        $subjectMath = array ("Matematica","Fizica","Informatica");
        $subjectComputerScience = array ("TIC","Informatica","Matematica");
        $subjectBussines = array ("ATP","Economie","Educatie civica");
        $subjectPsychology = array ("Psihologie","Sociologie");
        $subjectGeografy = array ("Geografie","Istorie");

        if($this->subject1User == $collegeSubject || $this->subject2User == $collegeSubject || $this->subject3User == $collegeSubject)
            return 5;

        if($this->foundInArrayMoreStrings ($subjectBiology, $collegeSubject, $this->subject1User,
                                           $this->subject2User, $this->subject3User) ||
           $this->foundInArrayMoreStrings ($subjectForeign, $collegeSubject, $this->subject1User,
                                           $this->subject2User, $this->subject3User) ||
           $this->foundInArrayMoreStrings ($subjectMath, $collegeSubject, $this->subject1User,
                                           $this->subject2User, $this->subject3User) ||
           $this->foundInArrayMoreStrings ($subjectComputerScience, $collegeSubject, $this->subject1User,
                                           $this->subject2User, $this->subject3User) || 
           $this->foundInArrayMoreStrings ($subjectPsychology, $collegeSubject, $this->subject1User,
                                           $this->subject2User, $this->subject3User) ||
           $this->foundInArrayMoreStrings ($subjectGeografy, $collegeSubject, $this->subject1User,
                                           $this->subject2User, $this->subject3User)
          )
            return 3;
        
        return 0;


    }

    //compare the passion between college and user
    protected function comparePassion (string $collegePassion) :int
    {

        $passionPrograming = array ("Matematica","Programare/Calculatoare","Electronica","Cibernetica");
        $passionIngeniring = array ("Matematica","Fizica","Astronomie","Arhitectura","Constructii","Inginerie electrica",
                                    "Electronica","Inginerie Aerospatila");
        $passionMedicine = array ("Chimie","Medicina","Biologie","Animale","Agricultura","Ecologie","Animale");
        $passionPolitics = array ("Politica","Drept");
        $passionLinguistics = array ("Limbi straine","Literatura","Limba romana","Filozofie","Psihologie");
        $passionJournalism = array ("Jurnalism","Editare video/sunet","Regie","Actorie");
        $passionGeografy = array ("Geografie","Istorie");
        $passionSport = array ("Biologie","Medicina","Sport");
        $passionBussines = array ("Business","Economie","Matematica");
        $passionMilitary = array ("Drept","Serviciul in cadrul politiei","Serviciul militar");
        $passionDesign = array ("Design","Desen","Editare video/sunet");
        $passionReligion = array ("Religie","Istorie");
        $passionGeology  = array ("Geologie","Geografie","Biologie");

        if($this->passionUser == $collegePassion) 
            return $this->passionIntensityUser * 10;

        if( $this->foundInArray ($passionPrograming, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionIngeniring, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionMedicine, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionPolitics, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionLinguistics, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionJournalism, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionGeografy, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionSport, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionBussines, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionMilitary, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionDesign, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionReligion, $this->passionUser, $collegePassion) ||
            $this->foundInArray ($passionGeology, $this->passionUser, $collegePassion) )
      
            return $this->passionIntensityUser * 5;
  
        return 0;

    }

    //compare the county between college and user
    protected function compareCounty(string $collegeCounty) :int
    {

        $countySud = array("Ilfov","Prahova","Teleorman","Giurgiu","Calarasi","Constanta","Tulcea","Braila",
                         "Buzau","Bucuresti","Dambovita","Arges","Valcea","Gorj","Mehedinti","Dolj","Brasov"
                        );
        $countyTransilvania = array("Satu-Mare","Maramures","Bihor","Arad","Timis","Caras-Severin","Hunedoara",
                                  "Alba","Cluj","Salaj","Sibiu","Brasov","Covasna","Harghita","Mures","Bistrita-Nasaud",
                                 );
        $countyMoldova = array("Galati","Vrancea","Bacau","Iasi","Neamt","Suceava","Botosani","Harghita","Brasov","Covasna");

        if($this->countyUser == $collegeCounty) 
            return 10;


        if($this->foundInArray ($countySud, $this->countyUser, $collegeCounty) ||
           $this->foundInArray ($countyTransilvania, $this->countyUser, $collegeCounty) || 
           $this->foundInArray ($countyMoldova, $this->countyUser, $collegeCounty) 
          ) 
            return 3;

        
        return 0;

    }

    //compare the profil between college and user
    protected function compareProfil (string $collegeProfil) :int
    {

        $profilFilo = array("Filologie","Stiinte-sociale");
        $profilMath = array("Mate-info","Stiinte ale naturii");

        if($this->profilUser == $collegeProfil) 

            return 10;

        if($this->foundInArray ($profilFilo, $this->profilUser, $collegeProfil) || 
           $this->foundInArray ($profilMath, $this->profilUser, $collegeProfil)
          ) 

            return 5;

        return 0;

    }


}