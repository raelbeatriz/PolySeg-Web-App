<?php
session_start();

if ($_SESSION["status"] != true){

    header("Location: login-page.php");
}

?>

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
        .logo{
            padding-bottom: 20px;
            transform: scale(0.8);
            position: absolute;
            left: 1%;
        }
        .button {
        display: inline-block;
        padding: 15px 40px;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #C46200;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        margin: 3%;
        align-items: center;
        }
  
        .button:hover {
            background-color: #55290e;
            text-decoration: none;
        }
  
        .button:active {
        background-color: #492009;
        box-shadow: 0 5px rgb(214, 201, 201);
        transform: translateY(4px);
        text-decoration-color: #fff;
        }
        .choose-box h1{
           font-size: x-large;
        }
        .choose-box{
        padding: 70px;
        margin: 0;
    }
        @media(max-width: 700px){
            .logo{
                transform: scale(0.9);
            }
            .choose-box{
                padding: 0px;
                margin-bottom: 80px;
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
                    <!--<div class = "choose-box">
                        <h1>Would you like to <a href="monitoring-page1.php">MONITOR</a> or <a href="control-page.php">CONTROL</a>?</h1>
                    </div>-->
                    <div class = "choose-box">
                        <h1>Would you like to monitor or control?</h1>
                        <a href="monitoring-page1.php" class="button">MONITOR</a>
                        <a href="control-page.php" class="button">CONTROL</a>
                    </div>
                    <br><br><br>
                    <a href="logout.php" style="text-decoration: none;padding: 8px 16px;
                    background-color: #C46200;color: white; margin-left: 40%; font-size: 13px">LOG OUT &raquo;</a>

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


<!----------php--------------->
<?php
if(isset($_POST["logout"])){
    header("Location: logout.php");
}
?>