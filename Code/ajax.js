$(function() {
    $(".button").click(function() {
      // validate and process form here
    });
  });


 $(function() {
    $('.error').hide();
    $(".button").click(function() {
      // validate and process form here
      
      $('.error').hide();
  	  var name = $("input#name").val();
  		if (name == "") {
        $("label#name_error").show();
        $("input#name").focus();
        return false;
      }
  		var email = $("input#email").val();
  		if (email == "") {
        $("label#email_error").show();
        $("input#email").focus();
        return false;
      }
  		var phone = $("input#phone").val();
  		if (phone == "") {
        $("label#phone_error").show();
        $("input#phone").focus();
        return false;
      }
      
    });
  });



 var name = $("input#name").val();


  if (name == "") {
    $("label#name_error").show();
  }


  if (name == "") {
    $("label#name_error").show();
    $("input#name").focus();
    return false;
  }


var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "bin/process.php",
    data: dataString,
    success: function() {
      $('#contact_form').html("<div id='message'></div>");
      $('#message').html("<h2>Contact Form Submitted!</h2>")
      .append("<p>We will be in touch soon.</p>")
      .hide()
      .fadeIn(1500, function() {
        $('#message').append("<img id='checkmark' src='images/check.png' />");
      });
    }
  });
  return false;



var name = $("input#name").val();
We can use that 'name' value again, as well as the 'email' and the 'phone' values, to create our dataString:

  var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;


 $.ajax({
    type: "POST",
    url: "bin/process.php",
    data: dataString,
    success: function() {
      //display message back to user here
    }
  });
  return false;