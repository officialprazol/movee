
<ul>
<?php 
$ct = 1;
$dont_select = array ( 'srt' , 'nfo' , 'db', 'txt', 'jpg','sub','zip' ,'nomedia');

function scanner_dirs($path = '\\') {

	
global $ct, $dont_select;


	$get = scandir( $path );
	foreach ($get as $g) {


	
	
		

	
		if($g != '.' && $g != '..' ) {
		

				$extension_file = pathinfo($g) ;
			if( isset($extension_file['extension']) && !in_array($extension_file['extension'], $dont_select)  ) {
				

				//var_dump($extension_file);

				file_put_contents('data1.js',  '"'. $ct++ .'":"'. $g  . '",'.   "\r\n"   , FILE_APPEND ); 
				echo '<li>' .  $path . '\\' . $g . '</li>';
			}

			

			
			if(is_dir( $path . '\\' . $g )) {

				echo '<ul>';

				scanner_dirs( $path . '\\' . $g  );

								



				echo '</ul>';

			}

		}


	}

	

}


 scanner_dirs('I:\Movies');



?>
</ul>
