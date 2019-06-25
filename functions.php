<?php

    session_start();
    $_SESSION["test"] = 'working';  


    $link = mysqli_connect("localhost","root","","twitter app");
    if(mysqli_connect_error()) {
        print_r(mysqli_connect_error());
        exit();
    }   

    if ($_GET['function'] == "logout") {
        session_unset();
    }

    function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'minute'),
            array(1 , 'second')
        );
    
        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }
    
        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
    }
     
    function displaySearchbox() {
        echo "<form class='search-box'><input type='text' placeholder='Search...' class='form-control' name='search'><input type='hidden' name='page' value='search'><input type='submit' class='btn btn-primary form-control'> </form>";
    }

    function displayTweetbox() {
        if ($_SESSION['id'] ) 
        echo "<form class='tweet-form'><h4>Tweet Something</h4><textarea placeholder='...' class='form-control' id='tweet-box'></textarea><input type='submit' class='btn btn-primary tweetButton' value='Tweet'></form>";
    }

    function displayTweets($type) {
        global $link;
        if(($type != 'public' && $type != 'search')  && !$_SESSION['id']) {
            echo "Please Login first";
        }
        else {
        if($type == 'public') {
            echo "<h2>Public Recent Tweets</h2><br>";
            $whereClause = "";
        }
        else if($type == 'followed') {
            echo "<h2>Your Timeline</h2><br>";
            $whereClause = "";
            $query = "SELECT * FROM isfollowing WHERE follower =".$_SESSION['id'];
            $result = mysqli_query($link,$query);
           
            while($row = $result->fetch_assoc()) {
                
                if($whereClause == "") {
                    $whereClause = " WHERE user_id =".$row['following'];
                }
                else {
                    $whereClause .= " OR user_id =".$row['following'];
                }
            }

        }
        else if($type == "search") {
            $whereClause = " WHERE tweet LIKE '%".$_GET['search']."%' ";
        }
        else {
            echo "<h2>Your Profile</h2><br>";
            $whereClause = "WHERE user_id =".$_SESSION['id'];            
        }

        $query = "SELECT * FROM tweet ".$whereClause." ORDER BY upload_date DESC LIMIT 10";
        $result  = mysqli_query($link,$query);
        if (mysqli_num_rows($result) == 0) {
            echo "There's notthing to show here";
        } else {
            
            while ($row = $result->fetch_assoc()) {
                $userQuery = "SELECT * FROM users WHERE user_id = ".$row['user_id']." LIMIT 10";
                $userQueryResult = mysqli_query($link,$userQuery);
                $user = mysqli_fetch_assoc($userQueryResult);
                $timeRes = time_since(time() - strtotime($row['upload_date']));
                echo "<div class='tweet'> <p class='user-email'>" . $user['email'] . "</p>";
                echo "<p class='tweet-date'> tweeted " . $timeRes ." ago </p>";
                echo "<p class='tweet-text'>" . $row["tweet"]. "</p>";
                if($_SESSION['id']) {
                $q = "SELECT * FROM isfollowing WHERE follower='".$_SESSION['id']."'AND following='".$row['user_id']."'";
                $res = mysqli_query($link,$q);
                if(mysqli_num_rows($res) == 0) {
                    echo "<a href='#' class='toggleFollow' data-userId ='".$row['user_id']."'><div class='follow-btn btn btn-outline-primary'>FOLLOW</div></a></div>";
                }
                 else {
                echo "<a href='#' class='toggleUnfollow' data-userId ='".$row['user_id']."'><div class='unfollow-btn btn btn-primary'>FOLLOWING</div></a></div>";
                }}
                else {
                    echo "</div>";
                }
            }
        }
    }
    }

?>
 
 
 
 
 
 
 
 
 

    
    