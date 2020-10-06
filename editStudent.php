<?php 

	$id=$_POST["editid"];
	$name=$_POST["editname"];
	$email=$_POST["editemail"];
	$address=$_POST["editaddress"];
	$gender=$_POST["editgender"];
	$profile=$_FILES["editprofile"];
	$fullPath=$_POST["oldphoto"];

	//print_r($profile);

	if($profile["size"]>0)
	{
		$basePath="photo/";
		$fullPath=$basePath.$profile["name"];

		move_uploaded_file($profile['tmp_name'],$fullPath);
	}
	//echo "$id and $name and $email $address and $gender";
	$student=[
		"name"=>$name,
		"email"=>$email,
		"gender"=>$gender,
		"address"=>$address,
		"profile"=>$fullPath

	];
	$stuJson=file_get_contents("student.json");
	if("$stuJson")
	{
		$data_arr=json_decode($stuJson,true);

		$data_arr[$id]=$student;

		$jsonStr=json_encode($data_arr,JSON_PRETTY_PRINT);
		file_put_contents("student.json", $jsonStr);

	}
	header("location:index.php");


 ?>