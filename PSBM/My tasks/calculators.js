window.onscroll = function() {
	Scroll()
};

var navbar = document.getElementById("myTopnav");
var sticky = navbar.offsetTop;


// при скролване навигационното меню се "залепва" за екрана и постоянно седи там 
function Scroll() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

// промяна на навигационното меню при гъвкав дизайн
function Responsive() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}