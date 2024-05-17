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
             
        <!--login popup -->
        <div id="loginForm" style="display: none;">
                <form id="userForm" action="login-handle.php" method="post">
                    <div class="callout" data-closable>
                        <button class="close_login" aria-label="close alert" type="button" id="close_login_btn" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <label for="emailaddress">Enter Email</label>
                    <input type="email" name="emailaddress" id="emailaddress" placeholder="xxx@gmail.com" required>
                    <br>
                    <label for="password">Enter password</label>
                    <input type="password" name="password" id="password" placeholder="1234" required>
                    <br>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                    <br>
                    <button type="submit" class="btn">Submit</button>
                    <button type="reset" class="btn">Cancel</button>
                </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded',function(){
            const X_login_Btn = document.getElementById('close_login_btn');


            X_login_Btn.addEventListener('click', 
            function() {
                    loginForm.style.display='none';
                });

            });
        </script>
        <script src="login.js"></script>
        
    </body>
</html>