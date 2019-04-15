<?php

include("connection.php");

$loggedUsername=$_GET['username'];

$see_restaurant_query="SELECT `rest_name`,`rest_address`,`est_year`,`rest_feature`,`rest_website`,`rest_email` FROM restaurent";
$result_see_restaurant= $conn->query($see_restaurant_query);

$see_food_query="SELECT `f_name`,`f_type`,`price` FROM foods";
$result_see_food= $conn->query($see_food_query);

if(isset($_POST['add_restaurant']))
{
    if(isset($_POST['restaurant_name']) && isset($_POST['restaurant_address']) && isset($_POST['restaurant_year']) && isset($_POST['restaurant_feature']) && isset($_POST['restaurant_website']) && isset($_POST['restaurant_email']))
    {
        $res_name       = $_POST["restaurant_name"];
        $res_address    = $_POST["restaurant_address"];
        $res_year       = $_POST["restaurant_year"];
        $res_feature    = $_POST["restaurant_feature"];
        $res_website    = $_POST["restaurant_website"];
        $res_email      = $_POST["restaurant_email"];
        
        $query = "INSERT INTO restaurent
                (
                    rest_name,
                    rest_address,
                    est_year,
                    rest_feature,
                    rest_website,
                    rest_email
                )

                VALUES('$res_name','$res_address','$res_year','$res_feature','$res_website','$res_email')";
        
        if($result=$conn->query($query))
        {
            header("Location:admin.php? username=<?php echo $loggedUsername?>");
            exit;
        }
    }
}
else if(isset($_POST['add_food']))
{    
   
    if(isset($_POST["food_name"]) && isset($_POST["food_price"])  && isset($_POST["food_type"]))
    {
        
        $food_name=$_POST["food_name"];
        $food_price=$_POST["food_price"];
        $food_type=$_POST["food_type"];
        
        $query1 = "INSERT INTO foods
                (
                    f_name,
                    f_type,
                    price
                )

                VALUES('$food_name','$food_type','$food_price')";
        
        if($result1 = $conn->query($query1))
        {
            header("Location:admin.php? username=<?php echo $loggedUsername?>");
            exit;
        }
    }
}

$conn->close();

?>


<html>

    <head>
    
        <title>ADMIN</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
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
        
            
            /* Admin Part */
            
            #admin_body
            {
                display: inline-block;
                position: relative;
                width: 100%;
                background: white;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px 0 rgba(0,0,0,0.3);
                transition: all 500ms ease;
                border-top: 25px solid white;
                border-bottom: 40px solid white;
            }
            #admin_header
            {
                font-family: 'Merienda One';
                color: darkred;
                font-weight: bold;
                text-shadow: 2px 2px 5px #222;
            }
            #parent
            {
                width: 90%;
            }
            #child1
            {
                width:45%;
                float: left;
                font-family: sans-serif;    
            }
            #child2
            {
                margin-left: 10%;
                width:45%;
                float: left;
                font-family: sans-serif;
            }
            #admin_sub_header
            {
                font-weight: bold;
                color: #333333;
            }
            #restaurant_name,#restaurant_address,#restaurant_year,#restaurant_feature,#restaurant_website,#restaurant_email,
            #food_name,#food_price,#food_type
            {
                width:80%;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid darkred;
                padding-left: 20px;
                padding-right: 20px;
                outline: none;
                font-family: sans-serif;
                font-size: 17px;
            }
            #add_restaurant,#add_food 
            {   
                background: transparent; 
                color: darkred;
                cursor: pointer;
                font-size:16px;
                font-family:sans-serif;
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
                outline-color: rgba(179,0,0,0.8);
                outline-offset: 0px;
                text-shadow: none;
                transition: all 1000ms cubic-bezier(0.19, 1, 0.22, 1);
                margin-bottom: 10%;
            } 
            #add_restaurant:hover,#add_food:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(179,0,0,.3), 0 0 25px rgba(179,0,0,.1);
                outline-color: rgba(179,0,0,0);
                outline-offset: 25px;
                background: rgba(179,0,0,0.8);
                color: white;
                border-radius: 0;
            }
            
            
            #see_restaurant,#see_food 
            {   
                background: transparent; 
                color: darkred;
                cursor: pointer;
                font-size:16px;
                font-family:sans-serif;
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
                outline-color: rgba(179,0,0,0.8);
                outline-offset: 0px;
                text-shadow: none;
                transition: all 1000ms cubic-bezier(0.19, 1, 0.22, 1);
                margin-bottom: 10%;
            } 
            #see_restaurant:hover,#see_food:hover
            {
                border: 1px solid;
                box-shadow: inset 0 0 25px rgba(179,0,0,.3), 0 0 25px rgba(179,0,0,.1);
                outline-color: rgba(179,0,0,0);
                outline-offset: 25px;
                color: white;
                background: rgba(179,0,0,0.8);
                border-radius: 0;
            }
            #restaurant_table_body
            {
                display: inline-block;
            }
            #food_table_body
            {
                display: none;
            }
            th,td
            {
                text-align: center;
            }
            
            /* Admin Part */
            
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
                        <a id="brand_header" class="navbar-brand" >FOOD BANK</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a id="navbar_options" href="index.php">Log-Out&nbsp;&nbsp;<label style="margin-bottom:0%;font-family:sans-serif;"><?php echo $loggedUsername ?></label><span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        
        <!-- Navbar -->
        
        <!-- Admin Body -->
        
        <br><br>
        <div class="container">
            <div id="admin_body">
                <div align="left" style="width:90%;" class="container">
                    <h1 id="admin_header">Admin Page</h1>
                </div>
                <br>
                <div id="parent" class="container">
                    <div id="child1">
                        <div>
                            <form action="" method="post">
                                <h3 id="admin_sub_header">Restaurant Part</h3>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="restaurant_name" id="restaurant_name" placeholder="Type Restaurant Name" required>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="restaurant_address" id="restaurant_address" placeholder="Type Restaurant Address" required>
                                <br><br>
                                <input autocomplete="on" value="" autocomplete="off" type="number" name="restaurant_year" id="restaurant_year" placeholder="Type Establishment Year" required>
                                <br><br>
                                <input autocomplete="on" value="" autocomplete="off" type="text" name="restaurant_feature" id="restaurant_feature" placeholder="Type Restaurant Feature" required>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="restaurant_website" id="restaurant_website" placeholder="Type Restaurant Website" required>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="restaurant_email" id="restaurant_email" placeholder="Type Restaurant Email" required>
                                <br><br><br><br>
                                <button id="add_restaurant" class="button-submit" type="submit" name="add_restaurant">Add Restaurant</button>
                            </form>
                        </div>
                    </div>
                    <div id="child2">
                        <div>
                            <form action="" method="post">
                                <h3 id="admin_sub_header">Food Part</h3>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="food_name" id="food_name" placeholder="Type Food Name" required>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="food_price" id="food_price" placeholder="Type Price Of Food" required>
                                <br><br>
                                <input autocomplete="on" value="" type="text" name="food_type" id="food_type" placeholder="Type Food Catagory" required>
                                <br><br><br><br>
                                <button id="add_food" type="submit" name="add_food">Add Food</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div align="center">
                    <hr style="width:90%;border-color: rgba(179,0,0,0.8);">
                </div>
                <div>
                    <br>
                    <div style="margin-bottom:-5%;" align="center">
                        <button id="see_restaurant" onclick="restaurant()">See Restaurants</button>
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <button id="see_food" onclick="food()">See Foods</button>
                    </div>
                    <div style="margin-left:-1%;" align="center" class="row">
                        <div id="restaurant_table_body" style="width:90%;border:none;" class="panel panel-primary">
                            <div align="center"><h1>Restaurants</h1><br></div>
                            <table style="border:1px solid rgba(179,0,0,0.8);" class="table">
                                <thead style="font-size:20px;">
                                    <tr class="danger">
                                        <th>Name</th>     
                                        <th>Address</th>
                                        <th>Year</th>
                                        <th></th>
                                        <th>Features</th>
                                        <th>Website</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while($row = $result_see_restaurant->fetch_assoc()) 
                                    {  ?>
                                    <tr>
                                        <td><?php echo $row['rest_name'] ?></td>
                                        <td><?php echo $row['rest_address'] ?></td>
                                        <td><?php echo $row['est_year'] ?></td>
                                        <td></td>
                                        <td><?php echo $row['rest_feature'] ?></td>
                                        <td><?php echo $row['rest_website'] ?></td>
                                        <td><?php echo $row['rest_email'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="food_table_body" style="width:90%;border:none;" class="panel panel-primary">
                            <div align="center"><h1>Foods</h1><br></div>
                            <table style="border:1px solid rgba(179,0,0,0.8);" class="table">
                                <thead style="font-size:20px;">
                                    <tr class="danger">
                                        <th>Name</th>     
                                        <th>Type</th>
                                        <th>Price(TK)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while($row = $result_see_food->fetch_assoc()) 
                                    {  ?>
                                    <tr>
                                        <td><?php echo $row['f_name'] ?></td>
                                        <td><?php echo $row['f_type'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Admin Body -->
        
        <br><br><br><br><br>
        <br><br><br><br>
        
        <!-- Footer Body -->
        
        <div id="footer_body" align="center" class="row">
            <h1 style="margin-top:2%;margin-bottom:2%;">Piya Prue Marma - 011 142 138</h1>
        </div>
        
        <!-- Footer Body -->
        
    </body>
    
    <script>
        function restaurant()
        {
            var x = document.getElementById("restaurant_table_body");
            var y = document.getElementById("food_table_body");

            x.style.display = "inline-block";
            y.style.display = "none";
        }
        function food()
        {
            var x = document.getElementById("restaurant_table_body");
            var y = document.getElementById("food_table_body");

            x.style.display = "none";
            y.style.display = "inline-block";
        }
    </script>

</html>