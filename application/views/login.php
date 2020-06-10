<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCT | Verificacion</title>

    <link href="<?=asset_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=asset_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=asset_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=asset_url()?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"> SCT</h1>

            </div>
            <h3>Bienvenido al Sistema</h3>
            <p>Iniciar Sesión</p>
            <form class="m-t" role="form" action="<?=asset_url()?>index.php/login/validar" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="usuario" placeholder="nombre Usuario">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password"  name="contrasena" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Registrarse</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=asset_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=asset_url()?>assets/js/bootstrap.min.js"></script>

</body>

</html>