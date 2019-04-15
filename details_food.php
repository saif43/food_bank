<?php

include("connection.php");
session_start();

$loggedUsername     = $_GET['username'];
$food_idx           = $_GET['food_id'];



$query     = "SELECT * FROM `customers` WHERE username = '$loggedUsername'"; 
$result    = mysqli_query($conn,$query);
while($row = $result->fetch_assoc())
{   
    $user_id        = $row['C_ID'];
}


$query1     = "SELECT * FROM `foods` where f_ID = '$food_idx'";
$result1    = mysqli_query($conn,$query1);
while($row  = $result1->fetch_assoc())
{   
    $food_id            = $row['f_ID'];
    $food_name          = $row['f_name'];
    $food_price         = $row['price'];
}


$query2     = "SELECT * FROM `review` NATURAL JOIN `customers` WHERE f_ID = '$food_idx'";
$result2    = mysqli_query($conn,$query2);



if(isset($_POST['post_comment']) && ($_POST['comment_box']) != "")
{
    $_SESSION['comment_box'] = $_POST['comment_box'];
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit;
}
else
{
    if(isset($_SESSION['comment_box']))
    {
        $comment = $_SESSION['comment_box'];

        unset($_SESSION['comment_box']);

        $query3  = "INSERT INTO review (C_ID,food,f_ID,review) 
        
                    VALUES ('$user_id',1,'$food_id','$comment')";
        
        $result3 = mysqli_query($conn,$query3);
    }
}


if(isset($_POST['rate_button']) && ($_POST['rate_box']) != "")
{
    $_SESSION['rate_box'] = $_POST['rate_box'];
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit;
}
else
{
    if(isset($_SESSION['rate_box']))
    {
        $rate = $_SESSION['rate_box'];

        unset($_SESSION['rate_box']);

        $query4  = "REPLACE INTO food_rating (C_ID,f_ID,rating) 
        
                    VALUES ('$user_id','$food_id','$rate')";
        
        $result4 = mysqli_query($conn,$query4);
    }
}


$query5         = "SELECT * FROM food_rating WHERE C_ID='$user_id'";
$result5        = mysqli_query($conn,$query5);
$zero_current   = 0;

if(mysqli_num_rows($result5) > 0)
{
    while($row  = $result5->fetch_assoc())
    {
        $current_rate = $row['rating'];
    }
}
else
{
    $zero_current = 1;
}

$query6         = "SELECT ROUND(AVG(food_rating.rating),2) As average  
                   FROM food_rating 
                   WHERE food_rating.f_ID='$food_id' 
                   GROUP BY food_rating.f_ID";
$result6        = mysqli_query($conn,$query6);
$zero_average   = 0;

if(mysqli_num_rows($result6) > 0)
{
    while($row  = $result6->fetch_assoc())
    {
        $average_rating = $row['average'];
    }
}
else
{
    $zero_average = 1;
}



if(isset($_POST['search_button']))
{
    if(isset($_POST['search_box']))
    {
        $search = $_POST['search_box'];
        header("Location:search.php? username=$loggedUsername & search=$search");
        exit;
    }
}

$conn->close();

?>


<html>

    <head>
    
        <title>FOOD DETAIL</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    
        <style>
            
            /* Navbar */
            
            body
            {
                overflow-x: hidden;
                overflow-y: auto;
            }
            
            #navbar_body 
            { 
                background: linear-gradient(#190A05,#870000); 
                border-color: #222;  
            }
            #brand_header 
            { 
                font-family: 'Julius Sans One';
                color: #fff; 
            }
            #navbar_options
            { 
                font-family: 'Julius Sans One';
                color: #fff; 
                border-style: solid; 
                border-width: 0 0 2px 0; 
                border-color: transparent;
                transition: all 500ms ease;
            }
            #navbar_options:hover
            { 
                color:#fff;
                font-size: 15px;
            }
            #navbar_options:hover,
            #navbar_options:visited,
            #navbar_options:focus,
            #navbar_options:active 
            { 
                background: rgba(0,0,0,0.5); 
            }
            #search_box
            {
                margin-top: 7.5%;
                margin-left: -10%;
                outline: none;
                border-radius: 3px;
                border: 1px solid #222;
                padding-left: 5px;
                padding-right: 5px;
            }
            #search_button
            { 
                outline: none;
                font-family: 'Julius Sans One';
                background: transparent;
                color: #fff; 
                border-style: solid; 
                border-width: 0 0 2px 0; 
                border-color: transparent;
                font-size: 22px;
                margin-left: -5%;
                margin-top: 40%;
                transition: all 300ms ease;
            }
            #navbar_option_button
            {
                background: #222; border-radius: 2px; 
            }
            #navbar_option_button:hover 
            { background: black; }
            
            
            #brand_header
            {
                font-size: 25px;
                font-family: 'Julius Sans One';
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            @-webkit-keyframes neon
            {
                to 
                {
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #fff, 0 0 70px #fff, 0 0 80px #fff;
                }
            }
            
            /* Navbar */
        
           
            /* Image  Slider*/
            
            .slide1,.slide2,.slide3,.slide4,.slide5,.slide6,.slide7,.slide8,.slide9,.slide10 
            {
                position: fixed;
                bottom: 0%;
                left: 0%;
                height: 100%;
                width: 100%;
                transition: all 1000ms ease;
            }
            .slide1 
            {
                background: url(images/res_1.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade 60s infinite;
                -webkit-animation:fade 60s infinite;
            } 
            .slide2 
            {
                background: url(images/food1.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade2 60s infinite;
                -webkit-animation:fade2 60s infinite;
            }
            .slide3 
            {
                background: url(images/res_2.jpeg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade3 60s infinite;
                -webkit-animation:fade3 60s infinite;
            }
            .slide4 
            {
                background: url(images/food2.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade4 60s infinite;
                -webkit-animation:fade4 60s infinite;
            }
            .slide5 
            {
                background: url(images/res_3.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade5 60s infinite;
                -webkit-animation:fade5 60s infinite;
            }
            .slide6 
            {
                background: url(images/food3.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade6 60s infinite;
                -webkit-animation:fade6 60s infinite;
            }
            .slide7 
            {
                background: url(images/res_4.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade7 60s infinite;
                -webkit-animation:fade7 60s infinite;
            }
            .slide8 
            {
                background: url(images/food4.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade8 60s infinite;
                -webkit-animation:fade8 60s infinite;
            }
            .slide9 
            {
                background: url(images/res_5.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade9 60s infinite;
                -webkit-animation:fade9 60s infinite;
            }
            .slide10 
            {
                background: url(images/food5.jpg)no-repeat center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                animation:fade10 60s infinite;
                -webkit-animation:fade10 60s infinite;
            }
            
            
            @keyframes fade
            {
                0%     {opacity:1}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:1}
            }
            @keyframes fade2
            {
                0%     {opacity:0}
                10%    {opacity:1}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade3
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:1}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade4
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:1}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade5
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:1}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade6
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:1}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade7
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:1}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade8
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:1}
                80%    {opacity:0}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade9
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:1}
                90%    {opacity:0}
                100%   {opacity:0}
            }
            @keyframes fade10
            {
                0%     {opacity:0}
                10%    {opacity:0}
                20%    {opacity:0}
                30%    {opacity:0}
                40%    {opacity:0}
                50%    {opacity:0}
                60%    {opacity:0}
                70%    {opacity:0}
                80%    {opacity:0}
                90%    {opacity:1}
                100%   {opacity:0}
            }
            
            /* Image  Slider*/
            
            
            
            /* Details */
            
            #food_details
            {
                
                display: inline-block;
                position: relative;
                font-family: 'Julius Sans One';
                background: rgba(0,0,0,0.85);
            }
            #food_detail_title
            {
                font-size: 45px;
                color: white;
                margin-top: 2.5%;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            #food_detail_address
            {
                color: white;
                margin-top: 1.5%;
                word-wrap: break-word;
            }
            #food_detail_rating
            {
                color: white;
                margin-top: 1%;
            }
            #food_detail_review
            {
                color: white;
                margin-top: 2.5%;
                text-decoration: none;
                cursor: pointer;
            }
            #food_detail_review:hover
            {
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            #image
            {
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .6), 0 0 25px rgba(255, 255, 255, .7);
                border-radius: 20px;
            }
            #food_detail_review_main
            {
                color: white;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            #food_detail_rating_main
            {
                font-size: 18px;
                margin-left: -10%;
                margin-bottom: 5%;
                border-radius: 5px;
                outline: none;
                border: 1px solid darkred;
                color: #222;
                font-weight: bold;
                transition: all 300ms ease;
                width: 110%;
                height: 5%;
                text-align: center;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            #food_detail_rating_main_button
            {
                float: right;
                width: 80%;
                height: 5%;
                border-radius: 5px;
                background: darkred;
                border: none;
                outline: none;
                color: white;
            }
            #user_rating
            {
                color: white;
                font-family: 'Julius Sans One';
                margin-top:5%;
                margin-left: 5%;
            }
            #parent
            {
                width: 100%;
            }
            #child1
            {
                width:30%;
                float: left;
                
            }
            #child2
            {
                width:27%;
                float: right;
            }
            #child3
            {
                width:80%;
                float: left;
                
            }
            #child4
            {
                width:20%;
                float: right;
            }
            #parent
            {
                width: 100%;
            }
            #child1
            {
                width:30%;
                float: left;
                
            }
            #child2
            {
                width:27%;
                float: right;
            }
            
            #user_name,#user_date
            {
                color: white;
                font-size: 18px;
                font-family: 'Merienda One';
            }
            #user_review
            {
                color: lightgray;
                font-size: 16px;
                font-family: sans-serif;
                letter-spacing: 2px;
                line-height: 22px;
            }
            #comment_box
            {
                display: inline-block;
                position: relative;
                box-sizing: border-box;
                width: 95%;
                height: 10%;
                overflow-x: hidden;
                padding-top: 3px;
                padding-left: 15px;
                padding-right: 15px;
                font-size: 15px;
                resize: none;
                outline: none;
            }
            #post_comment_button 
            {   
                background: transparent; 
                color: #fff;
                cursor: pointer;
                font-size:16px;
                font-family: 'Julius Sans One', sans-serif;
                max-width: 200px;
                padding-top: 10px;
                padding-bottom: 10px;
                font-weight: bold;
                text-decoration: none;
                text-transform:uppercase;
                vertical-align: middle;
                width: 100%;     
                border: 0 solid;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
                outline: 2px solid;
                outline-color: rgba(255, 255, 255, .5);
                outline-offset: 0px;
                text-shadow: none;
                transition: all 1000ms cubic-bezier(0.19, 1, 0.22, 1);
                margin-bottom: 10%;
            } 
            #post_comment_button:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
                outline-color: rgba(229, 45, 39, 0);
                outline-offset: 25px;
                border-radius: 0;
                text-shadow: 1px 1px 1px #fff; 
            }
            
            /* Details */
            
            
            
            /* Footer */
            
            #footer_body
            {
                position: relative;
                background: #222;
                color: white;
                font-family: 'Julius Sans One';
            }
            
            /* Footer */
            
        </style>
        
    </head>

    
    <body>
    
        <!-- Navbar -->
        
        <div>
            <nav id="navbar_body" class="navbar navbar-findcond navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button id="navbar_option_button" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span style="background: #fff;"  class="icon-bar"></span>
                            <span style="background: #fff;" class="icon-bar"></span>
                            <span style="background: #fff;" class="icon-bar"></span>
                        </button>
                        <a id="brand_header" class="navbar-brand" href="food_bank.php? username=<?php echo $loggedUsername?>">FOOD BANK</a>
                    </div>
                    <form  style="margin-bottom:0%;" action="" method="post">
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <input placeholder="Search Here..." id="search_box" name="search_box">
                                </li>
                                <li>
                                    <button id="search_button" type="submit" name="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </li>
                                <li>
                                    <a id="navbar_options" href="restaurant.php? username=<?php echo $loggedUsername?>">Restaurant<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a id="navbar_options" href="foods.php? username=<?php echo $loggedUsername?>">Foods<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a id="navbar_options" href="index.php">Log-Out&nbsp;&nbsp;<label style="margin-bottom:0%;font-family:sans-serif;"><?php echo $loggedUsername ?></label><span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        
        <!-- Navbar -->
        
        <!-- Image Slider -->
        
        <div class='slider'>
            <div class='slide1'></div>
            <div class='slide2'></div>
            <div class='slide3'></div>
            <div class='slide4'></div>
            <div class='slide5'></div>
            <div class='slide6'></div>
            <div class='slide7'></div>
            <div class='slide8'></div>
            <div class='slide9'></div>
            <div class='slide10'></div>
        </div>
        
        <!-- Image Slider -->
        
        <!-- food Body -->
        
        <br>
        <div class="container">
            <div style="margin-left:0%;border-radius:50px;" id="food_details" class="row">
                <div class="row">
                    <div align="center" class="container">
                        <h1 id="food_detail_title"><?php echo $food_name ?></h1>
                        <h3 id="food_detail_address">Price : <?php echo $food_price ?> TK</h3>
                        <?php
                        if($zero_average == 0)
                        {
                        ?>
                            <h4 id="food_detail_rating">Rating : <?php echo $average_rating ?> / 5</h4>
                        <?php 
                        }
                        else
                        {
                        ?>
                            <h4 id="food_detail_rating">Rating : None</h4>
                        <?php 
                        } 
                        ?>
                        <a id="food_detail_review" href="#food_detail_review_main">Reviews</a>
                    </div>
                    <br><br>
                    <div class="row"> 
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <img id="image" class="img-responsive" src="images/<?php echo $food_id ?>.jpg">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div align="center">
                        <br>
                        <hr style="width:70%;">
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div id="parent">
                                <div id="child1">
                                    <h1 id="food_detail_review_main">Reviews</h1>
                                </div>
                                <div id="child2">
                                    <br>
                                    <div style="margin-top:-2%;" id="parent">
                                        <form action="" method="post">
                                            <div id="child3">
                                                <input type="number" min="1" max="5" placeholder="Rate From 1 To 5" id="food_detail_rating_main" name="rate_box" >
                                            </div>
                                            <div id="child4">
                                                <button id="food_detail_rating_main_button" name="rate_button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                            </div>
                                            <div>
                                                <?php
                                                if($zero_current == 0)
                                                {
                                                ?>
                                                    <h4 id="user_rating">Current Rate : <?php echo $current_rate ?>&nbsp;<i class="fa fa-star" aria-hidden="true"></i></h4>
                                                <?php 
                                                }
                                                else
                                                {
                                                ?>
                                                    <h4 id="user_rating">Current Rate : None </h4>
                                                <?php 
                                                } 
                                                ?>
                                            </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <?php
                            while($row  = $result2->fetch_assoc())
                            {
                            ?>
                                <div style="border-bottom:1px dashed gray;margin-bottom:3%;" >
                                    <label  id="user_name"><?php echo $row['username'] ?></label>
                                    <h5 id="user_review">
                                        <?php echo $row['review'] ?>
                                    </h5>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <div>
                                <div align="center" class="row">
                                    <label style="font-size:18px;color:white;font-family:'Merienda One';" id="comment_box_header">COMMENT BOX</label>
                                    <form action="details_food.php? username=<?php echo $loggedUsername ?> & food_id=<?php echo $food_idx ?>" method="post">
                                        
                                        <br>
                                        <textarea name="comment_box" id="comment_box" style="font-family:sans-serif;"></textarea>
                                        <br><br><br>
                                        <button class="button-submit" type="submit" name="post_comment" id="post_comment_button">Post Comment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <br><br>
                </div>
            </div>

        </div>
        <!-- food Body -->
        
        <br><br><br><br><br>
        <br><br><br><br>
        
        <!-- Footer Body -->
        
        <div id="footer_body" align="center" class="row">
            <h1 style="margin-top:2%;margin-bottom:2%;">Piya Prue Marma - 011 142 138</h1>
        </div>
        
        <!-- Footer Body -->
        
    </body>

</html>