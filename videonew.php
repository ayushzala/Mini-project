<?php

@include 'config.php';

session_start();
$email = $_SESSION['email'];
$select = " SELECT * FROM user_form WHERE email = '$email' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

   $row = mysqli_fetch_array($result);
   $_SESSION['vlimit'] = $row['vl'];
}
function addCoins($email, $coins) {
  $db = new mysqli('localhost', 'root', '', 'user_db');
  $query = 'UPDATE user_form SET coins = coins + 10 WHERE email = ?';
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  
  /////////////////////////////////////////////////////////////////////////////////////
  $query = 'UPDATE user_form SET vl = vl - 1  WHERE email = ?';

$stmt = $db->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->close();
$db->close();
}

// $user_name = $_POST['user_name'];
// Increment the coin value by 5.
if(isset($_POST['addcoin'])){
  $email= $_SESSION['email'];
  if($_SESSION['vlimit'] > 0){

addCoins($email, 10);
header('Location: home.php');
}else{
  echo "Your Today Limit is Over !!Try Tomorrow!!";
}
}
// Redirect the user to the user page.

?>

<!DOCTYPE html>
<html>
<head>
  <title> Watch VideoAD Here TO WIN </title>
  <script src="https://www.youtube.com/iframe_api"></script>
<style>
      *{
            margin:0;
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
        #claim{
            background-color: #07d1f5;
            color: #fff;
            border: 2px solid rgb(249, 6, 6);
            padding: 10px 10px;
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
            display : none;
        }
        #addcoin:active{
            transform: scale(0.85);
        }
</style>
</head>
<body>
<center>
<div>
  <h1> ! Watch AD  ! </h1>
  <div id="showlimit"> <b>Your Today Watch limit  => <?php  echo $_SESSION['vlimit'] ?>  </b> </div>

</div>
  <div id="player"></div>
  
  <br>
  <div>
  <font style="font-weight:bolder ;
               padding:10px;
               padding-left:10px; 
               padding-right:10px; 
               border:solid blue 9px; 
               border-radius:10px; 
               width:100%; 
               color:red; 
               font-size: 250%;
               /* margin-right:10px; */

             "> 
<!-- <i class="fa fa-clock-o" style="font-size:30px; color:blue;"></i>  -->
<font id="tvalue">40</font>
</font>
</div>
<div>
    <br><br>
    <button  id="claim" disabled onclick = "claimbtn()"> <b> Claim </b> </button>
    <br>
    </div>
    <div>
    <br>
    <form action="" method="post">
<input type = "submit" name = "addcoin" value="ADD Coins" id ="addcoin">
      </form>    
</div>
</div>

</center>

<script>

  var tag = document.createElement('script');
  
        tag.src = "https://www.youtube.com/iframe_api";
        var player;
        function onYouTubeIframeAPIReady() {
          player = new YT.Player('player', {
            height: '560',
            width: '90%',
            frameborder: '0',
            allowfullscreen: '1',
            videoId: 'LnvSNO-PUsg',
            playerVars: {
              'playsinline': 1
            },
            events: {
              'onReady': onPlayerReady,
              'onStateChange': onPlayerStateChange
            }
          });
        }
        
        function onPlayerReady(event) {
          console.log("ready");
        }
  
  var vdata = false;
  
        function onPlayerStateChange(event) {
          if (event.data == YT.PlayerState.PLAYING) {
            if(event.data==1){vdata = true; }else{vdata = false;}
          }else{vdata = false;}
        }
        function stopVideo() {
          player.stopVideo();
        }

let tvalue=40;
const maintval=40;
const divtvalue = tvalue/100;
    Interval = setInterval(function(){ 
if(tvalue>0){
if(vdata){    
tvalue--;
let tminutes = Math.floor(tvalue / 60);
var tseconds = tvalue%60;
if(tseconds<10){var tseconds="0"+tseconds+"";}
if(tminutes==0){
document.getElementById("tvalue").innerHTML = ""+tseconds+"";
document.getElementById("tvaluegame").innerHTML = ""+tseconds+"";}
else{
document.getElementById("tvalue").innerHTML = ""+tminutes+":"+tseconds+"";
document.getElementById("tvaluegame").innerHTML = ""+tminutes+":"+tseconds+"";}

// var bgdata = tvalue/divtvalue;
// document.getElementById("dsubmit").style.background = "linear-gradient(180deg, grey "+bgdata+"%, #047aed 100%)";

// const realtime = maintval-tvalue;
// if(realtime%5==0 & realtime>0){
// let xvid = $("#vidid").val();
// let xvtype= "update";
// $.ajax({
// url : "videostatus.php",
// type : "POST",
// data : {id:xvid, type:xvtype, time:realtime},
// success : function(tupdated){
// if(tupdated%5==0){
// if(tupdated==maintval){
// document.getElementById("bclaim").style.display = "none";
// document.getElementById("aclaim").style.display = "block";
// }
// }else{location.reload();}
// }
// });
// }
}
 }
 else{
    document.getElementById("claim").disabled = false;
 }
}, 1000); 

// submitButton.addEventListener('click', () => {
function claimbtn(){
clearInterval(Interval);
// document.getElementById("claim").style.display = none;
document.getElementById("addcoin").style.display = "block";

};
function added(){
  // submitButton.disabled = true;
  alert( 'Hello Dear!! 🪙10 Coins🪙 Are Added successfully!!! ');
};
</script>
</body>
</html>