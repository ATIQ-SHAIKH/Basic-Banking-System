<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['Account_number'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where Account_number=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where Account_number=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient Balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE customers set Balance=$newbalance where Account_number=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE customers set Balance=$newbalance where Account_number=$to";
                $query = mysqli_query($conn,$sql);
                

                if($query){
                     echo "<script> alert('Hurray! Transaction is Successful');
                                     window.location='view_customers.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/android-chrome-512x512.png">
    <link rel="stylesheet" href="customers.css">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light  border-dark" style="background-color: lightgrey;">
        <a class="navbar-brand" href="index.php">
            <img src="favicon_io/android-chrome-512x512.png" width="50" height="50" class="d-inline-block align-top " id="favicon" alt="Head Office picture">
          </a>
        <a class="navbar-brand" href="#"><h3>Basic Banking System</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"> 
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="view_customers.php" target="_blank">View Customers <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"  onclick="alert('LinkedIn: www.linkedin.com/in/atiqshaikh436\nInstagram: www.instagram.com/\nGithHub: github.com/ATIQ-SHAIKH/Basic-Banking-System\nHackerRank: www.hackerrank.com/atiqshaikh ');">About Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Money Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" type="text/css" href="css/table.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/navbar.css">-->

    <style type="text/css">


    	
		button{
			border:1px;
			background-color: blue;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:black;
		}

    </style>
</head>

<body>
<div class="bg-image" >

	<div class="container">
        <h2 class="text-center pt-4" style="color : black; opacity:100;">Easy Money Transfer</h2>
            <?php
                include 'config.php';
                $sAccount_number=$_GET['Account_number'];
                $sql = "SELECT * FROM  customers where Account_number=$sAccount_number";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : black; background-color: white; opacity: 90%;">
                    <th class="text-center">Account No.</th>
                    <th class="text-center">Account firstname</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Account Balane(in Rs.)</th>
                </tr>
                <tr style="color : black; background-color: white; opacity: 90%;">
                    <td class="py-2"><?php echo $rows['Account_number'] ?></td>
                    <td class="py-2"><?php echo $rows['firstname'] ?></td>
                    <td class="py-2"><?php echo $rows['Email'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose account</option>
            <?php
                include 'config.php';
                $sAccount_number=$_GET['Account_number'];
                $sql = "SELECT * FROM customers where Account_number!=$sAccount_number";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['Account_number'];?>" >
                
                    <?php echo $rows['firstname'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" style="background-color: purple; border: black" >Transfer Money</button>
            </div>
        </form>
    </div>
            </div>
    <footer class="foot">
        <div class="jumbotron jumbotron-fluid bg-dark text-black " id="footer">
            <div class="container-1">
            <h1 class="display-4">Basic Banking System&copy;</h1>
              <a id="footer-a" href="#">FAQ |</a>
              <a id="footer-a" href="#">Contact Us |</a>
              <a id="footer-a" href="#">Terms of use |</a>
              <a id="footer-a" href="#">Privacy Policy |</a>
              <a id="footer-a" href="#">Refund Policy</a>
            </div>
          </div>
    </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>