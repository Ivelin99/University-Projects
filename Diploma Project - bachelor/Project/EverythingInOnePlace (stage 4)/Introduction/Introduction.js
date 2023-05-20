// Function for translating the page 
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); 
  }
  
// Show the translate bar when clicking the globe button with JQuery
$(document).ready(function() {
    $("#translate-button").click(function() {
    $("#google_translate_element").toggle('slide',{direction: 'right'}, 700); // This is an animation for sliding from right to left with duration of 700 ms.
    	 });    
    });
	
// Activate and deactivate background color of button "Change language"
function BackgroundColor() {
  var element = document.body;
   element.classList.toggle("background_color");  
}

// Show background color of theme button
function ThemeBackgroundColor() {
  var element = document.body;
  element.classList.toggle("themebackgroundcolor");   
}

// Change the theme of light/dark mode
function changeTheme() {
  var element = document.body;
  element.classList.toggle("ChangeTheme");   
}

//horizontal scroll with scroll mouse button
const scrollContainer = document.querySelector("div");
scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
});

//highlight links when scrolling or clicking them
$(function() {
    var sections = {},
        _width  = $(window).width(),
        i        = 0;

    // Grab positions of our sections 
    $('.section').each(function(){
        sections[this.name] = $(this).offset().left;
    });

    $(document).scroll(function(){
        var $this = $(this),
            pos   = $this.scrollLeft();

        for(i in sections){
            if(sections[i] >= pos && sections[i] <= pos + _width){
                $('a').removeClass('active');
                $('#nav_' + i).addClass('active');
            }  
        }
    });
});

const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
const loginLink = document.querySelector("form .login-link a");

signupBtn.onclick = (()=>{
loginForm.style.marginLeft = "-50%";
loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
loginForm.style.marginLeft = "0%";
loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
signupBtn.click();
return false;
});
loginLink.onclick = (()=>{
loginBtn.click();
return false;
});

// функция за показване на паролите
const togglePassword = document.querySelector("#togglePassword");
const togglePassword2 = document.querySelector("#togglePassword2");
const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
const password = document.querySelector("#Password");
const repeated_password = document.querySelector("#Repeated_Password");
const confirm_password = document.querySelector("#Confirm_Password");

togglePassword.addEventListener("click", function () {
// toggle the type attribute
const type = password.getAttribute("type") == "password" ? "text" : "password";
password.setAttribute("type", type);

// toggle the icon
this.classList.toggle("bi-eye");
});

togglePassword2.addEventListener("click", function () {
// toggle the type attribute
const type = repeated_password.getAttribute("type") == "password" ? "text" : "password";
repeated_password.setAttribute("type", type);

// toggle the icon
this.classList.toggle("bi-eye");
});

toggleConfirmPassword.addEventListener("click", function () {
// toggle the type attribute
const type = confirm_password.getAttribute("type") == "password" ? "text" : "password";
confirm_password.setAttribute("type", type);

// toggle the icon
this.classList.toggle("bi-eye");
});