<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="contactus.css">
    <style>
        body{
            background-image: url(bits.jpg);
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body style="background-image: url(bits.jpg)">
    <div class="container">
        <header>
            <h1>Contact Us</h1>
            <p></p>
        </header>
        <div class="content">
            <div class="content-form">
                <section>
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                    <h2>address</h2>
                    <p>
                        Sarisha,West bengal <br>
                        THE NEOTIA UNIVERSITY. <br>
                    </p>
                </section>

                <section>
                    <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                    <h2>Phone</h2>
                    <p>7583916075</p>
                </section>

                <section>
                    <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                    <h2>E-mail</h2>
                    <p>soumyadeepg27@gmail.com</p>
                </section>
            </div>
        </div>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ifcontactname=isset($_POST['fullname']);

            if($ifcontactname == TRUE){
                $fullname=$_POST['fullname'];
                $email=$_POST['email'];
                $message=$_POST['message'];
                echo $fullname;
                echo $email;
            }
        }

        //connecting with the database:
        $servername="localhost";
        $username="root";
        $password="";
        $database="s3a";

        //connection:
        $conn=mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die ("Sorry! Database not conncted" . mysqli_connect_error() ."<br>");
        }
        else{
            // echo "Database Connected";
        }

        if($ifcontactname == TRUE){
            $sql="INSERT INTO `s3a_contactus` (`name`, `email`, `message`) VALUES ('$fullname', '$email', '$message')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> Your data has been inserted.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
            else{
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>SORRY!</strong> Your data cannot be inserted due to some error.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
        else{
            echo "Sorry! Invalid Credentials.";
        }
        ?>
      <form action="/MINI PROJECT/contactus.php" method="post">
        <div class="form">
            <div class="right">
              <div class="contact-form">
                <input type="text" id="fullname" class="form-control" name="fullname" required>
                  <span>Full Name</span>
              </div>
  
              <div class="contact-form">
                  <input type="email" id="email" class="form-control" name="email" required>
                  <span>E-mail Id</span>
              </div>

              <div class="contact-form">
                  <input type="text" class="form-control" id="message" name="message">
                  <span> Type your Message....</span>
              </div>
  
              <div class="contact-form">
                  <input type="submit" name="submit">
              </div>
              </div>
            </div>
          </div>
    </form>
        <div class="media">
            <li><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></li>
        </div>
        <div class="empty">
        </div>
        <!-- <div class="abc">
        <p align="right">
                <button class="btn btn-primary me-md-2" type="button">
                    <a href="admin.php">MAIN MENU</a>
                </button> -->
                <!-- <input type="button" value="Click Me" /> -->
            <!-- </p>
        </div> -->
    </div>    
</body>
</html>