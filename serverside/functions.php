<?php
function checkemailexists($email){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$sql = "select 1 from user where username = '".$email."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$conn->close();
		return true;
	}else{
		$conn->close();
		return false;
	}
}//checkmailexist
function getuserprofileinfo($userid){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$object = new stdClass();
	$object->user = array();
	$sql = "SELECT * from user_detail where user_id='$userid'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();		    
		$object->success = true;
		$object->user = $row;
		    // echo json_encode($object);
		$conn->close();
		return $object;
	}else{
		$object->success = false;
			// echo json_encode($object);
		$conn->close();
		return $object;
	}//else
}//getuserprofileinfo
function getusersubscriptioninfo($userid){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$date_diff=0;
	$object = new stdClass();
	$object->usersubscription = array();
	$getuserinfo="SELECT * FROM user_detail where user_id='$userid'";
	$result=$conn->query($getuserinfo);
	if($result->num_rows>0){
		$row=$result->fetch_assoc();
		$sub_date=$row['subscription_date'];
		$object->subinfo=$row;
		$conn->close;
		return true;
	}//if
	else{
		$conn->close();
		return false;
	}

}//subscriptionInfo
function updateUserDetails($user){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$dtime=date("Y-m-d");
	$sql = "UPDATE user_detail set email = '". $user->email ."', phone = '".$user->phone."', city = '".$user->city."', zip = '".$user->postcode."',
	first_name='".$user->firstname."',last_name='".$user->lastname."',date_posted='".$dtime."' WHERE user_id = '".$user->userID."'";
	// echo $sql;
    if($conn->query($sql)){
		$conn->close();
		return true;
	}
		// echo $conn->error;
	$conn->close();
	return false;
}//updateUser
function disbaleProperty($pid){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$sql = "UPDATE property set is_active = '0' WHERE id = '".$pid."'";
    if($conn->query($sql)){
    	$conn->close();
    	return true;
    }else{
    	$conn->close();
    	return false;
    }
}
function activeProperty($pid){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$sql = "UPDATE property set is_active = '1' WHERE id = '".$pid."'";
    if($conn->query($sql)){
    	$conn->close();
    	return true;
    }else{
    	$conn->close();
    	return false;
    }
}//active user
function updatepass($user){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	
	if(checkoldpass($user)){
		$hashedPassword=hash('sha256', $user->password);
		$sql = "UPDATE user set password = PASSWORD('$user->password') WHERE id = '".$user->userID."'";
	
		if($conn->query($sql)){
			$conn->close();
			return true;
		}
		$conn->close();
		return false;
	}else{
		$conn->close();
		return false;
	}
}//update password
//check old password
function checkoldpass($user){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$sql = "SELECT password from user where id = '".$user->userID."' and password = PASSWORD('$user->oldpass') ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		$conn->close();
		return true;
	}
	$conn->close();	    
	return false;
}//oldpassword function

function updateadminpass($user){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	
	if(checkadminoldpass($user)){
		// $hashedPassword=hash('sha256', $user->password);
		$sql = "UPDATE admin_user set password = PASSWORD('$user->password') WHERE email = '".$user->adminemail."'";
		// echo $sql;
		if($conn->query($sql)){
			$conn->close();
			return true;
		}
		$conn->close();
		return false;
	}else{
		$conn->close();
		return false;
	}
}//update password
//check old password
function checkadminoldpass($user){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	// $hashPassword=hash('sha256', $user->oldpass);
	$sql = "SELECT password from admin_user where email = '".$user->adminemail."' and password = PASSWORD('$user->oldpass')";
	// echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		$conn->close();
		return true;
	}
	$conn->close();	    
	return false;
}//oldpassword function
function updatesubscription($subscription){
	$conn = connecttoDB("p%<onZmUeePZ{{");
		$sql ="UPDATE admin_user SET is_subscription = '$subscription->status' , membership='$subscription->membership'";
		// echo $sql;
		if($conn->query($sql)){
			$conn->close();
			return true;
		}
		$conn->close();
		return false;
}//
function getallsearchresult(){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$sql="SELECT * FROM property where is_active=1";
	$result = $conn->query($sql);
	$conn->close();
	return $result;
}//getallsearchresult

function searchpropertybyquery($query){
	$conn = connecttoDB("p%<onZmUeePZ{{");
	$sql="SELECT * FROM property where is_active=1".$query;
	$result = $conn->query($sql);
	$conn->close();
	return $result;
}//searchbyquery
?>
