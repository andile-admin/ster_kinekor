 <?php
/*
Plugin Name: Ster Kinekor Movie
Plugin URI: http://yworld.co.za
Description: Provides space where the admin can publish content for the Ster Kinekor Page
Version: 1.0-dev
Author: YFM Dev
Author URI: http://yworld.co.za
License: http://www.1stwebdesigner.com/wordpress/wordpress-plugin-development-course-designers-1/
*/
?>
<?php

function sterkinekor_activation() {
	  $mysql_log = '';
	  $file = $_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/ster_kinekor/dev_output.txt";
	  $fh = fopen($file, 'a') or die('Could not open file');
	  $mysql_log .= "Attempting to connect to yworld db\n";
	  $success = true;
	 
	  $link = mysql_connect('www.yworld.co.za', 'yfm2011_v4', 'y0n5key0n5');
	  if (!$link) {
	      $mysql_log .= ('Could not connect: ' . mysql_error() . "\n");
  	  } else {
	    $mysql_log .= "Connected successfully\n";

	    if(mysql_select_db('ynews2013d_v1')) {
              if($fid != false) {
	        $query = 'CREATE TABLE Persons(movie_name varchar(255),movie_synopsis varchar(5000),movie_genre varchar(255),movie_director varchar(255),movie_starring varchar(255),movie_video varchar(255)
	        	,movie_booking varchar(255),movie_link varchar(255),also_showing1_image varchar(255), also_showing1_url varchar(255), also_showing2_image varchar(255), also_showing2_url varchar(255)
	        	,also_showing3_image varchar(25 5), also_showing1_url varchar(255)); '; 

	        $mysql_log .= "query: " . $query . "\n";
	        $res = mysql_query($query);
	        ob_start();
	        var_dump($res);
	        $mysql_log .= ob_get_clean();
              }
              if($mp3_fid != false) {
	        $query = 'UPDATE content_type_article SET field_articleaudio_fid='.$mp3_fid.',field_articleaudio_list=1 WHERE nid = '.$nid;
	        $mysql_log .= "query: " . $query . "\n";
	        $res = mysql_query($query);
	        ob_start();
	        var_dump($res);
	        $mysql_log .= ob_get_clean();
              }
	    }
	    mysql_close($link);
	  }
	  fwrite($fh, $mysql_log);
	  fclose($fh);
}
register_activation_hook(__FILE__, 'sterkinekor_activation');
function sterkinekor_deactivation() {
}
register_deactivation_hook(__FILE__, 'sterkinekor_deactivation');
?>
