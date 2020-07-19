<?php
    //error_reporting(0);
    include('functions.php');
    $fname = $_POST['firstnametext'];
    $email = $_POST['emailtext'];
    $oldavatar = $_POST['oldavatar'];
    $avatar = $_POST['avatar'];
    $phone = $_POST['phone'];
    $userid=$_POST['id'];
    $avatarname = $_FILES['avatar']['name'];
    $avatarsize = $_FILES['avatar']['size'];
    $avatartype = $_FILES['avatar']['type'];
    $avatartmp = $_FILES['avatar']['tmp_name'];
    $uploadPath = 'images/';
    $imagesize = 5000 * 5000;
    $imageArray = ["jpeg","png","jpg"];
    $ext = explode('.', $avatarname);
    $filetype = strtolower(end($ext));
    $response;

    if(checkUpdatemail($email) == true){
        $response['Email_Used'].="That email is already in use";
    }
    if(empty($fname)){
        $response['Fname'].="Please enter your Firstname";
    }
    if(emailvalidation($email) ==false){
        $response['Email'].="Please enter a valid Email";
    }
    //if(empty($password)){
      //  $response['Password'].="Please enter a password";
    //}
    //if($password !== $confirmpassword){
       // $response['Password_confirm'].="Passwords do not match";
    //}
    if(empty($phone) || is_numeric($phone) == false){
        $response['Phone_number'].="Please enter a valid phone number";
    }
    if(in_array($filetype, $imageArray) == false){
		$response['Filetype'] .= "Invalid Image formart";
    }
    if($avatarsize > $imagesize){
        $response['Image_size'].="The image size is too big";
    }

    if ($response == null) {

        if (move_uploaded_file($avatartmp, $uploadPath.$avatarname)) {
            $old=$uploadPath.' '.$oldavatar;
            unset($old);
            $sql = ("UPDATE `users` SET `firstname`=`$fname`, `email`=`$email`, `phonenumber`=`$phone`,`avatar`=`$avatarname` 
            WHERE `id`=`$userid`");
            $q = mysqli_query($dbc, $sql);
            if($q){
                $response['Success_Two'].="Details successfuly updated!";
            }else{
                $response['Query_error'].="This was the error". mysqli_error($dbc);
            }
        }else{
            $response['Upload_error'].="Image was not uploaded";
        }
    }else{
        $response['Error'].="Please try again.";
    }
    header('Content-type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);//output the json format of responses($response)
?>