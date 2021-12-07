<?php
require "../includes/connection.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST' && isset($_POST['sitekey']) && isset($_POST['func'])) {
	echo "Unauthorised Access Forbidden!";
	return false;
}

if(sitekey != $_POST['sitekey']){
	echo $_POST['sitekey'];
	echo "Unauthorised Access Forbidden!1";
	exit(0);
}
$conn = connecttoDB("p%<onZmUeePZ{{");
$func = $_POST['func'];
    if($func == "1"){
        $object = new stdClass();
       
        
        $password = $_POST['password1'];
        // $simplepassword=PASS ;
//        $hashedPassword=hash('sha256', $password);

        if (checkemailexists($_POST['email'])) {
            $object->success = false;
            $object->message = "Email ID already registered.";
            echo json_encode($object);
            return;
        }else{
            $sql = "INSERT into user(username, password) VALUES ('".$_POST['email']."', PASSWORD($password))";
            if ($conn->query($sql) === TRUE) {
                $lastinsertedid = $conn->insert_id;
                $sql2 = "INSERT into user_detail(user_id,email) values('$lastinsertedid','".$_POST['email']."')";
                $conn->query($sql2);
                $object->success = true;
                $object->message = "User created successfully.";
                $object->userID = $conn->insert_id;
            }
            else {
                $object->success = false;
                $object->message = $conn->error;
            }
    
            echo json_encode($object);
            return;
        }
        }//func = 1 register user
        else if( $func == "1.1" ){
            $pass = $_POST['loginpassword'];
            $sql = "select u.id ,u.username,u.password, d.is_subscription, d.subscription_date from user u join user_detail d on u.id=d.user_id  where u.username = '".$_POST['loginemail']."' and u.password = PASSWORD($pass)";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $email = $_POST['loginemail'];
                $row = $result->fetch_assoc();
                if($row['username']==$email){
                    $sub_date=$row['subscription_date'];
                    $earlier=new DateTime($sub_date);
                    $later=new DateTime(date("Y-m-d H:i:s"));
                    $diff=$later->diff($earlier)->format("%a");
                    //set user session 
                    echo "true";
                    $_SESSION['userID'] = $row['id'];
                    if($diff>=30){
                        $update_subs_status="UPDATE user_detail SET is_subscription=0 where user_id='".$_SESSION['userID']."' ";
                        mysqli_query($conn,$update_subs_status);
                        $_SESSION['issubscribe']=0;
                        
                    }else{
                        $_SESSION['issubscribe']=$row['is_subscription'];
                    }   
                }else{
                    echo "false";
                }			
            }
            else
                return;
    
        }//func 1.1 login user
        else if($func=="1.2"){
            $object = new stdClass();
            $object->firstname = $_POST['firstname'];
            $object->lastname = $_POST['lastname'];
            $object->phone = $_POST['phone'];
            $object->email = $_POST['email'];
            $object->postcode = $_POST['postcode'];
            $object->city = $_POST['city'];
            $object->userID = $_SESSION['userID'];

            // echo updateUserDetails($object);
            if(updateUserDetails($object)){
                echo "updated";
            }else{
                echo "error";
            }
    
        }//func 1.2
        else if($func=="1.33"){
            if(isset($_POST['deleteuserbyadmin'])){
                $user_id = $_POST['user_id'];
                $settokenQuery = "DELETE from user_detail where user_id = '$user_id'";
                $deluserquery="DELETE from user where id='$user_id'";
                 mysqli_query($conn,$settokenQuery);
                 mysqli_query($conn,$deluserquery);
                 echo "deleted";
              }// user deleted by admin above
        }//func 1.3
        else if($func=="1.44"){
            if(isset($_POST['updateprofilebyadmin'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $city = $_POST['city'];
                $phone = $_POST['phone'];
                $postcode = $_POST['postcode'];
                $taxid = $_POST['taxid'];
                $accountstatus = $_POST['accountstatus'];
                $password = $_POST['password'];
                $emailstatus = $_POST['emailstatus'];
                $user_id = $_POST['user_id'];
          
                if($password==""){
                   $settokenQuery = "UPDATE user_detail set first_name = '$firstname', last_name = '$lastname', email='$email',city='$city',phone='$phone', zip='$postcode' where user_id = '$user_id'";
                   mysqli_query($conn,$settokenQuery);
                   echo "updated";
                }else{
                  $settokenQuery = "UPDATE user_detail set first_name = '$firstname', last_name = '$lastname', email='$email',city='$city',phone='$phone', zip='$postcode', password=PASSWORD($password) where user_id = '$user_id'";
                   mysqli_query($conn,$settokenQuery);
                   echo "updated";
                }
          
            }//update profile by admin above
        }//1.44
        else if($func=="1.55"){
            if(isset($_POST['deleteapartmentbyadmin'])){
                $apartment_id = $_POST['apartment_id'];
                $deleteapartmentquery = "DELETE from property where id = '$apartment_id'";
                // echo $deleteapartmentquery;
                 mysqli_query($conn,$deleteapartmentquery);
                 echo "deleted";
              }// apartment deleted by admin above
          }//1.55
          else if($func=="1.66"){
            if(isset($_POST['updateapartmentbyadmin'])){
                $apartmentid = $_POST['apartmentid'];
                $title = $_POST['title'];
                $type = $_POST['type'];
                $ptype = $_POST['ptype'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $country = $_POST['country'];
                $address = $_POST['address'];
                $postcode = $_POST['postcode'];
                $description = $_POST['description'];
                $price = $_POST['purchase_price'];
                $areainsq = $_POST['areainsq']; 
                $pcondition = $_POST['pcondition'];
                $ncondition = $_POST['ncondition'];
                //new attributes
                $noofunits=$_POST['nounit'];
                $lotattributes=$_POST['lotattributes'];
                $zcode=$_POST['zcode'];
                $lsmeaurment=$_POST['lsmeaurment'];
                $investtype=$_POST['investtype'];
                $investamount=$_POST['investamount'];
                $equityoffer=$_POST['equityoffer'];
                $rate=$_POST['rate'];
                $amortized=$_POST['amortized'];
                $amount=$_POST['amount'];
                $bamount=$_POST['bamount'];
                $preamount=$_POST['preamount'];
                $fampro=$_POST['fampro'];
                $cashreturn=$_POST['cashreturn'];
                $famneigh=$_POST['famneigh'];
                $timeinvest=$_POST['timeinvest'];
                $updateapartmentquery = "UPDATE property set project_name='$title', type = '$type',property_type='$ptype',
                 city = '$city', state='$state',country='$country',str_addr1= '$address', zip = '$postcode', purchase_price = '$price',
                  square_footage= '$areainsq', property_condition = '$pcondition', neighborhood_condition = '$ncondition',
                  property_description='$description',number_of_units='$noofunits',lot_attributes='$lotattributes',zoning_code='$zcode',
                  lot_size_measurment='$lsmeaurment',investment_type='$investtype',investment_amount_needed='$investamount',equity_offered='$equityoffer',
                  rate_of='$rate',years_amortized_of='$amortized',amount_of='$amount',balloon_amount_of='$bamount',prepayment_penalty_amount_of='$preamount',
                  familiar_with_property='$fampro',cash_on_cash_return='$cashreturn',familiar_with_neighborhood='$famneigh',
                  time_in_real_estate='$timeinvest'
                   where id = '$apartmentid'";
                // echo $updateapartmentquery;
                // mysqli_query($conn,$updateapartmentquery);
                // echo "updated";
                
                if(mysqli_query($conn,$updateapartmentquery)){
                   echo "updated";
                }
                // else{
                //     echo "error";
                // }
          
              
          
              }
          }//1.66
          else if($func == "1.77"){
            // $apartmentid = $_POST['apartmentid'];
            $title = $_POST['title'];
            $type = $_POST['type'];
            $ptype = $_POST['ptype'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $address = $_POST['address'];
            $postcode = $_POST['postcode'];
            $description = $_POST['description'];
            $price = $_POST['purchase_price'];
            $areainsq = $_POST['areainsq']; 
            $pcondition = $_POST['pcondition'];
            $ncondition = $_POST['ncondition'];
            //new attributes
            $noofunits=$_POST['nounit'];
            $lotattributes=$_POST['lotattributes'];
            $zcode=$_POST['zcode'];
            $lsmeaurment=$_POST['lsmeaurment'];
            $investtype=$_POST['investtype'];
            $investamount=$_POST['investamount'];
            $equityoffer=$_POST['equityoffer'];
            $rate=$_POST['rate'];
            $amortized=$_POST['amortized'];
            $amount=$_POST['amount'];
            $bamount=$_POST['bamount'];
            $preamount=$_POST['preamount'];
            $fampro=$_POST['fampro'];
            $cashreturn=$_POST['cashreturn'];
            $famneigh=$_POST['famneigh'];
            $timeinvest=$_POST['timeinvest'];
            $is_active=1;
            $addpropertyquery = "INSERT INTO property(project_name,type,property_type,city , state,country,str_addr1, zip ,purchase_price,
                  square_footage, property_condition, neighborhood_condition,property_description,number_of_units,lot_attributes,zoning_code,
                  lot_size_measurment,investment_type,investment_amount_needed,equity_offered,rate_of,years_amortized_of,amount_of,balloon_amount_of,prepayment_penalty_amount_of,
                  familiar_with_property,cash_on_cash_return,familiar_with_neighborhood,
                  time_in_real_estate,is_active) VALUES('$title','$type','$ptype','$city','$state','$country','$address','$postcode','$price','$areainsq',
                  '$pcondition','$ncondition','$description','$noofunits','$lotattributes','$zcode','$lsmeaurment','$investtype',
                  '$investamount','$equityoffer','$rate','$amortized','$amount','$bamount','$preamount',
                  '$fampro','$cashreturn','$famneigh','$timeinvest','$is_active')";
                  
            if ($conn->query($addpropertyquery)) {
                echo "true";
            }
            else {
                echo "false";
            }
            
        }//1.77
        else if($func=="1.8"){
        $pid = $_POST['property_id'];
		if(activeProperty($pid)){
			echo "true";
		}else{
			echo "false";
		}
        }//fun1.9
        else if($func=="1.9"){
            $pid = $_POST['property_id'];
            if(disbaleProperty($pid)){
                echo "true";
            }else{
                echo "false";
            }
        }//fun 1.9
        else if($func == "2"){
            $uid = $_POST['userid'];
            $title = $_POST['title'];
            $type = $_POST['type'];
            $ptype = $_POST['ptype'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $address = $_POST['address'];
            $postcode = $_POST['postcode'];
            $description = $_POST['description'];
            $price = $_POST['purchase_price'];
            $areainsq = $_POST['areainsq']; 
            $pcondition = $_POST['pcondition'];
            $ncondition = $_POST['ncondition'];
            $noofunits=$_POST['nounit'];
            $lotattributes=$_POST['lotattributes'];
            $zcode=$_POST['zcode'];
            $lsmeaurment=$_POST['lsmeaurment'];
            $investtype=$_POST['investtype'];
            $investamount=$_POST['investamount'];
            $equityoffer=$_POST['equityoffer'];
            $rate=$_POST['rate'];
            $amortized=$_POST['amortized'];
            $amount=$_POST['amount'];
            $bamount=$_POST['bamount'];
            $preamount=$_POST['preamount'];
            $fampro=$_POST['fampro'];
            $cashreturn=$_POST['cashreturn'];
            $famneigh=$_POST['famneigh'];
            $timeinvest=$_POST['timeinvest'];
            $is_active=0;
            $ctime=date("Y-m-d H:i:s");
            $addpropertyquery = "INSERT INTO property(project_name,type,property_type,city , state,country,str_addr1, zip ,purchase_price,
                  square_footage, property_condition, neighborhood_condition,property_description,number_of_units,lot_attributes,zoning_code,
                  lot_size_measurment,investment_type,investment_amount_needed,equity_offered,rate_of,years_amortized_of,amount_of,balloon_amount_of,prepayment_penalty_amount_of,
                  familiar_with_property,cash_on_cash_return,familiar_with_neighborhood,
                  time_in_real_estate,is_active,user_id,date_activated) VALUES('$title','$type','$ptype','$city','$state','$country','$address','$postcode','$price','$areainsq',
                  '$pcondition','$ncondition','$description','$noofunits','$lotattributes','$zcode','$lsmeaurment','$investtype',
                  '$investamount','$equityoffer','$rate','$amortized','$amount','$bamount','$preamount',
                  '$fampro','$cashreturn','$famneigh','$timeinvest','$is_active','$uid','$ctime')";
                  
            // echo $addpropertyquery;
            if ($conn->query($addpropertyquery)) {
                echo "true";
            }
            else {
                // echo $sql;
                // echo $conn->error;
                echo "false";
            }
        }//2
        else if($func=="2.1"){
            if(isset($_POST['deleteapartmentbyuser'])){
                $pid = $_POST['pid'];
                $deletepropertyquery = "DELETE from property where id = '$pid'";
                // echo $deleteapartmentquery;
                 mysqli_query($conn,$deletepropertyquery);
                 echo "deleted";
              }// property deleted by user
          }//1.55
          else if($func=="2.2"){
            
                $pid = $_POST['propertyid'];
                $title = $_POST['title'];
                $type = $_POST['type'];
                $ptype = $_POST['ptype'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $country = $_POST['country'];
                $address = $_POST['address'];
                $postcode = $_POST['postcode'];
                $description = $_POST['description'];
                $price = $_POST['purchase_price'];
                $areainsq = $_POST['areainsq']; 
                $pcondition = $_POST['pcondition'];
                $ncondition = $_POST['ncondition'];
                //new attributes
                $noofunits=$_POST['nounit'];
                $lotattributes=$_POST['lotattributes'];
                $zcode=$_POST['zcode'];
                $lsmeaurment=$_POST['lsmeaurment'];
                $investtype=$_POST['investtype'];
                $investamount=$_POST['investamount'];
                $equityoffer=$_POST['equityoffer'];
                $rate=$_POST['rate'];
                $amortized=$_POST['amortized'];
                $amount=$_POST['amount'];
                $bamount=$_POST['bamount'];
                $preamount=$_POST['preamount'];
                $fampro=$_POST['fampro'];
                $cashreturn=$_POST['cashreturn'];
                $famneigh=$_POST['famneigh'];
                $timeinvest=$_POST['timeinvest'];
                $updateapartmentquery = "UPDATE property set project_name='$title', type = '$type',property_type='$ptype',
                 city = '$city', state='$state',country='$country',str_addr1= '$address', zip = '$postcode', purchase_price = '$price',
                  square_footage= '$areainsq', property_condition = '$pcondition', neighborhood_condition = '$ncondition',
                  property_description='$description',number_of_units='$noofunits',lot_attributes='$lotattributes',zoning_code='$zcode',
                  lot_size_measurment='$lsmeaurment',investment_type='$investtype',investment_amount_needed='$investamount',equity_offered='$equityoffer',
                  rate_of='$rate',years_amortized_of='$amortized',amount_of='$amount',balloon_amount_of='$bamount',prepayment_penalty_amount_of='$preamount',
                  familiar_with_property='$fampro',cash_on_cash_return='$cashreturn',familiar_with_neighborhood='$famneigh',
                  time_in_real_estate='$timeinvest'
                   where id = '$pid'";
                // echo $updateapartmentquery;
                // mysqli_query($conn,$updateapartmentquery);
                // echo "updated";
                
                if(mysqli_query($conn,$updateapartmentquery)){
                   echo "updated";
                }
                // else{
                //     echo "error";
                // }

          
              
          }//2.2
          else if($func == "2.3"){
		
            if(!empty($_FILES)) {
                $file = $_FILES['imgs'];
                $file_name =$file['name'];
                $file_type=$file['type'];
                $file_temp=$file['tmp_name'];
                // echo $file_temp;
                $file_name1 = explode(".", $file_name);
                $file_name2 = $file_name1[0];
                $file_ext = $file_name1[1];
                $target="../property_images/".$_POST['apartmentid']."_l.".$file_ext;
                // $file_path = "../property_images/".$file_name;
    
                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $pid = $_POST['apartmentid'];
                    $sql = "INSERT INTO property_document(property_id,image_name,document_type,ext) VALUES('$pid','$file_name2','$target','$file_ext') ";
                    $conn->query($sql) or die($conn->error);
                    
                }else{
                    echo " no";
                }
            }else{
                echo "no file";
            }
        }//2.3
        else if($func=="2.4"){
            $object = new stdClass();
            $object->userID = $_SESSION['userID'];
            $object->password = $_POST['password'];
            $object->oldpass = $_POST['oldpass'];
            // echo $object->oldpass;
            if(updatepass($object)){

                echo "updated";
            }else{
                echo "error";
            }

        }//fun 2.4
        else if($func=="2.5"){
            $object = new stdClass();
            $object->adminemail = $_SESSION['adminemail'];
            $object->password = $_POST['password'];
            $object->oldpass = $_POST['oldpass'];
            // echo $object->adminemail;
            if(updateadminpass($object)){

                echo "updated";
            }else{
                echo "error";
            }

        }//fun 2.5
        else if($func=="2.6"){
            $object = new stdClass();
            $object->status=$_POST['subscription'];
            $object->membership=$_POST['membership'];
            
            if(updatesubscription($object)){

                echo "updated";
            }else{
                echo "error";
            }

        }//fun 2.6
        if($func=="2.7"){
            // $object = new stdClass();
            // $obj_decode=json_decode($object);
            $amount=$_POST['pay_amount'];
            $status=$_POST['status'];
            $tranid=$_POST['tranid'];
            $userid=$_POST['userid'];
            $created_at=date("Y-m-d");
            $subsciption_status=1;

            $payquery="INSERT INTO paymentinfo(tnxid, payment_amount, payment_status, createdtime,user_id) VALUES('$tranid',
            '$amount','$status','$created_at','$userid')";
            $updatesubscription="UPDATE user_detail SET is_subscription='$subsciption_status',subscription_date='$created_at' where user_id='$userid'";
           
            // echo $payquery;
            if ($conn->query($payquery)) {
                if($conn->query($updatesubscription)){
                    echo "true";
                }else{
                    echo "false";
                }
            }
            else {
                echo "false";
            }
        }//fun 2.7
        else if($func == "2.8"){
		
            if(!empty($_FILES)) {
                $file = $_FILES['imgs'];
                $file_name =$file['name'];
                $file_type=$file['type'];
                $file_temp=$file['tmp_name'];
                // echo $file_temp;
                $file_name1 = explode(".", $file_name);
                $file_name2 = $file_name1[0];
                $file_ext = $file_name1[1];
                $target="../property_images/".$_POST['propertyid']."_l.".$file_ext;
                // $file_path = "../property_images/".$file_name;
    
                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $pid = $_POST['propertyid'];
                    $sql = "INSERT INTO property_document(property_id,image_name,document_type,ext) VALUES('$pid','$file_name2','$target','$file_ext') ";
                    $conn->query($sql) or die($conn->error);
                    
                }else{
                    echo " no";
                }
            }else{
                echo "no file";
            }
        }//2.8
    
?>