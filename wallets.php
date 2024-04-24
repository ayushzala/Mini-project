<?php

@include 'config.php';

session_start();
$email = $_SESSION['email'];
$select = " SELECT * FROM user_form WHERE email = '$email' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

   $row = mysqli_fetch_array($result);
   $_SESSION['coins'] = $row['coins'];

}

function withCoins($email,$upi) {
  $db = new mysqli('localhost', 'root', '', 'user_db');
  $query = 'UPDATE user_form SET coins = coins - 10 WHERE email = ?';
  $stmt = $db->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  // $stmt->close();
  // $db->close();
  
  // $db = new mysqli('localhost', 'root', '', 'user_db');
// $query2 = 'INSERT INTO user_form (withdraw) VALUES (?) WHERE email = ?';
$query = 'UPDATE user_form SET withdraw = ?  WHERE email = ?';

$stmt = $db->prepare($query);
$stmt->bind_param("ss", $upi, $email);
$stmt->execute();
$stmt->close();
$db->close();
}
  // $db = new mysqli('localhost', 'root', '', 'user_db');
  // $query = 'INSERT INTO user_form (upid) VALUES('$upi') WHERE email = ?';
  // $stmt = $db->prepare($query);
  // $stmt->bind_param("s", $email );
  // $stmt->execute();
  // $stmt->close();
  // $db->close();

// $user_name = $_POST['user_name'];
// Increment the coin value by 5.
if(isset($_POST['withdraw'])){
    // if(isset($_POST['upi'] )){

  if($_SESSION['coins'] >= 20){
  $email = $_SESSION['email'];
$upid = $_POST['upi'];
withCoins($email,$upid);
header('Location: home.php');
}}
// else{
//   $err = echo "COINS MUST BE  ";
// }}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Wallet</title>
  <style>
    *{
        margin: 0;
        padding: 0;

    }
   body {
    background-color:  rgb(25, 25, 69);;
    }

    .container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f5f5f5;
}


    .wallet {
      /* background-image: url(''); */
      /* background-repeat: no-repeat; */
      background-size: cover;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color:lightgrey;
      padding: 20px;
      border-radius: 10px;
    }

#gif{
    background-color: rgb(25, 25, 69);

}
    /* .wallet input {
      margin-bottom: 10px;
      width: 100%;
      padding: 5px;
    } */
.namedisplay{
  letter-spacing : 2px;
}
    .wallet-balance {
      font-size: 500%;
      display: flex;
      align-items: center;
      justify-content: center;
      letter-spacing: 7px;
    }

    .wallet-balance img {
     
    }

    .wallet-withdrawal-button,
    .upi-id {
      background-color: #009be1;
      color: rgb(255, 255, 255);
      border: none;
      font-size: 110%;
      letter-spacing: 1px;
      padding: 10px;
      text-align: center;
      cursor: pointer;
    }
#input {
  font-size: 140%;
}
    .wallet-info {
      padding: 10px;
    }
    .rate {
      font-size: 200%;
      display: flex;
      align-items: center;
      justify-content: center;
      
    }
  </style>
</head>
<body>
    <center>

        <img id ="gif" src="https://usagif.com/wp-content/uploads/gifs/coin-flip-27.gif" alt="gif" width="200px" height="200">
        <div class="container">
            <!-- <form action="" method="post"> -->
                <div class="wallet">
                <h2 class="namedisplay">NAME : <u><?php echo $_SESSION['name'] ?> </u></h2><br>
                <h2>EMAIL: <u><?php echo $_SESSION['email'] ?></u></h2><br><br>
        <div class="wallet-balance">
 <img src="https://webstockreview.net/images/circle-clipart-badge-2.png" alt="Coin" width="20%" >
 <?php echo $_SESSION['coins'] ?>
        </div><br><br>
        <img src="https://macintelgroup.co.in/wp-content/uploads/2021/07/Bhim-Upi-Logo-PNG.png" width="50%"><br><br>  
       
        <form action = "" method = "post">
        <button  class="upi-id"  >UPI ID => </button>
        

  <input type="text" name="upi" id= "input" placeholder="Enter Yr UPI/VPA ID" required ><BR><br>
  <button type="submit" class="wallet-withdrawal-button" name="withdraw"  onclick="added()" >Withdraw</button><br><br>
</form>
        <!-- <p>HERE 1000 POINTS=1 RUPEE</p> -->
        <div class="rate">
            <img src="https://pluspng.com/img-png/gold-coins-png-hd-file-gold-coin-icon-png-coin-hd-png-887.png" width="10%"> 10 = ₹1
                   </div>
    </div>
<!-- </form> -->
</div>
</center>
<script>
// let with =  document.getElementById('withdraw');
// const withdrawButton = document.getElementById('withdraw');
// function added(){
  // submitButton.disabled = true;
  const with = document.querySelector('#withdraw');
 with.addEventListener('click', () => {

  alert( 'Hello Dear!! 🪙10 Coins🪙 Are diducted successfully!!! ');
});

// withdrawButton.addEventListener('click', function() {
  // Code to execute when the button is clicked
//   alert("Coins diducted");

// });

</script>
</body>
</html>