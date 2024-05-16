const signupBtn = document.getElementById('signUpBtn');
const signupForm=document.getElementById('signupForm');

const body=document.body;
//to see sign up form when sign up button is clicked
signupBtn.addEventListener('click',()=>{
        signupForm.style.display='block';
});







//to close sign up form when user clicks submit
const userForm=document.getElementById('userForm');
userForm.addEventListener('submit',(Event)=>{

    signupForm.style.display='none';
   
});

//code to make signup button non-clickable before clicking the checkbox 
document.addEventListener('DOMContentLoaded',function(){
    var agree_checkbox=document.getElementById('terms');
    var submit_button=document.getElementById('submit_button');
    submit_button.disabled=true;
    agree_checkbox.addEventListener('change',function(){
        if (agree_checkbox.checked)
        {
            submit_button.disabled=false;
        }
        else{
            submit_button.disabled=true;
        }
    });
});


