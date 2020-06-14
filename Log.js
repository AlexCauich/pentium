$(document).ready(function () {

  console.log("funcioa");

  $('#register-form').submit(function (e) {
    const postDate = {
      email: $('#email').val(),
      password: $('#password').val(),
    };

    if(postDate.email == '') {
        const ui = new UI();
        ui.showMessage('Porfavor ingresa un correo', 'danger');
    }

    if(postDate.password == ''){
      const ui = new UI();
      ui.showMessage('Porfavor ingresa una contraseña', 'danger');
    }

    $.post('auth/login.php', postDate, function(response) {
      console.log(response);
      window.location.href = "index.php";
    });

    e.preventDefault();
  });

});

class UI {
  showMessage(message, cssClass) {
      const div = document.createElement('div');
      div.className = `alert alert-${cssClass}`;
      div.appendChild(document.createTextNode(message));

      //show dom
      const container = document.querySelector('.cont');
      const app = document.querySelector('#App');
      container.insertBefore(div, app);
      setTimeout(function() {
          document.querySelector('.alert').remove();
      }, 6000);
  }
}
