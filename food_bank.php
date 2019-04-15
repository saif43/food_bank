<?php

include("connection.php");

$loggedUsername=$_GET['username'];

$query  = "SELECT * FROM `restaurent` LIMIT 3";
$query1 = "SELECT * FROM `foods` LIMIT 3";

$result  = mysqli_query($conn,$query);
$result1 = mysqli_query($conn,$query1);

if(isset($_POST['search_button']))
{
    if(isset($_POST['search_box']))
    {
        $search = $_POST['search_box'];
        header("Location:search.php? username=$loggedUsername & search=$search");
        exit;
    }
}

?>



<html>

    <head>
    
        <title>FOOD BANK</title>
        
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
                transition: all 300ms ease;
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
            
            
            /* Text Body */
        
            #text_body
            {
                position: relative;
                background: rgba(0,0,0,0.6);
            }
            #main_page_header
            {
                color: white;
                font-size: 45px;
                font-family: 'Merienda One';
            }
            #main_page_text_description
            {
                color: white;
                font-size: 25px;
                font-family: 'Merienda One';
            }
            
            /* Text Body */
            
            
            /* Restaurant & Foods Body */
            
            #restaurant_body,#food_body
            {
                display: inline-block;
                position: relative;
                font-family: 'Julius Sans One';
                background: rgba(0,0,0,0.85);
            }
            
            #restaurant_header,#food_header
            {
                color: white;
                margin-top: 2.5%;
                margin-left: 7%;
                -webkit-animation: neon 2s ease-in-out infinite alternate;
                -moz-animation: neon 2s ease-in-out infinite alternate;
                animation: neon 2s ease-in-out infinite alternate;
            }
            
            #image_body
            {
                display: inline-block;
                position:relative;
                margin-top: 2.5%;
                margin-bottom: 5%;
                margin-left: 6%;
                transition: all 500ms ease;
                border-radius: 10px;
                height: 60%;
            }
            #image_body:hover
            {
                transform: scale(1.1);
                cursor: pointer;
                border-radius: 10px;
                background: rgba(0,0,0,0.3);
                box-shadow: 0 -2px 30px 0 rgba(255, 255, 255, 0.2), 0 3px 10px 0 rgba(255, 255, 255, 0.20);
                
            }
            #restaurant_image,#food_image
            {
                padding-top:5%;
            }
            #restaurant_name,#restaurant_address,#food_name,#food_price
            {
                color: white;
                font-family: 'Julius Sans One';
            }
            
            #restaurant_view_more,#food_view_more 
            {   
                background: transparent; 
                color: #fff;
                cursor: pointer;
                font-size:16px;
                font-family: 'Julius Sans One', sans-serif;
                padding: 13px 50px; 
                max-width: 160px; 
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
            #restaurant_view_more:hover,#food_view_more:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(255, 255, 255, .5), 0 0 25px rgba(255, 255, 255, .2);
                outline-color: rgba(229, 45, 39, 0);
                outline-offset: 25px;
                border-radius: 0;
                text-shadow: 1px 1px 1px #fff; 
            }
            
            /* Restaurant & Foods Body */
            
            
            
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
                        <a id="brand_header" class="navbar-brand" href="food_bank.php?username=<?php echo $loggedUsername?>">FOOD BANK</a>
                    </div>
                    
                    <form style="margin-bottom:0%;" action="" method="post">
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <input placeholder="Search Here..." id="search_box" name="search_box">
                                </li>
                                <li>
                                    <button id="search_button" type="submit" name="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </li>
                                <li>
                                    <a id="navbar_options" href="#restaurant_body">Restaurant<span class="sr-only">(current)</span></a>
                                </li>
                                <li>
                                    <a id="navbar_options" href="#food_body">Foods<span class="sr-only">(current)</span></a>
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
        
        
        <!-- Text Body -->
        
        <br><br><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div align="center" id="text_body" class="col-md-4">
                <h1 id="main_page_header">
                    Food Bank
                </h1>
                <hr>
                <h3 id="main_page_text_description">
                    There Is No Sincerer Love Than The Love Of Food
                </h3>
                <hr>
                <h3 id="main_page_text_description">
                    One Cannot Think Well, Love Well, Sleep Well, If One Has Not Dined Well.
                </h3>
                <hr>
                <h3 id="main_page_text_description">
                    LIVE. LOVE. EAT.
                </h3>
                <br>
            </div>
            <div class="col-md-7"></div>
        </div>
        
        <!-- Text Body -->
        
        <br><br><br><br><br><br><br><br><br>
        
        <!-- Restaurant Body -->
        
        <div id="restaurant_body" class="row">
            <br><br>
            <div class="row">
                <h1 id="restaurant_header">Restaurants</h1>

            <?php
            while($row = mysqli_fetch_assoc($result))
            {
                $rest_id = $row['rest_ID'];
            ?>
                
                <div align="center" id="image_body" class="col-md-3">
                    <a href="details_restaurant.php? username=<?php echo $loggedUsername ?> & restaurant_id=<?php echo $rest_id ?>" style="text-decoration:none;">
                        <img id="restaurant_image" class="img-responsive" src="images/<?php echo $row["rest_ID"] ?>.jpg">
                        <h3 id="restaurant_name"><?php echo $row['rest_name']?></h3>
                        <h4 id="restaurant_address"><?php echo $row['rest_address'] ?></h4>
                    </a>
                </div>

            <?php } ?>
                
            </div>
            <div style="margin-bottom:5%;" class="row" align="center">
                <a href="restaurant.php? username=<?php echo $loggedUsername?>" id="restaurant_view_more">View More</a>
            </div>
        </div>
        
        <!-- Restaurant Body -->
        
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        

        <!-- Food Body -->
        
        <div id="food_body" class="row">
            <br><br>
            <div class="row">
                <h1 id="food_header">Foods</h1>


            <?php
            while($row = mysqli_fetch_assoc($result1))
            {
                $food_id = $row['f_ID'];
            ?>


                <div align="center" id="image_body" class="col-md-3">
                    <a href="details_food.php? username=<?php echo $loggedUsername?> & food_id=<?php echo $food_id ?>" style="text-decoration:none;">
                        <img id="food_image" class="img-responsive" src="images/<?php echo $row["f_ID"] ?>.jpg">
                        <h3 id="food_name"><?php echo $row['f_name'] ?></h3>
                        <h4 id="food_price">Price : BDT <?php echo $row['price'] ?></h4>
                    </a>
                </div>

            <?php } ?>
                

                
            </div> 
            <div style="margin-bottom:5%;" class="row" align="center">
                <a href="foods.php? username=<?php echo $loggedUsername?>" id="food_view_more">View More</a>
            </div>
        </div>
        
        <!-- Food Body -->
        
        <br><br><br><br><br><br><br><br><br>
        
        <!-- Footer Body -->
        
        <div id="footer_body" align="center" class="row">
            <h1 style="margin-top:2%;margin-bottom:2%;">Piya Prue Marma - 011 142 138</h1>
        </div>
        
        <!-- Footer Body -->
        
    </body>

</html>