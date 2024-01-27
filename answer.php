
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
      <div id="output-container"></div>
      <div id="answer-container">
        <div class="m-2">
          <button id="buttonUML" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Answer UML</button>
          <button id="buttonCODE" class="mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Answer CODE</button>
        </div>
        <div id="answer-container-show"></div>
      </div>
      <a href="./index.php" class="m-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Return</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
		<script src="./public/index.js"></script>
    <script type="module" src="./public/answer.js"></script>
  </body>
</html>