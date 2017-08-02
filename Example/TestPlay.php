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
         
         $height = 360;
         $width = 640;
         $params = array('controls' => 1);
         $eventPlayerReady = 'function onPlayerReady(event)
                              {
                                event.target.playVideo();
                              }';
         $eventPlayerStateChange = 'var done = false;
                                    function onPlayerStateChange(event)
                                    {
                                       if (event.data == YT.PlayerState.PLAYING && !done)
                                       {
                                          setTimeout(stopVideo, 6000);
                                          done = true;
                                       }
                                    }
                                    function stopVideo()
                                    {
                                       player.stopVideo();
                                    }';
         $events = array ('onReady' => array('onPlayerReady', $eventPlayerReady),
                          'onStateChange' => array('onPlayerStateChange', $eventPlayerStateChange));

         echo $youtube->player('M7lc1UVf-VE', $height, $width, $params, $events);
         
      ?>
   </body>

</html>
