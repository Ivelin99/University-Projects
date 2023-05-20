// Showing and closing the navigation menu

function OpenCloseNavigation() {
	const sideBar = document.getElementById("SideNavigation").style.width;
    var element = document.body;
	
	if (!sideBar || sideBar == "0px") {
	  element.classList.toggle("change");
      document.getElementById("SideNavigation").style.width = "210px";
	  document.getElementById("genres").style.marginLeft = "12px";
	  document.getElementById("genres").style.visibility = "visible";
	  document.getElementById("category").style.marginLeft = "200px";
	  document.getElementById("category-width").style.width = "calc(100% + 180px)";
	  document.getElementById("content-width").style.width = "calc(100% + 180px)";
	  document.getElementById("footer-width").style.width = "calc(100% + 180px)";
    }   
    else if (sideBar !== "0px") {
	  element.classList.toggle("change");
      document.getElementById("SideNavigation").style.width = "0";
	  document.getElementById("genres").style.marginLeft = "0";
	  document.getElementById("genres").style.visibility = "hidden";
      document.getElementById("category").style.marginLeft = "0";
	  document.getElementById("category-width").style.width = "initial";
	  document.getElementById("content-width").style.width = "initial";
	  document.getElementById("footer-width").style.width = "initial";
    }
}

/*
// Sliding the multimedia products

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("multimedia-products");
  let pages = document.getElementsByClassName("numbers");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < pages.length; i++) {
    pages[i].className = pages[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  pages[slideIndex-1].className += " active";
}
*/

// Change the theme of light/dark mode
function changeTheme() {
  var element = document.body;
  element.classList.toggle("ChangeTheme");
}

// Activate and deactivate background color for buttons "Change language", "fa-search" and "theme" from class "Categories"
function ThemeBackgroundColor() {
  var element = document.body;
  element.classList.toggle("themebackgroundcolor");   
}
 
function BackgroundColor1() {
  var element = document.body;
  element.classList.toggle("backgroundcolor"); 
}

function BackgroundColor2() {
  var element = document.body;
   element.classList.toggle("background_color");  
}

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

// Show the search bar when clicking the magnifying glass button with JQuery
$(document).ready(function() {
    $("#search-button").click(function() {
	$(".search-bar").toggle('slide',{direction: 'right'}, 700); // This is an animation for sliding from right to left with duration of 700 ms.
	$("input[type = 'text']").focus();
    	 });    
    });

// Show the autocomplete search results from the search bar when writing letters on the input textbox with Ajax
$(document).ready(function() {

    load_data(1);
  
    function load_data(page, query = '')
    {
      $.ajax({
        url:"Additional Files/Pagination.php",
        method:"POST",
        data:{
		     page:page, query:query
			},
        success:function(data)
        {
		  console.log("%c Testing", "color: red; font-size: 20px; ");
          $('#dynamic_content').html(data);
          prepareDynamicContent();
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_data').val();
      load_data(page, query);
    });

    $('#search_data').keyup(function(){
      var query = $('#search_data').val();
      load_data(1, query);
    });

  });
	
// program the content of the modal
function action(evt, actionName) {
  var i, modalcontent, menulinks;
  
  modalcontent = document.getElementsByClassName("modalcontent");
  for (i = 0; i < modalcontent.length; i++) {
    modalcontent[i].style.display = "none";
  }
  menulinks = document.getElementsByClassName("menulinks");
  for (i = 0; i < menulinks.length; i++) {
    menulinks[i].className = menulinks[i].className.replace(" active", "");
  }
  document.getElementById(actionName).style.display = "block";
  evt.currentTarget.className += " active";
}


function prepareDynamicContent() {
    // Get the modal of every button
    var modals = document.getElementsByClassName("modal");

    // Get a different button that opens different modal
    var btns = document.getElementsByClassName("openBtn");

    // Get the <span> element that closes the modal
    var spans = document.getElementsByClassName("close");

    // When a user clicks the button, opens the modal and there will be already clicked button by default (Get the element with id="defaultOpen" and click on it)
    for (let i = 0; i < btns.length; i++) {
    	btns[i].onclick = function() {
    		modals[i].style.display = "block";
    	}
    }

    // When the user clicks on <span> (x), closes the modal
    for (let i = 0; i < spans.length; i++) {
    	spans[i].onclick = function() {
    		modals[i].style.display = "none";
    	}
    }
}