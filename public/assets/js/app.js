/* Template Name: Travosy - Tour & Travels Agency Tailwind CSS Template
   Author: Shreethemes
   Email: support@shreethemes.in
   Website: https://shreethemes.in
   Version: 1.5.0
   Created: February 2024
   File Description: Main JS file of the template
*/


/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Loader               *
 *     02.  Toggle Menus         *
 *     03.  Active Menu          *
 *     04.  Clickable Menu       *
 *     05.  Menu Sticky          *
 *     06.  Back to top          *
 *     07.  Active Sidebar Menu  *
 *     08.  Feather icon         *
 *     09.  Small Menu           *
 *     10.  Contact JS           *
 *     11.  Light & Dark Theme   *
 *     12.  LTR & RTL Mode       *
 ================================*/

window.addEventListener('load', fn, false)

//  window.onload = function loader() {
function fn() {
    // Preloader
    if (document.getElementById('preloader')) {
        setTimeout(() => {
            document.getElementById('preloader').style.visibility = 'hidden';
            document.getElementById('preloader').style.opacity = '0';
        }, 350);
    }
    // Menus
    activateMenu();
}

//Menu
/*********************/
/* Toggle Menu */
/*********************/
function toggleMenu() {
    document.getElementById('isToggle').classList.toggle('open');
    var isOpen = document.getElementById('navigation')
    if (isOpen.style.display === "block") {
        isOpen.style.display = "none";
    } else {
        isOpen.style.display = "block";
    }
};
/*********************/
/*    Menu Active    */
/*********************/
function getClosest(elem, selector) {

    // Element.matches() polyfill
    if (!Element.prototype.matches) {
        Element.prototype.matches =
            Element.prototype.matchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector ||
            Element.prototype.oMatchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            function (s) {
                var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                    i = matches.length;
                while (--i >= 0 && matches.item(i) !== this) {}
                return i > -1;
            };
    }

    // Get the closest matching element
    for (; elem && elem !== document; elem = elem.parentNode) {
        if (elem.matches(selector)) return elem;
    }
    return null;

};

function activateMenu() {
    var menuItems = document.getElementsByClassName("sub-menu-item");
    if (menuItems) {

        var matchingMenuItem = null;
        for (var idx = 0; idx < menuItems.length; idx++) {
            if (menuItems[idx].href === window.location.href) {
                matchingMenuItem = menuItems[idx];
            }
        }

        if (matchingMenuItem) {
            matchingMenuItem.classList.add('active');
         
         
            var immediateParent = getClosest(matchingMenuItem, 'li');
      
            if (immediateParent) {
                immediateParent.classList.add('active');
            }
            
            var parent = getClosest(immediateParent, '.child-menu-item');
            if(parent){
                parent.classList.add('active');
            }

            var parent = getClosest(parent || immediateParent , '.parent-menu-item');
        
            if (parent) {
                parent.classList.add('active');

                var parentMenuitem = parent.querySelector('.menu-item');
                if (parentMenuitem) {
                    parentMenuitem.classList.add('active');
                }

                var parentOfParent = getClosest(parent, '.parent-parent-menu-item');
                if (parentOfParent) {
                    parentOfParent.classList.add('active');
                }
            } else {
                var parentOfParent = getClosest(matchingMenuItem, '.parent-parent-menu-item');
                if (parentOfParent) {
                    parentOfParent.classList.add('active');
                }
            }
        }
    }
}
/*********************/
/*  Clickable manu   */
/*********************/
if (document.getElementById("navigation")) {
    var elements = document.getElementById("navigation").getElementsByTagName("a");
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].onclick = function (elem) {
            if (elem.target.getAttribute("href") === "javascript:void(0)") {
                var submenu = elem.target.nextElementSibling.nextElementSibling;
                submenu.classList.toggle('open');
            }
        }
    }
}
/*********************/
/*   Menu Sticky     */
/*********************/
function windowScroll() {
    const navbar = document.getElementById("topnav");
    if (navbar != null) {
        if (
            document.body.scrollTop >= 50 ||
            document.documentElement.scrollTop >= 50
        ) {
            navbar.classList.add("nav-sticky");
        } else {
            navbar.classList.remove("nav-sticky");
        }
    }
}

window.addEventListener('scroll', (ev) => {
    ev.preventDefault();
    windowScroll();
})
/*********************/
/*    Back To TOp    */
/*********************/

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var mybutton = document.getElementById("back-to-top");
    if(mybutton!=null){
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            mybutton.classList.add("flex");
            mybutton.classList.remove("hidden");
        } else {
            mybutton.classList.add("hidden");
            mybutton.classList.remove("flex");
        }
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/*********************/
/*  Active Sidebar   */
/*********************/
(function () {
    var current = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);;
    if (current === "") return;
    var menuItems = document.querySelectorAll('.sidebar-nav a');
    for (var i = 0, len = menuItems.length; i < len; i++) {
        if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
            menuItems[i].parentElement.className += " active";
        }
    }
})();

/*********************/
/*   Feather Icons   */
/*********************/
feather.replace();

/*********************/
/*     Small Menu    */
/*********************/
try {
    var spy = new Gumshoe('#navmenu-nav a');
} catch (err) {

}


/*********************/
/*     Contact Form  */
/*********************/

try {
    function validateForm() {
        var name = document.forms["myForm"]["name"].value;
        var email = document.forms["myForm"]["email"].value;
        var subject = document.forms["myForm"]["subject"].value;
        var comments = document.forms["myForm"]["comments"].value;
        document.getElementById("error-msg").style.opacity = 0;
        document.getElementById('error-msg').innerHTML = "";
        if (name == "" || name == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Name*</div>";
            fadeIn();
            return false;
        }
        if (email == "" || email == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Email*</div>";
            fadeIn();
            return false;
        }
        if (subject == "" || subject == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Subject*</div>";
            fadeIn();
            return false;
        }
        if (comments == "" || comments == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Comments*</div>";
            fadeIn();
            return false;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("simple-msg").innerHTML = this.responseText;
                document.forms["myForm"]["name"].value = "";
                document.forms["myForm"]["email"].value = "";
                document.forms["myForm"]["subject"].value = "";
                document.forms["myForm"]["comments"].value = "";
            }
        };
        xhttp.open("POST", "php/contact.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name=" + name + "&email=" + email + "&subject=" + subject + "&comments=" + comments);
        return false;
    }

    function fadeIn() {
        var fade = document.getElementById("error-msg");
        var opacity = 0;
        var intervalID = setInterval(function () {
            if (opacity < 1) {
                opacity = opacity + 0.5
                fade.style.opacity = opacity;
            } else {
                clearInterval(intervalID);
            }
        }, 200);
    }
} catch (error) {
    
}

/*********************/
/* Dark & Light Mode */
/*********************/
// try {
//     function changeTheme(e){
//         e.preventDefault()
//         const htmlTag = document.getElementsByTagName("html")[0]
        
//         if (htmlTag.className.includes("dark")) {
//             htmlTag.className = 'light'
//         } else {
//             htmlTag.className = 'dark'
//         }
//     }

//     const switcher = document.getElementById("theme-mode")
//     switcher?.addEventListener("click" ,changeTheme )
    
//     const chk = document.getElementById('chk');

//     chk.addEventListener('change',changeTheme);
// } catch (err) {
    
// }


document.addEventListener('DOMContentLoaded', function () {
    try {
        function changeTheme(e) {
            const htmlTag = document.documentElement; // lebih bagus pakai document.documentElement
            const isDark = htmlTag.classList.contains('dark');

            if (isDark) {
                htmlTag.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                htmlTag.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        const switcher = document.getElementById("theme-mode");
        switcher?.addEventListener("click", changeTheme);

        const chk = document.getElementById('chk');
        chk?.addEventListener('change', changeTheme);

        // Saat halaman load pertama, cek localStorage
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            if (chk) chk.checked = true;
        } else {
            document.documentElement.classList.remove('dark');
            if (chk) chk.checked = false;
        }

    } catch (err) {
        console.error('Error toggle dark mode:', err);
    }
});



/*********************/
/* LTR & RTL Mode */
/*********************/
try{
    const htmlTag = document.getElementsByTagName("html")[0]
    function changeLayout(e){
        e.preventDefault()
        const switcherRtl = document.getElementById("switchRtl")
        if(switcherRtl.innerText === "LTR"){
            htmlTag.dir = "ltr"
        }
        else{
            htmlTag.dir = "rtl"
        }
        
    }
    const switcherRtl = document.getElementById("switchRtl")
    switcherRtl?.addEventListener("click" ,changeLayout )
}
catch(err){}





(function ($) {
    'use strict';
  
    // sidebar submenu collapsible js
    $(".sidebar-menu .dropdown").on("click", function(){
      var item = $(this);
      item.siblings(".dropdown").children(".sidebar-submenu").slideUp();
  
      item.siblings(".dropdown").removeClass("dropdown-open");
  
      item.siblings(".dropdown").removeClass("open");
  
      item.children(".sidebar-submenu").slideToggle();
  
      item.toggleClass("dropdown-open");
    });
  
    $(".sidebar-toggle").on("click", function(){
      $(this).toggleClass("active");
      $(".sidebar").toggleClass("active");
      $(".dashboard-main").toggleClass("active");
    });
  
    $(".sidebar-mobile-toggle").on("click", function(){
      $(".sidebar").addClass("sidebar-open");
      $("body").addClass("overlay-active");
    });
  
    $(".sidebar-close-btn").on("click", function(){
      $(".sidebar").removeClass("sidebar-open");
      $("body").removeClass("overlay-active");
    });
  
    //to keep the current page active
    $(function () {
      for (
        var nk = window.location,
          o = $("ul#sidebar-menu a")
            .filter(function () {
              return this.href == nk;
            })
            .addClass("active-page") // anchor
            .parent()
            .addClass("active-page");
        ;
  
      ) {
        // li
        if (!o.is("li")) break;
        o = o.parent().addClass("show").parent().addClass("open");
      }
    });
  
  /**
  * Utility function to calculate the current theme setting based on localStorage.
  */
  function calculateSettingAsThemeString({ localStorageTheme }) {
    if (localStorageTheme !== null) {
      return localStorageTheme;
    }
    return "light"; // default to light theme if nothing is stored
  }
  
  /**
  * Utility function to update the button text and aria-label.
  */
  function updateButton({ buttonEl, isDark }) {
    const newCta = isDark ? "dark" : "light";
    buttonEl.setAttribute("aria-label", newCta);
    buttonEl.innerText = newCta;
  }
  
  /**
  * Utility function to update the theme setting on the html tag.
  */
  function updateThemeOnHtmlEl({ theme }) {
    document.querySelector("html").setAttribute("data-theme", theme);
  }
  
  /**
  * 1. Grab what we need from the DOM and system settings on page load.
  */
  const button = document.querySelector("[data-theme-toggle]");
  const localStorageTheme = localStorage.getItem("theme");
  
  /**
  * 2. Work out the current site settings.
  */
  let currentThemeSetting = calculateSettingAsThemeString({ localStorageTheme });
  
  /**
  * 3. If the button exists, update the theme setting and button text according to current settings.
  */
  if (button) {
    updateButton({ buttonEl: button, isDark: currentThemeSetting === "dark" });
    updateThemeOnHtmlEl({ theme: currentThemeSetting });
  
    /**
    * 4. Add an event listener to toggle the theme.
    */
    button.addEventListener("click", (event) => {
      const newTheme = currentThemeSetting === "dark" ? "light" : "dark";
  
      localStorage.setItem("theme", newTheme);
      updateButton({ buttonEl: button, isDark: newTheme === "dark" });
      updateThemeOnHtmlEl({ theme: newTheme });
  
      currentThemeSetting = newTheme;
    });
  } else {
    // If no button is found, just apply the current theme to the page
    updateThemeOnHtmlEl({ theme: currentThemeSetting });
  }
  
  
  // =========================== Table Header Checkbox checked all js Start ================================
  $('#selectAll').on('change', function () {
    $('.form-check .form-check-input').prop('checked', $(this).prop('checked')); 
  }); 
  
    // Remove Table Tr when click on remove btn start
    $('.remove-btn').on('click', function () {
      $(this).closest('tr').remove(); 
  
      // Check if the table has no rows left
      if ($('.table tbody tr').length === 0) {
        $('.table').addClass('bg-danger');
  
        // Show notification
        $('.no-items-found').show();
      }
    });
    // Remove Table Tr when click on remove btn end
  })(jQuery);
