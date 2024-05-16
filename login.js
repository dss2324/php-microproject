const loginBtn = document.getElementById('loginBtn');
const loginForm=document.getElementById('loginForm');
loginBtn.addEventListener('click',()=>{
    loginForm.style.display='block';
});

const userloginForm=document.getElementById('userloginForm');
userloginForm.addEventListener('submit',(Event)=>{
    
    loginForm.style.display='none';
});