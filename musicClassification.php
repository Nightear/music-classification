<?php
//ob_start();
$filename = $_POST['filename'];
$tempfilename=str_replace("'", "",basename($filename,".mp3"));
$realfilename=stripslashes($filename);

$mp3name=iconv ( "utf-8" , "big5//IGNORE" , $tempfilename);

$absolutepath= $_SERVER['DOCUMENT_ROOT'] . '/myPortfo/upload/'.$mp3name.'.mp3';

set_time_limit(0);
$command = "java -jar GetSongInfo.jar ";
$upload = $absolutepath;

$realabsolutepath=$_SERVER['DOCUMENT_ROOT'] . '/myPortfo/upload/'.$realfilename;

if(file_exists($upload)){
$run = $command . $upload;
	//if(exec($run, $output)){
		exec($run, $output);
		
		//$realabsolutepath=$_SERVER['DOCUMENT_ROOT'] . $realfilename;
		

		//$callback = $_GET['callback'];


		$resultSet = array(
			//'result' => $result,
			//'rock' => $rock,
			'rockPC' => $output[11],
			//'hiphop' => $hiphop,
			'hiphopPC' => $output[13],
			//'pop' => $pop,
			'popPC' => $output[15],
			//'classic' => $classic,
			'classicPC' => $output[17]
		);
		
		
		//ob_end_clean();
		//header("Content-Type: application/json");
		//echo json_encode($resultSet);
		echo $output[11];
		echo ' ';
		echo $output[13];
		echo '~';
		echo $output[15];
		echo '-';
		echo $output[17];
		//echo $callback.'(' . json_encode($resultSet) . ')';
		//echo $resultSet ;


//	}else {echo "Can't run";}
	} else {
		echo "Can't find " . $upload;
	}


exit;
?>
