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
    private $pictureCollege;
    public $compabilityCollege;
    private $linkCollege;

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

    //save the compability in an object
    public function saveCompability(int $compability) :void
    {

        $this->compabilityCollege = $compability;

    }
    
    //echo information for 1 college
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

    //binary search
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

    //show the favorite college
    public function favoriteCollegeFound() :string
    {

        if(binarySearch($this->getFavoriteColleges(), $this->idCollege))
            return '<button type="submit" style="all: unset" name="scoatere" id="'.$this->idCollege.'" value="'.$this->idCollege.'">
                  <i class="fas fa-heart"></i> Scoate de la favorite</button>';
        else
            return '<button type="submit" style="all: unset" name="adaugare" id="'.$this->idCollege.'" value="'.$this->idCollege.'">
                   <i class="far fa-heart"></i> Adauga la favorite</button>';

    }

    //get from the database all the colleges from the favorite table
    private function getFavoriteColleges() :array
    {

        $mysql = "SELECT * FROM favorite WHERE idUser = '$id' AND tip = '$tip'";
        $stmt = $this->connection()->query($mysql);

        $rows = $stmt->fetchAll();
        return sort($rows);

    }



}

