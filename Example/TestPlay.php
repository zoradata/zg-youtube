<?php
include_once '../Class/ZgYoutubePlay.php';
?>

<html>
   <head>
   </head>

   <body>
      <div id="player"></div>
      <?php
         $youtube = new \Zoradata\ZgYoutubePlay();

         // echo $youtube->loader();
         echo $youtube->player('M7lc1UVf-VE');
         
      ?>
   </body>

</html>
