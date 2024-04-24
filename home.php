<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['isLoggedIn'])){
    header('location:index.php');
    
 }

?>
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html>
<head>
    <title>HOME PAGE OF SITE </title>
    <style>
        body {
            overflow-x: hidden;
            background-color: rgb(25, 25, 69);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            background-color: #2E4053;
            color: #ECF0F1;
            padding: 20px;
            text-align: center;
        }

        .navbar a {
            text-decoration: none;
            font-size: 20px;
            color: #ECF0F1;
            display: inline-block;
            margin: 0 20px;
        }

        /* .navbar a:hover {
            background-color: rgb(231, 136, 136);
        } */

        .content {
            width: 100%;
            background-color: rgb(25, 25, 69);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        h1 {
            color:cyan;
            font-size: 36px;
            text-transform: uppercase;
            text-shadow: 3px 3px 5px #918d8d;
            font-weight: bolder;
            letter-spacing: 3px;
        }

        p {
            font-size: 20px;
        }
        .btn {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 20px;
            transition:all 0.15s ease;

        }

        .btn:hover {
            background-color:black;
        }
        .btn:active {
            transform: scale(0.85);
        }
        .btn-logout {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 20px;
            transition:all 0.15s ease;

        }

        .btn-logout:hover {
            background-color:red;
        }
        .btn-logout:active {
            transform: scale(0.85);
        }

        .earning-info {
            text-align: center;
            margin-top: 20px;
        }

        .earning-info h2 {
            color: #3498DB;
            font-size: 36px;
            text-transform: uppercase;
            text-shadow: 3px 3px 5px #555;
            margin-bottom: 20px;
        }

        .earning-info p {
            color: white;
            font-size: 18px;
            line-height: 1.5;
        }

        .btn-read-more {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 20px;
            display: inline-block;
            transition:all 0.15s ease;

        }

        .btn-read-more:hover {
            background-color: #2980B9;
        }
        .btn-read-more:active {
            transition:all 0.15s ease;
        }

        /* Grid for Cards */
        .cards-grid {
            margin-top: 4% ;
            margin-left: 10%;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            justify-content: center; /* Center-align the grid */
        }

        /* Card styling */
        .card {
            width: 100%;
            max-width: 300px;
            background-color: #ECF0F1;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(249, 247, 247, 0.1);
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        .card h2 {
            color: #3498DB;
            font-size: 24px;
            margin: 10px 20px;
        }

        .card p {
            color: #555;
            font-size: 16px;
            margin: 0 20px 10px;
        }

        /* View button styling */
        .btn-view {
            background-color: #3498DB;
            color: #ECF0F1;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            margin-top: auto;
            transition:all 0.15s ease;

        }

        .btn-view:hover {
            background-color: #0b5a8e;
        }
        .btn-view:active {
            transform: scale(0.85);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a >Home</a>
            <a class="btn" href="about.html">About</a>
            <a class="btn" href="services.html">Services</a>
            <a class="btn" href="contact.html">Contact</a>
            <a class="btn" href="wallets.php"> Wallet </a>
            <a class="btn-logout" href="logout.php">Log Out</a>
            <!-- <a href="profile.html"> Profile </a> -->
        </div>

        <div class="content">
        <h1>Welcome, <span><u><?php echo $_SESSION['name'] ?></u></span></h1>

            <div class="earning-info">
                <h1> Watch Ads , Earn Rewards </h1>
                <p> <b>Start earning Rewards with our platform.</b> </p><br>
                <p><b>Explore various opportunities to earn through video ads, window ads, and game ads.</b> </p><br>
                <p> <b>Join us today and maximize your earnings.</b></p>
                <a class="btn-read-more" href="https://www.google.com/search?q=earning+site&sca_esv=577490029&rlz=1C1CHBF_enIN1075IN1075&sxsrf=AM9HkKlxrogBRUbpfB3hQif_cmnf6QMhEg%3A1698521580098&ei=7GE9Zd7UBc-eseMP2safgAM&ved=0ahUKEwje-rL7vZmCAxVPT2wGHVrjBzAQ4dUDCBA&uact=5&oq=earning+site&gs_lp=Egxnd3Mtd2l6LXNlcnAiDGVhcm5pbmcgc2l0ZTIHECMYigUYJzIKEAAYgAQYFBiHAjIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAESMIvUPYEWPYEcAF4AZABAJgByQGgAckBqgEDMi0xuAEDyAEA-AEBwgIKEAAYRxjWBBiwA8ICChAAGIoFGLADGEPCAg4QABjkAhjWBBiwA9gBAcICFhAuGIoFGMcBGNEDGMgDGLADGEPYAQLiAwQYACBBiAYBkAYTugYGCAEQARgJugYGCAIQARgI&sclient=gws-wiz-serp" 
                target = "_blank">Read More</a>
            </div><br><br>
            <!-- Grid for Cards -->
            <div class="cards-grid">
                <div class="card">
                    <img src="https://cdn3.iconfinder.com/data/icons/seo-long-shadow/36/video-player-512.png" alt="Video Ads" width="400px" height="400px">
                    <h2> Watch Videos</h2>
                    <p>Watch video as ads for particular time and earn rewards.</p>
                    <a class="btn-view" href="videotype.php">PLAY</a>
                </div>

                <div class="card">
                    <img src="https://th.bing.com/th/id/OIP.JW4_m9cH_KS3mvIXY7kmqwHaF9?pid=ImgDet&rs=1" alt="Windows Ads" width="400px" height="400px">
                    <h2> Scratch Cards </h2>
                    <p>View Windows ads and earn Rewards.</p>
                    <a class="btn-view" href="scratchcard.php">PLAY</a>
                </div>

                <div class="card">
                    <img src="https://cdn-icons-png.flaticon.com/512/6645/6645363.png" alt="Game Ads"width="400px" height="400px">
                    <h2> Play Wheel Game </h2>
                    <p>Play Lucky Wheel games and earn  rewards.</p> 
                    <a class="btn-view" href="sniperwheel.php">PLAY</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>