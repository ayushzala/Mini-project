<?php

@include 'config.php';

session_start();
$email = $_SESSION['email'];
$select = " SELECT * FROM user_form WHERE email = '$email' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

   $row = mysqli_fetch_array($result);
   $_SESSION['slimit'] = $row['sl'];

}
function addCoins($email, $coins) {
  $db = new mysqli('localhost', 'root', '', 'user_db');
  $query = 'UPDATE user_form SET coins = coins + 5 WHERE email = ?';
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $email);
  $stmt->execute();
 
///////////////////////////////////////////////////////////////////////
$query = 'UPDATE user_form SET sl = sl - 1  WHERE email = ?';

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
  if($_SESSION['slimit'] > 0){

addCoins($email, 5);
header('Location: home.php');

}else{
    echo "Your Today Limit is Over !!Try Tomorrow!!";
  }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Spin The Wheel </title>
    <style>*{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        min-height: 100vh;
        background: rgb(25, 25, 69);
    }
    #showlimit{
        font-size: 30px;
        color:aqua;
        letter-spacing: 5px;

        position: absolute;
        margin-top: -500px;
        
    }
    .container{
        height: 350px;
        width: 350px;
        background: #4ed4c6;
        position: relative;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 0 10px rgb(250, 249, 249);
        transition: 3s all;
    }
    .container div{
        height: 50%;
        width: 200px;
        clip-path: polygon(100% 0,50% 100%, 0 0);
        transform: translateX(-50%);
        transform-origin: bottom;
        position: absolute;
        left: 21%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-family: monospace;
        font-weight: 1000;
        color:#008276; 
         writing-mode: vertical-rl;
    }
    .container .one{
        background: #baf4ee;
        left: 50%;
    }
    .container .two{
        background: #4ed4c6;
        transform: rotate(60deg);
    }
    .container .three{
        background: #baf4ee;
        transform: rotate(120deg);
    }
    .container .four{
        background: #4ed4c6;
        transform: rotate(180deg);
    }
    .container .five{
        background: #baf4ee;
        transform: rotate(240deg);
    }
    .container .six{
        background: #4ed4c6;
        transform: rotate(300deg);
    }
    .mid{
        height: 25px;
        width: 25px;
        border-radius: 50%;
        position: absolute;
        background: rgb(25, 25, 69);
    }
    #spin{
        height: 60px;
        width: 200px;
        background: #4ed4c6;
        position: absolute;
        margin-top: 33%;
        font-size: 30px;
        color: white;
        font-weight: 1000;
        letter-spacing: 4px;
        border: 1px solid white;
        cursor: pointer;
        box-shadow: 0 5px 10px gray;
        transition: 0.15s all;
    }
    #spin:active {
           transform : scale(0.85);
        }
    #spin:hover{
        box-shadow: none;
    }
    #spin:disabled {
            background: gray;
            cursor: not-allowed;
        }
    .stoper{
        height: 50px;
        width: 40px;
        background: #ffd600;
        position: absolute;
        clip-path: polygon(100% 0,50% 100%, 0 0);
        margin-top: -350px;
    }
    .hidden {
        display: none;
      }
/* ///////////////////// */
    #adbutton{
        height: 60px;
        width: 250px;
        background: #4ed4c6;
        position: absolute;
        margin-top: 650px;
        font-size: 30px;
        color: white;
        font-weight: 1000;
        letter-spacing: 4px;
        border: 1px solid white;
        cursor: pointer;
        box-shadow: 0 5px 10px gray;
        transition: 0.15s all;
    }
    #adbutton:hover{
        box-shadow: none;
    }
    #adbutton:active {
            transform : scale(0.85);
        }
    /* NOWWWWWWWWWWWW */
    #image {
  max-width: 100vw;
  max-height: 100vh;
  margin: 0 auto;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
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
    </style>
</head>
<body>
    <div class="container">
        <div class="one"> 10 </div>
		<div class="two"> 20 </div>
		<div class="three"> 30 </div>
		<div class="four"> 40 </div>
		<div class="five"> 50 </div>
		<div class="six"> 60 </div>
	</div>
    
    <span class="mid"></span>
    <button id="spin">Spin</button>
    <div class="stoper"></div>
    <!-- watch ad button -->
    <button id="adbutton" class="hidden" > Watch AD </button>
    <div id="showlimit"> <b>Your Today Spin limit  => <?php  echo $_SESSION['slimit'] ?>  </b> </div>
<!-- NOWWWWWWW-->
       
            <div id="image-container" class="hidden">
              <img id="image" src="OIP.jpeg" >  
              <form action="" method="post">
              <button id="cancel-button" name = "cancel"> X </button>
              </form>
        
	<script>       
    let container = document.querySelector(".container");
        let btn = document.getElementById("spin");
        let number = Math.ceil(Math.random() * 10000);

        // var limit = 10;
        let spinlimit = document.getElementById("showlimit");
        
        // let flash = document.querySelector(".container div");
        
        const button10 = document.querySelector('#spin');
        const button20 = document.querySelector('#adbutton');
        
        const showImageButton = document.querySelector('#adbutton');
        const imageContainer = document.querySelector('#image-container');
        const cancelButton = document.querySelector('#cancel-button');
        btn.onclick = function () {
            container.style.transform = "rotate(" + number + "deg)";
            number += Math.ceil(Math.random() * 10000);
            btn.disabled = true;
        }
         
        button10.addEventListener('click',() => {
        setTimeout(() => {
        button20.style.display = 'block';}, 3500);});


showImageButton.addEventListener('click', () => {
  imageContainer.style.display = 'block';
});

cancelButton.addEventListener('click', () => {
    alert("Hello Dear!! 🪙5 Coins🪙 Are Added successfully!!!");
  imageContainer.style.display = 'none';
  button20.style.display = 'none';
  btn.disabled = false;
  if(limit > 0){
    //   limit--;
// document.getElementById("showlimit").innerHTML = ` <b> Your Spin limit  =>  ${limit} </b>`;
  }else {
    alert("Sorry!! Your Limit is OVERRR....Try Again Next Time........");
  }
});
</script>
</body>
</html>
