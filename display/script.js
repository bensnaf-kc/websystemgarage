$('document').ready(function() {
  var username_state = false;
  $('#username').on('blur', function() {
    var username = $('#username').val();
    if(username == ''){
      username_state = false;
      return;
    }
    $.ajax({
      url: 'register-wizard.php',
      type: 'POST',
      data: {
        'username_check': 1,
        'username': username
      },
      success: function(response){
        if(response == 'taken'){
          username_state = false;
          $('#username').parent().removeClass();
          $('#username').parent().addClass('form_error');
          $('#username').siblings("span").text("Sorry.. taken");
        }else if (response == "not_taken") {
          username_state = false;
          $('#username').parent().removeClass();
          $('#username').parent().addClass('form_success');
          $('#username').siblings("span").text("Username availble");
        }
      }
    })
  });

  $('reg_btn').on("click", function(){
    var username = $("#username").val();
    var password = $("#password").val();
    if(username_state == false){
      $("#error_msg").text("Fix the error")
    }else{
      $.ajax({
        url: 'register-wizard.php',
        type: 'post',
        data: {
          'save': 1,
          'username': username,
          'password': password
        },
        success: function(response){
          alert('user Saved');
          $('#username').val('');
          $('#password').val('');
        }
      })
    }
  });
});
