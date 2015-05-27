<ul>
<?php 
$ct = 1;


//$file_name = 'morehd.js';
$file_name = 'WD.js';



$dont_select = array ( 'srt' , 'nfo' , 'rar', 'db', 'txt', 'jpg','sub','zip' ,'nomedia', 'DS_Store');
function scanner_dirs($path = '\\') {

global $ct, $dont_select, $file_name;
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
				//var_dump($extension_file);
				file_put_contents( $file_name ,  '"'. $ct++ .'":"'. $g  . '",'.   "\r\n"   , FILE_APPEND ); 
				//file_put_contents( $file_name ,   $g  .    "\r\n"   , FILE_APPEND ); 
				echo '<li>' .  $path . '\\' . $g . '</li>';
			}
			
		}
	}
}

file_put_contents( $file_name , 'var data = { ' .   "\r\n"   , FILE_APPEND ); 

scanner_dirs('H:\Movies');

file_put_contents( $file_name, '};' .   "\r\n"   , FILE_APPEND ); 

?>
</ul>
