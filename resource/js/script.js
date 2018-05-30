$(document).ready(function() {

 /* For the sticky navigation */
    $('.js--section-features').waypoint(function(direction) {
        if (direction == "down") {
            $('nav').addClass('sticky');
        } else {
            $('nav').removeClass('sticky');
        }
    }, {
      offset: '60px;'
    });



// Get the modal
var modal_register = document.getElementById('click-register');
var modal_register_form = document.getElementById('register');
var modal_register_again = document.getElementById('click-register-again');

var check = function() {
  if (document.getElementById('mypass').value ==
    document.getElementById('confirmpass').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

var modal = document.getElementById('click-login');
var modal_form = document.getElementById('login');



// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    console.log(event.target);
    if (event.target == modal_register_again) {
        modal_form.style.display='none';  
        modal_register_form.style.display='block';
        return;
    }

    if (event.target == modal_register){   
        modal_register_form.style.display='block';       
    }else{
         if (!modal_register_form.contains(event.target)) {
            modal_register_form.style.display='none';
        }
    }

    if (event.target == modal) {       
        modal_form.style.display='block';
    }else{
        
        if (!modal_form.contains(event.target)) {
            modal_form.style.display='none';
        }
    }
}     
});

