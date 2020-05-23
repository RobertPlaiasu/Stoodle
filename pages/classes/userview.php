<?php


class UserView extends User
{

    //construct is inherited from User


    private $collegesAll;

    //messages for form errors
    public function getMainErrorMessage (string $errorType,string $message)
    {

        if(isset($_GET['error']) && $_GET['error'] === $errorType)
            echo $message;
          
    }

    public function getSecondErrorMessage ($errorType, $message) 
    {

        if(isset($_GET['error']) && $_GET['error'] == $errorType)
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
          
    }

    //save the data from each college in an array  
    public function getSuccesMessage ($succesType, $message) 
    {
      
        if(isset($_GET['succes']) && $_GET['succes']==$succesType)
          echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
          
    }

    //echo all the colleges
    private function allCollegesWithCompability() :array
    {

        $colleges = $this->getAllColleges();
        $collegesWithNewValues = array();

        foreach($colleges as $college)
        {

            $newCollege = new College($college['index_college'],$college['name_college'],$college['university_college'],
                                      $college['county_college'],$college['profil_college'],$college['link_college'],
                                      $college['picture_college']);
            
            $compability = $this->collegeAndUserCompability($college['job_college'],$college['sport_college'],
                                                            $college['soccial_college'],$college['stress_college'],
                                                            $college['profil_college'],$college['passion_college'],
                                                            $college['subject1_college'],$college['subject2_college'],
                                                            $college['subject3_college'],$college['county_college']);

            $newCollege->saveCompability($compability);

            array_push($collegesWithNewValues,$newCollege);

        }

        return $collegesWithNewValues;


    }

    private function functionFromUsort($first,$second) 
    {
    
        return $first->compabilitate < $second->compabilitate;
        
    }

    private function sortAllColleges() :void
    {

        $this->collegesAll = usort($this->allCollegesWithCompability(),$this->functionFromUsort()); 

    }

    public function echoAllColleges() :void
    {
        $this->sortAllColleges();

        foreach($this->collegesAll as $card)
        {

            $card->echoCollege();

        }

    }

    public function echoNavbar() :void
    {

        echo '<nav class="navbar navbar-expand-lg navbar-light">
        <a href="/">
             "Salut, '.$user->firstNameUser.'!"
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">☰</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="flex-direction: row-reverse;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="./home.php" class="nav-link">Acasa</a>
                </li>
                <li class="nav-item">
                    <a onclick="alert();" class="nav-link">Formular</a>
                </li>
                <li class="nav-item">
                    <a href="./contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="./favorite.php" class="nav-link">Facultati favorite</a>
                </li>
                <li class="nav-item">
                    <a href="./faq.php" class="nav-link">Intrebari</a>
                </li>
                <li class="nav-item">
                    <a href="./folderlogin/deconectphp.php" class="nav-link"> Deconectare</a>
                </li>
            </ul>
        </div>
    </nav>';

    } 


}