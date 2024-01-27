
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';
use function Jawira\PlantUml\encodep;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = file_get_contents('php://input');
  $array = json_decode($input, true);
  // echo generateImg($array["textData"]);
  $encode = generate($array["textData"]);
  if ($array["type"]=="svg"){
    $encode = "https://www.plantuml.com/plantuml/svg/" . $encode;
  }elseif ($array["type"]=="txt"){
    $encode = "https://www.plantuml.com/plantuml/txt/" . $encode;
  }else{
    $encode = "https://www.plantuml.com/plantuml/png/" . $encode;
  }
  echo $encode;
}

function generate($input){
  return encodep($input);
}

?>