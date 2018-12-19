<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
     <p aling="left"><img src="https://i.imgur.com/4Obshtu.png" width="120" height="120"/></img> <strong>SRD</strong></p>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="{{ url('password/reset/'.$token) }}"> Restablecer contraseña </a><br><br><br>
         <strong>¿No funcionó? Copia el siguiente enlace en tu navegador web : </strong><br> 
         <p>{{ url('password/reset/'.$token)}}</p>
       </p>
     </body>
</html>