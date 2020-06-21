<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://scontent.fmid2-1.fna.fbcdn.net/v/t1.0-9/90115929_136732171196292_3441089044065288192_n.png?_nc_cat=100&_nc_sid=85a577&_nc_eui2=AeHhuXmDw2rKIynPrEFqIK0-4HBH6HtMkJLgcEfoe0yQkrS1RNbe8z_HwnS6sHFqVmlVdBOnBpypidflaK1jy1QF&_nc_oc=AQmO2LFNttOYnyxFi5uvmWpP9UulESPNXJTVTTWHbj3q-no4NbXKA15075A-fUGKik74f7rV_fzZsgVi304n3uL_&_nc_ht=scontent.fmid2-1.fna&oh=7da262354344cae9e501c261846bb394&oe=5EFA8D95">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/log.css">
    <title>Document</title>
</head>
<body>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
    </div>
    <div id="App" class="main">
        <div class="log col-md-6 col-sm-12">
            <div class="cont"></div>
            <div class="login-form">
                <form id="register-form">
                    <div class="form-group">
                        <label for="">Usuario o correo electronico</label>
                        <input type="text" id="email" class="form-control" placeholder="example@example.com">
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" id="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" id="login" class="btn btn-primary">Iniciar sesion</button>
                    <a  href="register.html" type="submit" class="btn btn-success">Registrate!</a>
                </form>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="Log.js"></script>

</body>
</html>






<!--<div class="main">
    <div id="App">
        <div class="col-md-6 col-sm-12">

            <div class="login-form">
                <form id="register-form" class="card">
                    <div class="card-header text-center"><strong>Aluminios Soberanis</strong><h3>Iniciar sesion</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Correo electronico</label>
                            <input type="email" id="email" class="form-control" placeholder="Ingresar el texto">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" id="password" class="form-control" placeholder="Ingresar el texto">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="login" class="btn btn-outline-primary">Iniciar sesion</button>
                        <a  href="register.html" type="submit" class="btn btn-outline-success">Registrate!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->