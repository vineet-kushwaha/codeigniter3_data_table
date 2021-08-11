<?php
include('commonfunction.php');


$errorMSG = array();


/* NAME */
if(validate_name($_POST["name"])==1){
    $name = dataClean($_POST["name"]);
}else{
    $errorMSG["name"] = validate_name($_POST["name"]);
}


/* EMAIL */
if (empty($_POST["email"])) {
    $errorMSG["email"] = "Email is required";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG["email"] = "Invalid email";
}else {
    $email = $_POST["email"];
}


/* PHONE */
if (validate_mobile($_POST["phone"])==1) {
    $phone = dataClean($_POST["phone"]);
} else {
    $errorMSG["phone"] =validate_mobile($_POST["phone"]);
}


/* ADDRESS */
if (validate_address($_POST["address"])==1) {
    $address = dataClean($_POST["address"]);
} else {
    $errorMSG["address"] = validate_address($_POST["address"]);
}


if(empty($errorMSG)){
	$msg = array("Name"=>$name,"Email"=>$email,"Phone"=>$phone,"Address"=>$address);
	echo json_encode(['code'=>200, 'msg'=>$msg]);
	exit;
}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);



?>