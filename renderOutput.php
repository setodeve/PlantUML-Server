
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';

use function Jawira\PlantUml\encodep;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = file_get_contents('php://input');
  $array = json_decode($input, true);
  echo generateImg($array["textData"]);
}

function generateImg($input){
  $encode = encodep($input);
  return "https://www.plantuml.com/plantuml/png/$encode";
}

?>