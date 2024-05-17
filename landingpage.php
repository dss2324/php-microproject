<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>TODO APP</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="landingpage.css">
    </head>
    <body>
        <div class="message-container">
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </body>
</html>