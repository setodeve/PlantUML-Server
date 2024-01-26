
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';
use function Jawira\PlantUml\encodep;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = file_get_contents('php://input');
  $array = json_decode($input, true);
  if ($array["type"]=="UML"){
    $data = array(
      "data" =>generateImg($array["textData"]),
      "type" => $array["type"]
    );
  }else{
    $data = array(
      "data" => generateCode($array["textData"]),
      "type" => $array["type"]
    );
  }
  echo json_encode($data);
}

function generateImg($input){
  $encode = encodep($input);
  return "https://www.plantuml.com/plantuml/png/$encode";
}

function generateCode($input){
  $Parsedown = new Parsedown();
  return $Parsedown->text($input);
}

?>