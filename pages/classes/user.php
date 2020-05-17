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
    public $socialUser;
    public $stressUser;
    public $countyUser;
    public $pictureUser;

    public $arrayColleges;

    protected $idUser;
    protected $emailUser;
    protected $typeUser;

    protected $arrayUserInformation;

    function __construct(string $session,string $type)
    {
        $this->emailUser = $session;
        $this->typeUser = $type;

    }

    //check if session exists
    public function checkConnectedUserIsset () :void
    {

        if( isset($this->emailUser) && isset($this->typeUser) )
        {
            header("Location: ../homePage.php");
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


    public function checkFormCompleted() :void
    {

        
        
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

    protected function collegeAndUserCompability (int $jobCollege)
    {
        
        $compabilitySum = 0;
        $compabilityMax = 110;

        $compabilitySum += $this->compareSimpleElements($this->jobUser,$jobCollege);
        $compabilitySum += $this->compareSimpleElements();


        
    }



    protected function getAllColleges () :array
    {

        $mysql = 'SELECT * FROM college';
        $stmt = $this->connection()->query($mysql);

        $rows = $stmt->fetchAll();
        return $rows;

    }

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
        else
            return false;
    }

    // search 4 elements in an array
    protected function foundInArrayMoreStrings (array $array, string $userString, string $collegeString1,
                                              string $collegeString2, string $collegeString3) :bool
    {
        
        if($this->foundInArray ($array, $userString, $collegeString1) ||
           $this->foundInArray ($array, $userString, $collegeString2) ||
           $this->foundInArray ($array, $userString, $collegeString3)) 
               
            return true;  

        else
            return false;

    }

    protected function compareSubject (string $userString, string $collegeString1,
                                     string $collegeString2, string $collegeString3) :int
    {

        $subjectBiology = array ("Chimie","Biologie","Fizica","Matematica");
        $subjecForeign = array ("Engleza","Franceza","Germana","Spaniola","Latina");
        $subjectMath = array ("Matematica","Fizica","Informatica");
        $subjectComputerScience = array ("TIC","Informatica","Matematica");
        $subjectBussines = array ("ATP","Economie","Educatie civica");
        $subjectPsychology = array ("Psihologie","Sociologie");
        $subjectGeografy = array ("Geografie","Istorie");

        if($userString == $collegeString1 || $userString == $collegeString2 || $userString == $collegeString3)
            return 5;

        if($this->foundInArrayMoreStrings ($subjectBiology, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectForeign, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectMath, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectComputerScience, $userString, $collegeString1, $collegeString2, $collegeString3) || 
           $this->foundInArrayMoreStrings ($subjectPsychology, $userString, $collegeString1, $collegeString2, $collegeString3) ||
           $this->foundInArrayMoreStrings ($subjectGeografy, $userString, $collegeString1, $collegeString2, $collegeString3)
          )
            return 3;
        
        return 0;


    }

    protected function comparePassion (string $userString,string $collegeString) :int
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

        if($userString == $collegeString) 
            return $this->passionIntensityUser * 10;

        if( $this->foundInArray ($passionPrograming, $userString, $collegeString) ||
            $this->foundInArray ($passionIngeniring, $userString, $collegeString) ||
            $this->foundInArray ($passionMedicine, $userString, $collegeString) ||
            $this->foundInArray ($passionPolitics, $userString, $collegeString) ||
            $this->foundInArray ($passionLinguistics, $userString, $collegeString) ||
            $this->foundInArray ($passionJournalism, $userString, $collegeString) ||
            $this->foundInArray ($passionGeografy, $userString, $collegeString) ||
            $this->foundInArray ($passionSport, $userString, $collegeString) ||
            $this->foundInArray ($passionBussines, $userString, $collegeString) ||
            $this->foundInArray ($passionMilitary, $userString, $collegeString) ||
            $this->foundInArray ($passionDesign, $userString, $collegeString) ||
            $this->foundInArray ($passionReligion, $userString, $collegeString) ||
            $this->foundInArray ($passionGeology, $userString, $collegeString) )
      
            return $this->passionIntensityUser * 5;
  
        return 0;

    }

    protected function compareCounty(string $userString,string $collegeString) :int
    {

        $countySud = array("Ilfov","Prahova","Teleorman","Giurgiu","Calarasi","Constanta","Tulcea","Braila",
                         "Buzau","Bucuresti","Dambovita","Arges","Valcea","Gorj","Mehedinti","Dolj","Brasov"
                        );
        $countyTransilvania = array("Satu-Mare","Maramures","Bihor","Arad","Timis","Caras-Severin","Hunedoara",
                                  "Alba","Cluj","Salaj","Sibiu","Brasov","Covasna","Harghita","Mures","Bistrita-Nasaud",
                                 );
        $countyMoldova = array("Galati","Vrancea","Bacau","Iasi","Neamt","Suceava","Botosani","Harghita","Brasov","Covasna");

        if($userString == $collegeString) 
            return 10;


        if($this->foundInArray ($countySud, $userString, $collegeString) ||
           $this->foundInArray ($countyTransilvania, $userString, $collegeString) || 
           $this->foundInArray ($countyMoldova, $userString, $collegeString) 
          ) 
            return 3;

        
        return 0;

    }

    protected function compareProfil (string $userString,string $collegeString) :int
    {

        $profilFilo = array("Filologie","Stiinte-sociale");
        $profilMath = array("Mate-info","Stiinte ale naturii");

        if($valoare_user == $valoare) 

            return 10;

        if($this->foundInArray ($profilFilo, $userString, $collegeString) || 
           $this->foundInArray ($profilMath, $userString, $collegeString)
          ) 

            return 5;

        return 0;

    }



}