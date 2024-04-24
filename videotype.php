
<?php

@include 'config.php';

session_start();


if(!isset($_SESSION['isLoggedIn'])){
    header('location:index.php');
    
 }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Choose VideoAD Type</title>
    <style>
        body {
            overflow-x: hidden;
            background-color: rgb(25, 25, 69);
        }
        /* .btn-back {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 20px;
            padding: 18px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin: 10px;
            transition:all 0.15s ease;
        }

     .btn-back:active {
        transform: scale(0.85);
    } */
        /* Styling for the container  */
        .container {
            display: flex;
        }

        /* Styling for the content area */
        .content {
            flex: 1;
            background-color: rgb(25, 25, 69);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;

            overflow-y: auto; /* Add scroll bar if content overflows */
        }

        /* Styling for the main content */
        h1 {
            color: #3498DB; /* Bright Blue */
            color: white;
        }

        p {
            color: white;
        }

        /* Styling for the cards (updated) */
        .card {
           /*  width: calc(33.33% - 40px); */ /* Three cards in a row with spacing */
            width: min-content;
            margin: 20px;
            padding: 20px;
            background-color: #ECF0F1;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .card img {
            
            height: 300px;
        }

        .card h2 {
            color: #3498DB; /* Bright Blue */
        }

        .card p {
            color: #555;
        }

        #btn-view {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border: 1px solid white;
            border-radius: 7px;
            cursor: pointer;
            position: relative;
            left: 32%;

        }

        #btn-view:hover {
            background-color: #2980B9;
        }
   
        .b {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 18px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .b {
            background-color: #2980B9;
        }

        .top-cont {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .left-cont {
            display: flex;
            flex-direction: column;
            align-content: space-around;
            gap: 50px;
        }
/* 
        .TA:hover {
            color: rgb(196, 166, 49);
        } */
        .ads-content{
            display: grid;
            grid-template-columns: repeat(3,1fr);
            grid-template-rows: repeat(2,1fr);
            /* grid-gap: 0px; */
            margin: 20px;
        }       
    </style>
</head>
<body>
    <!-- <div><button class="btn-back" onclick="location.href='home.php'"> X </button></div>
    <br> -->

    <div class="container">
        <div class="content">

            <div class="ads-content">
                <!-- Card 1 -->
                <div class="card">
                    <img src="https://sydneyhealthlaw.files.wordpress.com/2015/09/istock_000017276846small.jpg" alt="Ad 1" width="300px" height="300px">
                    <h2>Ad Type Drinks</h2>
                    <!-- <p>Description of Ad Type 1 goes here.</p> -->
                    <a  id="btn-view" href="videonew.php">View ADS</a>
                </div>
    
                <!-- Card 2 -->
                <div class="card">
                    <img src="https://clipart-library.com/images/kTKBMaGEc.jpg" alt="Ad 2" width="300px" height="300px">
                    <h2>Ad Type Shopping APPs</h2>
                    <!-- <p>Description of Ad Type 2 goes here.</p> -->
                    <a  id="btn-view" href="VIDEO.html">View ADS</a>
                </div>
    
                <!-- Card 3 -->
                <div class="card">
                    <img src="https://i.ytimg.com/vi/MJmSMuthhpo/sddefault.jpg" alt="Ad 3" width="300px" height="300px">
                    <h2>Ad Type SmartPhones</h2>
                    <!-- <p>Description of Ad Type 3 goes here.</p> -->
                    <a  id="btn-view" href="VIDEO.html">View ADS</a>
                </div>
                  <!-- Card 4 -->
                  <div class="card">
                    <img src="ads1.jpeg" alt="Ad 1" width="300px" height="300px">
                    <h2>Ad Type 4</h2>
                    <!-- <p>Description of Ad Type 1 goes here.</p> -->
                    <a  id="btn-view" href="add.html">View ADS</a>
                </div>
    
                <!-- Card 5 -->
                <div class="card">
                    <img src="ads2.jpeg" alt="Ad 2" width="300px" height="300px">
                    <h2>Ad Type 5</h2>
                    <!-- <p>Description of Ad Type 2 goes here.</p> -->
                    <a id="btn-view"  href="add.html">View ADS</a>
                </div>
    
                <!-- Card 6 -->
                <div class="card">
                    <img src="ads3.png" alt="Ad 3" width="300px" height="300px">
                    <h2>Ad Type 6</h2>
                    <!-- <p>Description of Ad Type 3 goes here.</p> -->
                    <a  id="btn-view" href="add.html">View ADS</a>
                </div>
                 
            </div>
            <!-- Add more cards as needed -->
        </div>
    </div>
</body>
</html>