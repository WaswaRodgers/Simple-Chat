<?php
    include_once('connection.php');
    error_reporting(0);
    function checkmail($email){
        global $dbc;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $r = mysqli_query($dbc, $sql);
        if(mysqli_num_rows($r) == 1) {
		    return true;
		}else{
            return false;
		}
    }

    function getallusers(){
        global $dbc;
        $sql = "SELECT id, firstname, email, phonenumber, avatar, created_at FROM users";
        $r = mysqli_query($dbc, $sql);
        $json = array();
        if($r) {
            while ($row = mysqli_fetch_assoc($r)){
                $json[] = $row;
            }
		    return $json;
		}else{
            return false;
		}
    }

    function getmessages($usersId, $mateId){
        global $dbc;
        $sql = "SELECT *
        FROM messages
        WHERE
        (user_from = $usersId OR user_to = $usersId)
        AND (user_from = $mateId OR user_to = $mateId)
        ORDER BY id ASC";
        $r = mysqli_query($dbc, $sql);
        $json = array();
        if($r) {
            while ($row = mysqli_fetch_assoc($r)){
                $json[] = $row;
            }
		    return $json;
		}else{
            return false;
		}
    }

    function checkUpdatemail($email){
        global $dbc;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $r = mysqli_query($dbc, $sql);
        if(mysqli_num_rows($r) > 1) {
		    return true;
		}else{
            return false;
		}
    }

    function emailvalidation($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
            return false;
        }else{
            return true;
        }

    }

    function login($email, $password){
        global $dbc;
        $encrypted = sha1($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypted'";
        $r = mysqli_query($dbc, $sql);
        if(mysqli_num_rows($r) == 1) {
		    return true;
		}else{
            return false;
		}
    }
    



    // $array1 = array('ken','john','james','joy');
    // $array1[0];


    // $array2 = array('first'=>'ken','second'=>'john','third'=>'james','fourth'=>'joy');
    // $array2[0]['first'];

?>