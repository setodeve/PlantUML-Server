
<?php
spl_autoload_extensions(".php"); 
spl_autoload_register();
require_once 'vendor/autoload.php';
$json = file_get_contents('./public/data.json');
$array = json_decode($json,true);
?>

<!DOCTYPE html>
<html>
  <?php include('./component/head.php'); ?>
  <body>
  <div class="header">
    <h1>PlantUML-Server</h1>
  </div>
    <ul class="problems-container">
      <?php foreach ($array as $data): ?>
        <li class="problem-container">
          <div><?php echo $data["title"]?></div>
          <a href=<?php echo "/answer.php?title={$data["title"]}" ?> class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Soleve</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>