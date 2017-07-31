<?php
/**
 * Zg Graph
 *
 * Last revison: 31.7.2017
 * @copyright Copyright (c) 2017 ZoraData sdružení <http://www.zoradata.cz>
 * @author Jaroslav Šourek <jaroslav.sourek@zoradata.cz>
 * @version 1.0.5
 * 
 * Simple wrapper for Google Graphs
 * 
 */


namespace Zoradata;


class ZgYoutubePlay
{

    /** @var string URL URL Youtube IFrame Player API */
    protected $url;
    
    
    /**
     * Class initialization
     * @param string $url URL Youtube IFrame Player API
     */
    public function __construct($url = 'https://www.youtube.com/iframe_api')
    {
       $this->url = $url;
    }


   /**
    * Javascript for create player
    * @param string $video Video ID
    * @return string Javascript to create Player
    */
   public function loader()
   {
      $output = '<script type="text/javascript" src="' . $this->url . '"></script>';
      return $output;
   }
    
      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
//      var player;
//      function onYouTubeIframeAPIReady() {
//        player = new YT.Player('player', {
//          height: '360',
//          width: '640',
//          videoId: 'M7lc1UVf-VE',
//          events: {
//            'onReady': onPlayerReady,
//            'onStateChange': onPlayerStateChange
//          }
//        });
//      }

   /**
    * Javascript for create player
    * @param string $video Video ID
    * @param int $height IFrame height
    * @param int $width IFrame width
    * @param array $param Player parameters
    * @return string Javascript to create Player
    */
   public function player($video, $height = 360, $width = 640, $param = array())
   {
      return "<script>
                 var tag = document.createElement('script');
                 tag.src = '" . $this->url . "';
      
                 var firstScriptTag = document.getElementsByTagName('script')[0];
                 firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                 var player;
                 function onYouTubeIframeAPIReady() {
                 player = new YT.Player('player', {
                                                   videoId: '" . $video . "',
                                                   height: '" . $height . "',
                                                   width: '" . $width . "',
                 events: {
                         'onReady': onPlayerReady,
                         'onStateChange': onPlayerStateChange
                         }
                                                  });
                }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>";

      $output = '<script type="text/javascript"';
      $output .= "   var tag = document.createElement('script');";
      $output .= "   tag.src = '" . $this->url . "';";
      $output .= "   var firstScriptTag = document.getElementsByTagName('script')[0];";
      $output .= "   firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);";
      $output .= "   var player;";
      $output .= "   function onYouTubeIframeAPIReady()";
      $output .= "   {";
      $output .= "      player = new YT.Player('player', {";
      $output .= "                                       height: '360',";
      $output .= "                                       width: '640',";
      $output .= "                                       videoId: 'M7lc1UVf-VE',";
      $output .= "                                       events: {";
      $output .= "                                               'onReady'onPlayerReady,";
      $output .= "                                               'onStateChange': onPlayerStateChange";
      $output .= "                                               }";
      $output .= "                                       })";
      $output .= "   }";
      $output .= "   function onPlayerReady(event)";
      $output .= "   {";
      $output .= "      event.target.playVideo();";
      $output .= "   }";
      
      
      $output .= "      var done = false;";
      $output .= "function onPlayerStateChange(event) {";
      $output .= "if (event.data == YT.PlayerState.PLAYING && !done) {";
      $output .= "    setTimeout(stopVideo, 6000);";
      $output .= "    done = true;";
      $output .= "  }";
      $output .= "}";
      $output .= "function stopVideo() {";
      $output .= "  player.stopVideo();";
      $output .= "}";

      $output .= '</script>';
      
      //return $output;
   }
    
    

}
