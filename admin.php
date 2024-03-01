<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYPTOSITE</title>
    <link rel="stylesheet" href="style (1).css">
    <!-- <style>
        body {
            background-image: url(bits.jpg);
        } 
    </style> -->
</head>

<body style="background-image: url()">
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href='admin.php'>WELCOME TO OUR SITE</a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='ceaser.html'>ENCRYPTION</a></li>
                    <li><a href="ceaser2.html">DECRYPTION</a>
                    <li><a href='aboutus.html'>ABOUT US</a></li>
                    <li><a href='contactus.php'>CONTACT US</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'"
                            style="width:auto;">LOG IN / REGISTER</button></li>
                </ul>
            </nav>
        </div>
        <div class="paragraph">
            <p>
            <h2>What is cryptography ?</h2>
            <br>
            Cryptography, or cryptology, is the practice and study of techniques for secure communication in the
            presence of adversarial behavior.More generally, cryptography is about constructing and analyzing protocols
            that prevent third parties or the public from reading private messages; various aspects in information
            security such as data confidentiality, data integrity, authentication, and non-repudiation are central to
            modern cryptography. Modern cryptography exists at the intersection of the disciplines of mathematics,
            computer science, electrical engineering, communication science, and physics. Applications of cryptography
            include electronic commerce, chip-based payment cards, digital currencies, computer passwords, and military
            communications.
            <br>
            <br>
            <h2>Types of cryptography:</h2>
            <br>
            <h3>Symmetric key Cryptography</h3><br>
            >Transposition Ciphers<br>
            >Subsititution Cipher<br>
            >Stream Cipher<br>
            >Block Cipher<br>
            <h3>Asymmetric key Cryptography</h3><br>
            >RSA<br>
            >DSS<br>
            >ECC<br>
            >Diffie-Hellman exchange method
            <br><br>
            <h2>Why do we need cryptography ?</h2><br>
            While encryption doesn't magically convey security, it can still be used to protect a user's identity and
            privacy. If we are ever being watched, inadvertently or not, we can hide our data by using properly
            implemented crypto systems. According to cryptographer and security and privacy specialist Bruce Schneier,
            “Encryption works best if it is ubiquitous and automatic. It should be enabled for everything by default,
            not a feature you only turn on when you are doing something you consider worth protecting.”


            </p>
        </div>
        <?php
        // if (include 'new.php'){
        //     // echo "php running";
        // }
        // else{
        //     // echo "php not running";
        // }
        // include 'new.php';
        // global $user_username,$user_password;
        //sending datas to the database:
        // if (isset($user_username)==TRUE && isset($user_password)==TRUE) {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $ifloginusername=isset($_POST['user_username']);
                $ifregisterusername=isset($_POST['firstname']);
            if ($ifloginusername== TRUE) {

                $user_username=$_POST['user_username'];
                $user_password=$_POST['user_password'];
                // echo $user_username;
                // echo $user_password;
                
            }

            if ($ifregisterusername== TRUE) {

                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $email=$_POST['email'];
                $password_register=$_POST['password_register'];
                $cause=$_POST['cause'];
                // echo "registered";
                // echo $user_password;
                
            }
            // }
            
            //Connection with the database:
            $servername="localhost";
            $username="root";
            $password="";
            $database="s3a";
            
            //connection
            $conn=mysqli_connect($servername,$username,$password,$database);
            if(!$conn){
                die("Sorry! The connection was not established".mysqli_connect_error()."<br>");
            }
            else{
                // echo "Connection was successful <br>";
            }
            // $ifusername=isset($user_username);
            // $ifpassword=isset($user_password);
            //Inserting the datas:
            if($ifloginusername== TRUE){
                
                $sql="INSERT INTO `s3atab` (`username`, `password`) VALUES ('$user_username', '$user_password')";
                $result=mysqli_query($conn,$sql);
                // echo "test";
                // echo $result;
                if($result){
                    // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    // <strong>Success!</strong> You username '. $user_username .'has been created.
                    // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    // </div>';
                }
                else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> Invalid.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                
            }

            if($ifregisterusername== TRUE){
                
                $sql_register="INSERT INTO `s3atab_register` (`fname`, `lname`, `email`, `password`, `cause`) VALUES ('$firstname', '$lastname', '$email', '$password_register', '$cause')";
                $result_register=mysqli_query($conn,$sql_register);
                if($result_register){
                    // echo "data inserted";
                }else{
                    echo "data not inserted";
                }
                
            }

        }

            ?>
        <div id='login-form' class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' onclick='login()' class='toggle-btn'>Log In</button>
                    <button type='button' onclick='register()' class='toggle-btn'>Register</button>
                </div>
                <form action="/MINI PROJECT/admin.php" method="post" id="login">
                    <div class="mb-3" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;
    margin-top: 20%;">
                        <!-- <label for="username" class="form-label">Username</label> -->
                        <input type="text" name="user_username" class="form-control" id="username"
                            placeholder="Email Id" style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="mb-3" style="display: flex;
    justify-content: center;">
                        <!-- <label for="password" class="form-label">Password</label> -->
                        <input type="password" maxlength="27" class="form-control" id="password" name="user_password"
                            placeholder="Password" style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="mb-3 form-check" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;
    margin-top: 5%;">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1" style="    color: #ba9264;">Check me
                            out</label>
                    </div>
                    <div style="display: flex;
    justify-content: center;">
                        <button type="submit" class="btn btn-primary" style="    background-color: #f3c693;
    border: 0px;
    padding: 3%;
    border-radius: 1rem;
    width: 45%;">Submit</button>
                    </div>
                </form>

                <?php
                // if (isset($firstname)==TRUE && isset($lastname)==TRUE && isset($email)==TRUE && isset($password_register)==TRUE && isset($cause)==TRUE) {
                    # code...
                // if($_SERVER['REQUEST_METHOD']=="POST"){
                //     $firstname=$_POST['firstname'];
                //     $lastname=$_POST['lastname'];
                //     $email=$_POST['email'];
                //     $password_register=$_POST['password_register'];
                //     $cause=$_POST['cause'];
                //     echo "registered";

                // }
            //   }

                // $iffname=isset($firstname);
                // $iflname=isset($lastname);
                // $ifemail=isset($email);
                // $ifpassword_register=isset($password_register);
                // $ifcause=isset($cause);

                // if($iffname==TRUE){
                //     $sql_register="INSERT INTO `s3atab_register` (`fname`, `lname`, `email`, `password`, `cause`) VALUES ('$firstname', '$lastname', '$email', '$password_register', '$cause')";
                //     $result_register=mysqli_query($conn,$sql_register);
                //     if($result_register){
                //         echo "data inserted";
                //     }else{
                //         echo "data not inserted";
                //     }

                // }

                ?>
                <form action="/MINI PROJECT/admin.php" method="post" id="register" style="display: none;">
                    <div class="" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;
    margin-top: 20%;">
                        <!-- <label for="firstname" class="form-label">First Name</label> -->
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"
                            style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;;">
                        <!-- <label for="lastname" class="form-label">Last Name</label> -->
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name"
                            style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;">
                        <!-- <label for="email" class="form-label">Email ID</label> -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;">
                        <!-- <label for="password_register" class="form-label">Enter Password</label> -->
                        <input type="text" class="form-control" id="password_register" name="password_register"
                            placeholder="Enter Password" style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;">
                        <!-- <label for="cause" class="form-label">Cause</label> -->
                        <input type="text" class="form-control" id="cause" name="cause" placeholder="Cause" style="    color: white;
    background-color: #ffffff00;
    border: 0px;
    border-bottom: 1px solid #bc8343;
    width: 70%;
    font-size: 115%;">
                    </div>
                    <div class="" style="display: flex;
    justify-content: center;
    margin-bottom: 5%;">
                        <input type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox" style="color: #ba9264;">I agree to the terms and
                            conditions</label>
                    </div>
                    <div style="display: flex;
    justify-content: center;
    margin-bottom: 5%; color: bisque;">

                        <button type="submit" class="btn btn-primary" style="    background-color: #f3c693;
    border: 0px;
    padding: 3%;
    border-radius: 1rem;
    width: 45%;">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');
        function register() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';

            x.style.display = "none";
            y.style.display = "block";
        }
        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0px';

            x.style.display = "block";
            y.style.display = "none";
        }
    </script>
    <script>
        var modal = document.getElementById('login-form');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>



</body>

</html>