<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');


			if ( !function_exists('version_compare') || version_compare( phpversion(), '5', '<' ) )

				include_once( 'system/plugins/fckeditor/fckeditor_php4.php' ) ;

			else

				include_once( 'system/plugins/fckeditor/fckeditor_php5.php' ) ;

?>
