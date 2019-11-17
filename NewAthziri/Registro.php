<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="Inicio/fonts/tipografias.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="page-container">
		      <img class="logo" src="../NewAthziri/Imagenes/Logo.png" style="width:30%; height:30%;">
            <h1> Registro </h1>
            <form action="datos.php" method="post">
                <input type="text" name="U" class="username" placeholder="Nombre de Usuario" required/>
                <input type="text" name="N" class="email" placeholder="Nombre Completo" required/>
                <input type="password" name="P" class="password" placeholder="Contraseña" required/>
                <button type="submit"> Registrar </button>
            </form>
            <a href="index.php" style="color:#FFFFFF;">
       			 <button type="submit">Cancelar</button>
       		 </a>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>
