$(document).ready(function () {

  console.log("funcuina ajja ");

  $('#mostrar_contrasena').click(function () {
    if ($('#password').attr('type', 'password')){
      $('#password').attr('type', 'text');
    } 
    else{
      $('#password').attr('type', 'password');
    } 
  });

  $('#form').submit(function (e) {
    const postDate = {
      email: $('#email').val(),
      password: $('#password').val(),
    };

    if(postDate.email == '') {    
      const ui = new UI();
      ui.showMessage('Ingresa un correo valido', 'danger');
    }
    if(postDate.password == ''){
      const ui = new UI();
      ui.showMessage('Ingresa una contraseña valida', 'danger');
    }else {
      $.post('auth/login.php', postDate, function(response) {
        const ui = new UI();
        ui.showMessage(response, 'danger');
  
        $('#form').trigger('reset');
        window.location.href = "index.php";
      });
    }

    e.preventDefault();
  });


  $("#register").on('click', function(e) {
    const regData = {
      username: $("#username").val(),
      reg_password: $("#reg_password").val(),
      repeat_pass: $("#repeat_pass").val()
    };
    

    if(regData.username == '') {
      $("#username").css('border-color', 'red');
    }else {

      $.post('auth/sign_in.php', regData, function(resp) {

        window.location.href = "index.php";
      });
    }
    e.preventDefault();
  });



});


class UI {
  showMessage(message, cssClass) {
      const div = document.createElement('div');
      div.className = `alert alert-${cssClass}`;
      div.appendChild(document.createTextNode(message));

      //show dom
      const container = document.querySelector('.container');
      const app = document.querySelector('#App');
      container.insertBefore(div, app);
      setTimeout(function() {
          document.querySelector('.alert').remove();
      }, 6000);
  }
}

