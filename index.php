
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';

use function Jawira\PlantUml\encodep;

$diagram = <<<TXT
@startuml
Bob -> Alice : hello
@enduml
TXT;

$encode = encodep($diagram); // SyfFKj2rKt3CoKnELR1Io4ZDoSa70000

// echo "https://www.plantuml.com/plantuml/uml/$encode";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantUML-Server</title>
    <link rel="stylesheet" type="text/css" href="./public/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div id="container">
      <div id="input-container"></div>
      <div id="output-container"></div>
      <div id="answer-container"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
		<script src="./public/index.js"></script>
  </body>
</html>