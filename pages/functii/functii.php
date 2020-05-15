<?php

function getMainErrorMessage ($errorType, $message) {

  if(isset($_GET['error']) && $_GET['error']==$errorType)
    echo $message;
    
}

function getSecondErrorMessage ($errorType, $message) {

  if(isset($_GET['error']) && $_GET['error']==$errorType)
    echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
    
}
function getSuccesMessage ($succesType, $message) {

  if(isset($_GET['succes']) && $_GET['succes']==$succesType)
    echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
    
}

function binarySearch (Array $array, $target) {

  if (count($array) === 0) return false;
  
	$leftBond = 0;
  $rightBond = count($array) - 1;
  
	while ($leftBond <= $rightBond) {
    $middleNumber = floor(($leftBond + $rightBond) / 2);
    
    if($array[$middleNumber] == $target)  return true;
    
		if ($target < $array[$middleNumber])
			$rightBond = $middleNumber -1;
		else
			$leftBond = $middleNumber + 1;
  }
  
	return false;
}

  function checkExists($target, $array){
    for ($ndex=0; $ndex < count($array); $ndex++) 
      if(in_array($target, $array[index])) return $index;
    return -1;
}

function compareClass ($valoare1,$valoare_user,$valoare2,$valoare3) {

  //TODO: get those arries from datebase
  $materii_biologie=array("Chimie","Biologie","Fizica","Matematica");
  $materii_straine=array("Engleza","Franceza","Germana","Spaniola","Latina");
  $materii_matematica=array("Matematica","Fizica","Informatica");
  $materii_informatica=array("TIC","Informatica");
  $materii_antreprenor=array("ATP","Economie","Educatie civica");
  $materii_psihologie=array("Psihologie","Sociologie");
  $materii_geografie=array("Geografie","Istorie");

  if(($valoare_user == $valoare1) || ($valoare_user == $valoare2) || ($valoare_user == $valoare3))  return 5;

  if((in_array($valoare1,$materii_straine) && in_array($valoare_user,$materii_straine)) || 
      (in_array($valoare2,$materii_straine) && in_array($valoare_user,$materii_straine)) || 
      (in_array($valoare3,$materii_straine) && in_array($valoare_user,$materii_straine)))  return 3;

  if((in_array($valoare1,$materii_biologie) && in_array($valoare_user,$materii_biologie)) || 
      (in_array($valoare2,$materii_biologie) && in_array($valoare_user,$materii_biologie)) || 
      (in_array($valoare3,$materii_biologie) && in_array($valoare_user,$materii_biologie)))  return 3;

  if((in_array($valoare1,$materii_matematica) && in_array($valoare_user,$materii_matematica)) || 
      (in_array($valoare2,$materii_matematica) && in_array($valoare_user,$materii_matematica)) || 
      (in_array($valoare3,$materii_matematica) && in_array($valoare_user,$materii_matematica)))  return 3;

  if((in_array($valoare1,$materii_informatica) && in_array($valoare_user,$materii_informatica)) || 
      (in_array($valoare2,$materii_informatica) && in_array($valoare_user,$materii_informatica)) || 
      (in_array($valoare3,$materii_informatica) && in_array($valoare_user,$materii_informatica)))  return 3;

  if((in_array($valoare1,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor)) || 
      (in_array($valoare2,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor)) || 
      (in_array($valoare3,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor)))  return 3;

  if((in_array($valoare1,$materii_psihologie) && in_array($valoare_user,$materii_psihologie)) || 
      (in_array($valoare2,$materii_psihologie) && in_array($valoare_user,$materii_psihologie)) || 
      (in_array($valoare3,$materii_psihologie) && in_array($valoare_user,$materii_psihologie)))  return 3;

  if((in_array($valoare1,$materii_geografie) && in_array($valoare_user,$materii_geografie)) || 
      (in_array($valoare2,$materii_geografie) && in_array($valoare_user,$materii_geografie)) || 
      (in_array($valoare3,$materii_geografie) && in_array($valoare_user,$materii_geografie)))  return 3;
  
  return 0;
}

function compareBranch ($valoare,$valoare_user) {

  $profile_filo=array("Filologie","Stiinte-sociale");
  $profile_real=array("Mate-info","Stiinte ale naturii");

  if($valoare_user == $valoare) return 10;
  if(in_array($valoare,$profile_filo) && in_array($valoare_user,$profile_filo)) return 5;
  if(in_array($valoare,$profile_real) && in_array($valoare_user,$profile_real)) return 5;
  
  return 0;
}

function comparePassion ($valoare,$valoare_user, $intensity) {

  $pasiune_programare=array("Matematica","Programare/Calculatoare","Electronica","Cibernetica");
  $pasiune_fizica=array("Matematica","Fizica","Astronomie","Arhitectura","Constructii","Inginerie electrica","Electronica","Inginerie Aerospatila");
  $pasiune_medicina=array("Chimie","Medicina","Biologie","Animale","Agricultura","Ecologie","Animale");
  $pasiune_politica=array("Politica","Drept");
  $pasiune_lingvistica=array("Limbi straine","Literatura","Limba romana","Filozofie","Psihologie");
  $pasiune_jurnalism=array("Jurnalism","Editare video/sunet","Regie","Actorie");
  $pasiune_geografie=array("Geografie","Istorie");
  $pasiune_sport=array("Biologie","Medicina","Sport");
  $pasiune_afaceri=array("Business","Economie","Matematica");
  $pasiune_serviciu=array("Drept","Serviciul in cadrul politiei","Serviciul militar");
  $pasiune_design=array("Design","Desen","Editare video/sunet");
  $pasiune_religie=array("Religie","Istorie");
  $pasiune_geologie=array("Geologie","Geografie","Biologie");

  if($valoare_user == $valoare) return $intensity * 10;

  if( (in_array($valoare,$pasiune_programare) && in_array($valoare_user,$pasiune_programare)) ||
      (in_array($valoare,$pasiune_fizica) && in_array($valoare_user,$pasiune_fizica)) ||
      (in_array($valoare,$pasiune_medicina) && in_array($valoare_user,$pasiune_medicina)) ||
      (in_array($valoare,$pasiune_politica) && in_array($valoare_user,$pasiune_politica)) ||
      (in_array($valoare,$pasiune_jurnalism) && in_array($valoare_user,$pasiune_jurnalism)) ||
      (in_array($valoare,$pasiune_geografie) && in_array($valoare_user,$pasiune_geografie)) ||
      (in_array($valoare,$pasiune_sport) && in_array($valoare_user,$pasiune_sport)) ||
      (in_array($valoare,$pasiune_afaceri) && in_array($valoare_user,$pasiune_afaceri)) ||
      (in_array($valoare,$pasiune_serviciu) && in_array($valoare_user,$pasiune_serviciu)) ||
      (in_array($valoare,$pasiune_design) && in_array($valoare_user,$pasiune_design)) ||
      (in_array($valoare,$pasiune_religie) && in_array($valoare_user,$pasiune_religie)) ||
      (in_array($valoare,$pasiune_geologie) && in_array($valoare_user,$pasiune_geologie)) )
      
      return $intensity * 5;
  
  return 0;
}

function compareCounty ($valoare,$valoare_user){

  $judet_sud=array("Ilfov","Prahova","Teleorman","Giurgiu","Calarasi","Constanta","Tulcea","Braila","Buzau","Bucuresti","Dambovita","Arges","Valcea","Gorj","Mehedinti","Dolj","Brasov");
  $judet_transilvania=array("Satu-Mare","Maramures","Bihor","Arad","Timis","Caras-Severin","Hunedoara","Alba","Cluj","Salaj","Sibiu","Brasov","Covasna","Harghita","Mures","Bistrita-Nasaud","Cluj");
  $judet_moldova=array("Galati","Vrancea","Bacau","Iasi","Neamt","Suceava","Botosani","Harghita","Brasov","Covasna");


  if($valoare_user == $valoare) return 10;
  if(in_array($valoare,$judet_sud) && in_array($valoare_user,$judet_sud)) return 3;
  if(in_array($valoare,$judet_transilvania) && in_array($valoare_user,$judet_transilvania)) return 3;
  if(in_array($valoare,$judet_moldova) && in_array($valoare_user,$judet_moldova)) return 3;

  return 0;
}

function getCompability ($array, $user) {
    $compabilityCounter = 0;
    $maxMatch = 110; //TODO: auto implement

    if($user[0]['job'] == $array['job'])  $compabilityCounter += 5;
    if($user[0]['carti'] == $array['carti'])  $compabilityCounter += 5;
    if($user[0]['sociabil'] == $array['sociabil'])  $compabilityCounter += 5;
    if($user[0]['sport'] == $array['sport'])  $compabilityCounter += 5;
    if($user[0]['stres'] == $array['stres'])  $compabilityCounter += 5;

    $compabilityCounter += compareClass($array['materie1'],$user[0]['materie1'],$array['materie2'],$array['materie3']);
    $compabilityCounter += compareClass($array['materie2'],$user[0]['materie2'],$array['materie2'],$array['materie3']);
    $compabilityCounter += compareClass($array['materie3'],$user[0]['materie3'],$array['materie2'],$array['materie3']);
    $compabilityCounter += compareBranch($array['Profil'],$user[0]['Profil']);
    $compabilityCounter += compareCounty($array['Judet'],$user[0]['Judet']);
    $compabilityCounter += comparePassion($user[0]['Domeniu'],$array['pasiune_facultati'], $user[0]['domeniu_intensitate']);

    return floor(($compabilityCounter/$maxMatch) * 100);
}




?>
