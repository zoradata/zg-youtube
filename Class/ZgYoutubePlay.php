<?php
/**
 * Zg Graph
 *
 * Last revison: 2.8.2017
 * @copyright Copyright (c) 2017 ZoraData sdružení <http://www.zoradata.cz>
 * @author Jaroslav Šourek <jaroslav.sourek@zoradata.cz>
 * @version 1.0.1
 * 
 * Simple wrapper for You Tube
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
    * @param int $height IFrame height
    * @param int $width IFrame width
    * @param array $params Player parameters
    * @param array $events Player events
    * @return string Javascript to create Player
    */
   public function player($video, $height = 360, $width = 640, $params = array(), $events = array())
   {
      $output = "\n <script>";
      $output .= "\n var tag = document.createElement('script');";
      $output .= "\n tag.src = '" . $this->url . "'";
      
      $output .= "\n\n var firstScriptTag = document.getElementsByTagName('script')[0]";
      $output .= "\n firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)";
      
      $output .= "\n\n var player;";
      $output .= "\n function onYouTubeIframeAPIReady()";
      $output .= "\n {";
      $output .= "\n    player = new YT.Player('player', {";
      $output .= "\n                                        videoId: '" . $video . "',";
      $output .= "\n                                        height: '" . $height . "',";
      $output .= "\n                                        width: '" . $width . "'";
      if (!empty($params))
      {
         $output .= "\n                                       ,playerVars: " . json_encode($params, JSON_UNESCAPED_UNICODE);
      }
      $output .= "\n                                     });\n";
   
      if (!empty($events))
      {
         foreach ($events as $event => $function)
         {
            $output .= "\n   player.addEventListener('" . $event . "'," . $function[0] . "); ";
         }
      }
      
      $output .= "\n }";

      if (!empty($events))
      {
         foreach ($events as $event => $function)
         {
            $output .= "\n" . $function[1];
         }
      }

      $output .= "\n</script>\n";
      
      return $output;

}
