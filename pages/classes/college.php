<?php
require './folderlogin/datacon.php';
require './functii/functii.php';

class College extends Database
{



    private $idCollege;
    private $nameCollege;
    private $universityCollege;
    private $countyCollege;
    private $profilCollege;
    private $getCompabilityCollege;
    private $linkCollege;
    private $compabilityCollege;

    function __construct(int $idCollege,string $nameCollege,string $universityCollege,string $countyCollege,string $profilCollege,
                         string $linkCollege,string $pictureCollege)
    {
        $this->idCollege = $idCollege;
        $this->nameCollege = $nameCollege;
        $this->universityCollege = $universityCollege;
        $this->countyCollege = $countyCollege;
        $this->profilCollege = $profilCollege;
        $this->linkCollege = $linkCollege;
        $this->pictureCollege = $pictureCollege;
    }

    public function saveCompability(int $compability) :void
    {

        $this->compabilityCollege = $compability;

    }
    
    public function echoCollege() :void
    {
        echo "<div class=\"col card\">
                <!--Image Background-->
                <div class=\"row-lg-4 backgrounded\"></div>
                <!--Print the proprities-->
                <div class=\"row-lg-2 name\">
                    $this->nameCollege                 
                </div>
                <div class=\"row-lg-3 prop text-center\">
                    <div class=\"col\">
                        <div class=\"row\">
                            <div class=\"col\">
                                $this->universityCollege
                            </div>
                        </div>
                        <div class=\"row justify-content-between\">
                            <div class=\"col\">

                                     $this->compabilityCollege
                            
                                <i class=\"fas fa-percentage\"></i></div>
                            <div class=\"col\">

                                $this->countyCollege

                                <i class=\"fas fa-city\"></i>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col\">
                                
                                    $this->profilColllege

                                <i class=\"fas fa-code-branch\"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"row-lg-3 fav text-center\">
                    <form action=\"./favoriteAlg.php\" method=\"post\">
                        
                        $this->favoriteCollegeFound()

                    </form>
                </div>
                <div class=\"row-lg-3 extra text-center\">
                    <a href=\"
                        
                        $this->linkCollege;
                        
                        \" target=\"_blank\">Afla mai mult</a>
                </div>
            </div>";
    }

    private function binarySearch(array $array,$target) :bool
    {

        if (count($array) === 0) return false;
  
	    $leftBond = 0;
        $rightBond = count($array) - 1;
  
        while ($leftBond <= $rightBond) 
        {
            $middleNumber = floor(($leftBond + $rightBond) / 2);
    
            if($array[$middleNumber] == $target)  
                return true;
    
		    if ($target < $array[$middleNumber])
			    $rightBond = $middleNumber -1;
		    else
			    $leftBond = $middleNumber + 1;
        }
  
	    return false;

    }

    public function favoriteCollegeFound() :void
    {

        if(binarySearch($this->getFavoriteColleges(), $this->idCollege))
            echo '<button type="submit" style="all: unset" name="scoatere" id="'.$this->idCollege.'" value="'.$this->idCollege.'">
                  <i class="fas fa-heart"></i> Scoate de la favorite</button>';
        else
             echo '<button type="submit" style="all: unset" name="adaugare" id="'.$this->idCollege.'" value="'.$this->idCollege.'">
                   <i class="far fa-heart"></i> Adauga la favorite</button>';

    }

    private function getFavoriteColleges() :array
    {

        $mysql = "SELECT * FROM favorite WHERE idUser = '$id' AND tip = '$tip'";
        $stmt = $this->connection()->query($mysql);

        $rows = $stmt->fetchAll();
        return sort($rows);

    }



}

//GET USER INFO FROM DATABASE
if (isset($_SESSION['mailUser'])) {
  $mail = $_SESSION['mailUser'];
  $sql = "SELECT * FROM users WHERE mailUser=?";
}
if (isset($_SESSION['mailGmail'])) {
  $mail = $_SESSION['mailGmail'];
  $sql = "SELECT * FROM users_gmail WHERE mailGmail =?";
}
  $stmt=mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt,$sql))
  {
      header("Location: ./indexpp.php?error=mysqlerror");
      exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$mail);
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  $user = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user[] = $row;
    }
}


// GET COLLEGES FROM DATABASE
$sql = "SELECT * FROM facultati";
$result = mysqli_query($connection,$sql);
$myArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }
}

$facultati = array();

// GET DATA
foreach ($myArray as $_facultate) {
    $temp = new facultate();
    $temp->Indexf=$_facultate['Indexf'];
    $temp->nume = $_facultate['Numef'];
    $temp->universitate = $_facultate['Universitatea'];
    $temp->judet = $_facultate['Judet'];
    $temp->profil = $_facultate['Profil'];
    $temp->compabilitate = getCompability($_facultate, $user);
    $temp->link = $_facultate['link_facultate'];
    array_push($facultati, $temp);
}
