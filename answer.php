
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';
$json = file_get_contents('./public/data.json');
$array = json_decode($json,true);
$answer;
foreach ($array as $data){
  if ($data["title"]==$_GET['title']){
    $answer = $data;
    break;
  }
}
?>

<!DOCTYPE html>
<html>
  <?php include('./component/head.php'); ?>
  <body>
    <div class="title">
      <h1><?php echo $answer['title'] ?></h1>
    </div>
    <div id="container">
      <div id="input-container"></div>
      <div id="output-container">
        <div class="m-2">
          <h3>Download</h3>
          <button id="buttonPNG" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">PNG</button>
          <button id="buttonSVG" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">SVG</button>
          <button id="buttonTXT" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">TXT</button>
        </div>
        <div id="output-container-show"></div>
      </div>
      <div id="answer-container">
        <div class="m-2">
          <h3>Answer</h3>
          <button id="buttonUML" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">UML</button>
          <button id="buttonCODE" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">CODE</button>
        </div>
        <div id="answer-container-show"></div>
      </div>
      <a href="./index.php" class="m-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Return</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
		<script type="module" src="./public/index.js"></script>
    <script type="module" src="./public/answer.js"></script>
  </body>
</html>