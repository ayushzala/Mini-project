<?php

@include 'config.php';

session_start();
$email = $_SESSION['email'];
$select = " SELECT * FROM user_form WHERE email = '$email' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

   $row = mysqli_fetch_array($result);
   $_SESSION['climit'] = $row['cl'];

}

function addCoins($email, $coins) {
  $db = new mysqli('localhost', 'root', '', 'user_db');
  $query = 'UPDATE user_form SET coins = coins + 5 WHERE email = ?';
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $email);
  $stmt->execute();

/////////////////////////////////////////////////////////////////////////
$query = 'UPDATE user_form SET cl = cl - 1  WHERE email = ?';

$stmt = $db->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->close();
$db->close();
}

// $user_name = $_POST['user_name'];
// Increment the coin value by 5.
if(isset($_POST['cancel'])){
  $email= $_SESSION['email'];
  if($_SESSION['climit'] > 0){

addCoins($email, 5);
header('Location: home.php');
}else{
  echo "Your Today Limit is Over !!Try Tomorrow!!";
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>scratch the card To WIN</title>

    <style>
      *{
        margin: 0;
        padding:0;
      }
      body{
        background-color: rgb(207, 207, 235);
      }
      h1{
        color:blue;
          letter-spacing: 2px;
          font-weight: bolder;
      }
      #showlimit{
        font-size: 30px;
        color:blue;
        letter-spacing: 5px;

        /* position: absolute;
        margin-top: -500px; */
        
    }
        .card{
         width: 300px;
         height: 300px;
         position: relative;
         /* box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.2); */
        margin: 10px auto;
        }    
        
      .base, #scratch {
        cursor: default;
        height: 300px;
        width: 300px;
          position: absolute;
          top: 0;
          left: 0;
          cursor: grabbing;
      }
      .base {
        line-height: 100px;
        text-align: center;
      }
               
      #claim{
            background-color: #07d1f5;
            color: #fff;
            border: 2px solid rgb(249, 6, 6);
            padding: 10px 10px;
            margin-top: 6%;
            font-size: 18px;
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.1s ease;
            letter-spacing: 1px;

        }

        #claim:disabled {
            background: gray;
            cursor: not-allowed;
        }
        #claim:active{
            transform: scale(0.85);
        }
        font{
          font-size: xx-large;
          color:darkmagenta;
        }
        .hidden {
        display: none;
      }

      #image-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: black;
  z-index: 9999;
}

#image {
  max-width: 100vw;
  max-height: 100vh;
  margin: 0 auto;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

#cancel-button {
  position: absolute;
  top: 0;
  right: 0;
  padding: 10px;
  background-color: red;
  color: white;
}
#addcoin{
            background-color: #07d1f5;
            color: #fff;
            border: 2px solid rgb(249, 6, 6);
            padding: 10px 10px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 10px;
            letter-spacing: 1px;
            transition: all 0.1s ease;
            /* display : none; */
        }
        #addcoin:active{
            transform: scale(0.85);
        }
        
    </style>   
</head>

<body>
  <center>
<div> 
  <h1> ! Scratch The Card !<br><br>
</h1>
    
</div>
<div id="showlimit"> <b>Your Today Scratch  limit  => <?php  echo $_SESSION['climit'] ?> </b> </div>

    <div class="card">
      <div class="base"> 
       <font> You Just WON!! </font>
       <font> <BR> 5 🪙 </font>
      </div>
       <canvas id="scratch" width="300" height="300"></canvas>
      <!-- <canvas id="scratch" width="300" height="60"></canvas> -->
      </div>

      <div>
          <button id="claim" disabled > <b> Claim </b> </button>
          <br>
        </div>
        <div id="image-container" class="hidden">
        <img id="image" src="https://th.bing.com/th/id/OIP.sCxBLCuAw8WsIDVF1RAgVwHaJQ?pid=ImgDet&rs=1" >
           <form action="" method="post">
  
         <button id="cancel-button" name = "cancel"> X </button>
      </form>
    </div>
      </center>
<!-- scratch-card-with-canvas JS -->
<!-- <script src="try.js"></script>  -->
<script>
  (function() {
    'use strict';
  
    var canvas = document.getElementById('scratch'),
        context = canvas.getContext('2d');
  
    // default value
    context.globalCompositeOperation = 'source-over';
  
    //----------------------------------------------------------------------------
  
    var x, y, radius;
  
    x = y = radius = 150 / 2;
  
    // fill circle
    context.beginPath();
    context.fillStyle = '#515151';
    context.rect(0, 0, 300, 300);
    context.fill();
  
    //----------------------------------------------------------------------------
  
    var isDrag = false;
  
    function getAbsoluteCoordinates(canvas, event) {
      var canvasRect = canvas.getBoundingClientRect();
      return {
        x: event.clientX - canvasRect.left,
        y: event.clientY - canvasRect.top
      };
    }
  
    function clearArc(x, y) {
      if (isDrag) {
        context.globalCompositeOperation = 'destination-out';
        context.beginPath();
        context.arc(x, y, 22, 0, Math.PI * 2, false);
        context.fill();
      }
    }
  
    canvas.addEventListener('mousedown', function(event) {
      isDrag = true;
  
      var coordinates = getAbsoluteCoordinates(canvas, event);
  
      clearArc(coordinates.x, coordinates.y);
      judgeVisible();
    }, false);
  
    canvas.addEventListener('mousemove', function(event) {
      if (!isDrag) {
        return;
      }
  
      var coordinates = getAbsoluteCoordinates(canvas, event);
  
      clearArc(coordinates.x, coordinates.y);
      judgeVisible();
    }, false);
  
    canvas.addEventListener('mouseup', function(event) {
      isDrag = false;
    }, false);
  
    canvas.addEventListener('mouseleave', function(event) {
      isDrag = false;
    }, false);
  
    //----------------------------------------------------------------------------
    // const showImageButton = document.getElementById('claim');
    // const imageContainer = document.getElementById('image-container');
    // const cancelButton = document.getElementById('cancel-button');
    const claimButton = document.querySelector('#claim');
    const imageContainer = document.querySelector('#image-container');
    const cancelButton = document.querySelector('#cancel-button');
    function judgeVisible() {
      var imageData = context.getImageData(0, 0, canvas.width, canvas.height),
          pixels = imageData.data,
          result = {},
          i, len;
  
      // count alpha values
      for (i = 3, len = pixels.length; i < len; i += 4) {
        result[pixels[i]] || (result[pixels[i]] = 0);
        result[pixels[i]]++;
      }
  if( result[0] > 65000){
    claimButton.disabled = false;

  }};
    //   document.getElementById('gray-count').innerHTML = result[255];
    //   document.getElementById('erase-count').innerHTML = result[0];
    
    // document.getElementById("submit")
    claimButton.addEventListener('click', () => {

  imageContainer.style.display = "block";
  
});

cancelButton.addEventListener('click', () => {
  alert("Hello Dear!! 🪙5 Coins🪙 Are Added successfully!!!");

  imageContainer.style.display = 'none';

});
// function added(){

          // addButton.onclick = function (){
          // alert("Hello Dear!! 🪙5 Coins🪙 Are Added successfully!!!");
          // }
      // imageContainer.style.display = 'none';
    // showImageButton.disabled = true;
      // };
    document.addEventListener('DOMContentLoaded', judgeVisible, false);
  
  })();
</script>
</body>
</html>