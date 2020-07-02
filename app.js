$(document).ready(function () {

  console.log("jaja");

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
        console.log(response);
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

