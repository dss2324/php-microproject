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
             
        <!--sign up popup-->
        <div id="signupForm" style="display: none;">
                <form action="signup-handle.php" id="userForm"  method="POST">
                    <!--<input type="button" value="X" onclick="open(location,'_self').close()" class="close">-->
                    <div class="callout" data-closable>
                    <button class="close" aria-label="close alert" type="button" id="close" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <label for="username">Enter name</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <br>
                    <label for="emailaddress">Enter Email</label>
                    <input type="email" name="emailaddress" id="emailaddress" placeholder="xxx@gmail.com" required>
                    <br>
                    <label for="password">Enter password</label>
                    <input type="password" name="password" id="password" placeholder="1234" required>
                    <br>
                    <!-- <label for="emp_photo">Upload your Photo(optional)</label>
                    <input type="image" name="emp_photo" id="emp_photo" src=" "> -->
                    <!-- <br> -->
                    <label for="designation">Your Designation</label>
                    <input type="text"  name="designation" id="designation" required>
                    <br>
                    <label for="dept">Your Department </label>
                    <input type="text" name="dept" id="dept" required>
                    <br>
                    <label for="jd">Your joining Date</label>
                    <input type="date" name="jd" id="jd" required>
                    <br>
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Remember Me<br>By creating this account you are agree to our privacy policy and cookie policy</label>
                    <br>
                    <button type="submit" class="btn" disabled id='submit_button'>Submit</button>
                    <button type="reset" class="btn">Cancel</button>
                </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded',function(){
            const XBtn = document.getElementById('close');


            XBtn.addEventListener('click', 
            function() {
                    signupForm.style.display='none';
                });

            });
        </script>
        <script src="signup-pop-up.js"></script>
        
    </body>
</html>