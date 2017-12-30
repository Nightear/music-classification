<?php require($_SERVER['DOCUMENT_ROOT'] . '/login/includes/config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 

$filename = $_POST['filename'];
$tempfilename=str_replace("'", "",basename($filename,".mp3"));
$realfilename=stripslashes($filename);

 

$mp3name=iconv ( "utf-8" , "big5//IGNORE" , $tempfilename);
//mkdir($mp3name, 0777, true);


$userid=$_SESSION["userID"];

$absolutepath= $_SERVER['DOCUMENT_ROOT'] . '/DB_user/'.$userid.'/'.$mp3name.'.mp3';

set_time_limit(0);
$command = "java -jar echonest.jar ";
//$getDataCommand="java -jar Music.jar ";

$upload = $absolutepath;
//mkdir($upload.'test', 0777, true); 

	
	

	if (file_exists($absolutepath)) { 		
	$songName = str_replace(' ', '', $upload );
	rename($upload,$songName);
	$run = $command . $songName;
	//$runGetDataCommand=$getDataCommand.$songName;
		
			if(exec($run, $output)){
			//exec($runGetDataCommand, $outputData, $val);
		  	//$mp3SongName=$outputData[1];
		   $realabsolutepath=$_SERVER['DOCUMENT_ROOT'] . '/DB_user/'.$userid.'/'.$realfilename;
		  
		  
		   
		   if( !rename($songName,$realabsolutepath)){
			   	if(unlink($realabsolutepath)){
			  		 rename($songName,$realabsolutepath);
					}
			   }
		
		// $song_path= iconv (  "big5", "utf-8//IGNORE" ,  $realabsolutepath );
		 $song_name=basename($realfilename,".mp3");
		
		updateSongsData( $realabsolutepath,$userid,$output[1],$song_name);
	
}
} 
?>

</body>
</html>