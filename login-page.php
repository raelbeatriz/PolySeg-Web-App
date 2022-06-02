<?php ob_start(); ?>
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>POLYSEG</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-image: url(images/login-background.png)
        }
        .row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px gray;
        }
        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: rgb(94, 14, 60);
            color:white;
            border-radius: 4px;
            font-weight: bold;
        }
        .btn1:hover{
            background: white;
            border: 1px solid;
            color: black;
        }
        .logo{
            padding-bottom: 20px;
            transform: scale(0.8);
            position: absolute;
            left: 1%;
        }
        @media(max-width: 700px){
            .logo{
                transform: scale(0.9);
            }
        }

    </style>


  </head>
  <body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="images/Monitor-control9.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <img src="images/logos.png"  class="logo img-fluid"><br><br><br><br><br>
                    <!--<h1 class="font-weight-bold py-3">Logo</h1>-->
                    <h4>Sign in to your account</h4>
                    <form name="myForm" method="post" class="login-email">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" name="Uname" placeholder="Email address"  required class="form-control my-2 p-4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="Pass" placeholder="Password" required class="form-control my-2 p-4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button name="log" class="btn1 mt-3 mb-5" id="logButton" value="Submit" onclick="myFunction()">Login</button>
                            </div>
                        </div>
                        <p>Forgot password?</p>
                        <p>Don't have an account? <a href="contact.html" style="color: rgb(158, 89, 33);">Contact us</a></p>
                    </form>

                </div>
            </div>

            </div>

        </div>
    </section>

    <!-- Optional JavaScript -->
    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<!------------------------php code ------------------------>
<?php

if(isset($_POST["log"])){

    $email_id = $_POST["Uname"];
    $password = $_POST["Pass"];

    $_SESSION["status"]=false;

    //condition for checking valid input from user

    if ( $email_id == "student@gmail.com" && $password == "12345" ){

        $_SESSION["email_id"] = $email_id;
        $_SESSION["status"]= true;
        header("Location: login-choose.php");
    }
    else{
        echo "invalid credentials";
    }
    
}

?>
<?php ob_flush(); ?>