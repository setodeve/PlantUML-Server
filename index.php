
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';


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
      <div id="answer-container">
        <div class="m-2">
          <button id="buttonUML" onclick="proceedAnswer('UML')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Answer UML</button>
          <button id="buttonCODE" onclick="proceedAnswer('CODE')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Answer CODE</button>
        </div>
        <div id="answer-container-show"></div>
      </div>
      <button class="m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">戻る</button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
		<script src="./public/index.js"></script>
    <script src="./public/answer.js"></script>
  </body>
</html>