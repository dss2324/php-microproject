<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TODO APP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="landingpage.css">
    </head>
    <body>
        <nav class="navbar" id="navigation-bar">
            <a href="#" class="logo">Todo App</a>
            <div class="nav-links">
           <button id="signUpBtn"class="btn">Sign Up</button> 
            <button id="loginBtn"class="btn">Login</button>
            </div>
        </nav>
        <div class="container">
            <h1>Welcome to Todo App</h1>
            <p>Manage your tasks efficiently</p>
            
        </div>
        
        <?php include 'sign-up-popup.php';?>
        <?php include 'login.php';?>
    </body>
</html>