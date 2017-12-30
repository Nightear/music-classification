<?php //require($_SERVER['DOCUMENT_ROOT'] . '/login/includes/config.php'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php	

		
		//$uid=$_SESSION["userID"];
		$filenamedirectory = '../myPortfo/upload/';

		if (!file_exists($filenamedirectory)) {
  		 mkdir($filenamedirectory, 0777, true);
		}
			
//If directory doesnot exists create it.
$output_dir = $filenamedirectory."/";

if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    	
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
       	 	$fileName = $_FILES["myfile"]["name"];
			//$fileName =str_replace(array("\\","'"),"",$_FILES['myfile']['name']); 
			//mkdir($fileName, 0777, true);
			 
       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],iconv("utf-8","big5//IGNORE",$output_dir. $_FILES["myfile"]["name"]));
		 
	       	 	 $ret[$fileName]= $output_dir.$fileName;
    	}
    	else
    	{
    	    	$fileCount = count($_FILES["myfile"]['name']);
    		  for($i=0; $i < $fileCount; $i++)
    		  {
    		  	$fileName = $_FILES["myfile"]["name"][$i];
	       	 	 $ret[$fileName]= $output_dir.$fileName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],iconv("utf-8","big5//IGNORE",$output_dir.$fileName ));
			
    		  }
			  
			  
    	
    	}
    }
    echo json_encode($ret);
 
}


		
?>
</body>
</html>

