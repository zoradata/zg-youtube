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

         $events = array ('onReady' => 'onPlayerReady',
                          'onStateChange' => 'onPlayerStateChange');
         // echo $youtube->loader();
         $height = 360;
         $width = 640;
         echo $youtube->player('M7lc1UVf-VE', $height, $width, array('controls' => 0), $events);
         
      ?>
   </body>

</html>
