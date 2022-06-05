<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css";> 

    <style> 
        .wrap{
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>
<body class="text-center">
    <div class="wrap">
        <h1> Login </h1>

        <?php if(isset($_GET['created'])) : ?>
            <div class="alert alert-warning"> This User email Already exists . </div>  
        <?php endif ?>

        <?php if(isset($_GET['registered'])) : ?>
            <div class="alert alert-success"> Account created. Please login. </div>
        <?php endif ?>

        <?php if (isset($_GET['suspended'])) : ?>
            <div class="alert alert-danger"> Your account is suspended.</div>
        <?php endif ?>
        
        <?php if( isset($_GET['incorrect']) ) : ?>
            <div class="alert alert-warning"> Incorrect Email or Password </div>
        <?php endif ?>

        <form action="actions/login.php" method="POST">
            <input type="email" name="email" class="form-control mt-3" 
            placeholder="Email" required>

            <input type="password" name="password" class="form-control mt-3" placeholder="Password" required>

            <button class="w-100 btn btn-md btn-primary mt-3"> Login </button>
        </form>

        <br>

        <a href="register.php">Register</a>
        
    </div>

</body>
</html>