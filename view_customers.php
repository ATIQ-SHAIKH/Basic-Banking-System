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
            <li class="nav-item "> 
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="view_customers.php" target="_blank">View Customers <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"  onclick="alert('LinkedIn: www.linkedin.com/in/atiqshaikh436\nInstagram: www.instagram.com/\nGithHub: github.com/ATIQ-SHAIKH/Basic-Banking-System\nHackerRank: www.hackerrank.com/atiqshaikh ');">About Us</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main>  
    <section>
        <div class="bg-image" >
    <?php
    include 'config.php';
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>
<div class="container">
        <!--<h2 class="text-center pt-4" style="color : black;">Our Customers</h2>-->
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
                        <thead style="color : black;">
                            <tr>
                            <th scope="col" class="text-center py-2">Account holder name</th>
                            <th scope="col" class="text-center py-2">Account no.</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Account Balance(in Rs.)</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                        <td class="py-2"><?php echo $rows['firstname'] ?><?php echo " " ?><?php echo $rows['lastname'] ?></td>
                        <td class="py-2"><?php echo $rows['Account_number']?></td>
                        <td class="py-2"><?php echo $rows['Email']?></td>
                        <td class="py-2"><?php echo $rows['Balance']?></td>
                        <td><a href="selecteduserdetail.php?Account_number= <?php echo $rows['Account_number'] ;?>"> <button type="button" class="btn" style="background-color : #A569BD;">Transfer money</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
        </div>
    </section>
    <footer class="foot">
        <div class="jumbotron jumbotron-fluAccount_number bg-dark text-white " Account_number="footer">
            <div class="container-1">
            <h1 class="display-4">Basic Banking System&copy;</h1>
              <a Account_number="footer-a" href="#">FAQ |</a>
              <a Account_number="footer-a" href="#">Contact Us |</a>
              <a Account_number="footer-a" href="#">Terms of use |</a>
              <a Account_number="footer-a" href="#">Privacy Policy |</a>
              <a Account_number="footer-a" href="#">Refund Policy</a>
            </div>
          </div>
    </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>