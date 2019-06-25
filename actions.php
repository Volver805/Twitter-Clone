<?php
    include("functions.php");
    
    
    if($_GET['action'] === "sign") {
    $error = "";
    
        if(!$_POST['email']) {
            $error = "Please Enter an email";
        }
        else if (!$_POST['password']) {
            $error = "Please Enter a password";
        }
        else {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address"; 
            }
        }
        
        if($error != "") {
            echo($error);   
            exit();
        }
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $password = mysqli_real_escape_string($link,$_POST['password']);
      
        if($_POST['formValue'] == 1) {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $query = "SELECT * FROM users WHERE email = '".$email."' ";
            $result = mysqli_query($link,$query);
            if(mysqli_num_rows($result) > 0) {
                $error = "Email is already used";
            }
            else {
                $query = "INSERT INTO users(email,password) VALUES('".$email."','".$password."')";
                if(mysqli_query($link,$query)) {
                    $_SESSION["id"] = mysqli_insert_id($link);
                    echo 1;
                }   
                else {
                    $error = "Please try again later";
                }
            }
            
        }

        else {
            $query = "SELECT * FROM users WHERE email = '".$email."' ";
            $result = mysqli_query($link,$query);
            $row = mysqli_fetch_assoc($result);
            if($row['password']) {
                $hash = $row['password'];
                if( password_verify($password,$hash) ) {
                    $_SESSION["id"] = $row["user_id"];
                    echo 1;
                }
                else {
                    $error="Invalid info";
                }
            }
            else {
                $error="Invalid info";
            }

        }

        if($error != "") {
            echo($error);   
            exit();
        }

}


if($_GET['action'] == "PostTweet") {
    $newTweet = $_POST['newTweet'];
    $query ="INSERT INTO tweet(user_id,tweet) VALUES(" .$_SESSION['id']. ",'".$newTweet."');";
    mysqli_query($link,$query);
    print_r(mysqli_error($link));
    // ".$_SESSION['id']."   -  ".$_POST['newTweet']."
}

if($_GET['action'] == "FollowUser") {
    if($_SESSION['id']) {
    mysqli_query($link,"INSERT INTO isfollowing(follower,following) VALUES(".$_SESSION['id'].",".$_POST['followingId'].")");
    }
    else {
        echo "Please login first";
    }
}

if($_GET['action'] == "UnfollowUser") {
    if($_SESSION['id']) {
        mysqli_query($link,"DELETE FROM isfollowing WHERE follower=".$_SESSION['id']." AND following= ".$_POST['unfollowingId']);
    }
}

?>

