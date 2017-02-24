<ul>
<?php 
$ct = 1;

$file_name = 'wd.js';
//$file_name = 'morehd.js';

$dont_select = array ( 'srt' , 'nfo' , 'idx',  'dat','rar', 'db', 'txt', 'jpg','sub','zip' ,'nomedia', 'DS_Store');

file_put_contents( $file_name , 'var wd = { ' .   "\r\n"   ); 

scanner_dirs('H:\Movies');


file_put_contents( $file_name, '};' .   "\r\n"   , FILE_APPEND ); 

function scanner_dirs($path = '\\') {
	global $ct, $dont_select, $file_name, $file ;

	$get = scandir( $path );

	foreach ($get as $g) {
		if($g != '.' && $g != '..' ) {
				$extension_file = pathinfo($g) ;
			if(is_dir( $path . '\\' . $g )) {
				echo '<ul>';
					scanner_dirs( $path . '\\' . $g  );
				echo '</ul>';
			}
			elseif( isset($extension_file['extension']) && !in_array($extension_file['extension'], $dont_select)  ) {
				
				file_put_contents( $file_name ,  '"'. $ct++ .'":"'. $g  . '",'.   "\r\n"   , FILE_APPEND ); 
				

				echo '<li>' .  $path . '\\' . $g . '</li>';
			}
			
		}
	}
}






function formatbytes($file, $type)
{
   switch($type){
      case "KB":
         $filesize = filesize($file) * .0009765625; // bytes to KB
      break;
      case "MB":
         $filesize = (filesize($file) * .0009765625) * .0009765625; // bytes to MB
      break;
      case "GB":
         $filesize = ((filesize($file) * .0009765625) * .0009765625) * .0009765625; // bytes to GB
      break;
   }
   if($filesize <= 0){
      return $filesize = 'unknown file size';}
   else{return round($filesize, 2);}
}

?>
</ul>
