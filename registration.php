<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <style>
            .row{
                transform: translateY(100px);
            }

            body{
                /* background-image: url("public/login-background.jpg"); */
                background-color: #f3f3f3e0;
                background-repeat: no-repeat, repeat;
                background-size: cover;
            }
        </style>
</head>

<body>

<?php
    include 'lib/session.php';
    session::chksession();
    
    include "lib/database.php";
    $db = new database();
    


?>

<script type="text/javascript">
      

      function reg_log(){
        setTimeout(function(){
          window.location="index.php";
        },2000);
      }


</script>

<?php
    $text ="";

    if (isset($_POST["submit"])) 
    { 
        $name  = $db->validate($_POST['name']);
        $email   = $db->validate($_POST['email']);
        $password = $db->validate($_POST['password']);
        


        if (empty($name)||empty($email)||empty($password))
        {
            $text = "<p style='background-color: #dfb54b;width:200px' class='p-2 px-3 text-white d-blog w-100'> empty not allow </p>";
        }
        else{
        
            $x= "INSERT INTO `user`(`name`, `email`, `pass`) VALUES ('$name','$email','$password')";
            $x = $db->insert($x);

            if ($x){
                $text = "<p style='background-color: green;width:200px' class='p-2 px-3 text-white d-blog w-100'> Registration Successful </p>";
                echo "<script> reg_log(); </script>";
            }else{
                $text = "<p style='background-color: red;width:200px' class='p-2 px-3 text-white d-blog w-100'> Some Went Wrong </p>";
            }
        
            }


    }



?>


    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-sm-6 border p-5" style="box-shadow: 0px 1px 20px 0px #c5c1c4bd;">
            <div> <?php echo $text; ?></div>
                <form method="post">
                    <h3>Registration Form</h3>
                    <div class="form-group py-3">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter email">
                        
                    </div>
                    <div class="form-group py-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-grouppy-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check py-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="login.php" class="pt-2" class="text-start" >Login</a>
                        <button type="submit" name="submit" class="btn btn-primary text-right">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>