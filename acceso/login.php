<!DOCTYPE html>
<html>
<head>
  <title>Intranet Diaz Morones</title>
  <meta charset="utf-8">
   <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="355653812398-7ti3u20mkn5uh6sofeudut60ig0gvsj3.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
 
    </script>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#txtUsuario").keyup(function(e){
          checkKey(e); 
        });

        $("#txtClave").keyup(function(e){
          checkKey(e); 
        });
      
      });
      function login(){
        $usuario = $("#txtUsuario").val();
        $clave = $("#txtClave").val();
        
        $.post("server.php",{"usuario":$usuario, "clave":$clave},function(resp){
          if (resp == 1) { window.location="menu.php"; }
          console.log(resp);
        });
      }
      function checkKey(e){
        if (e.which == 13) {
            login();
          }  

      }

    </script>

    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
      .frmLogin{
        position: relative;
        width: 250px;
        height: 40px;
        margin: auto;
        font-weight: bold;
      }
      input[type='text'],input[type='password']{
        width: 100%;
        height: 25px;
      }
      #bodybg{
        width: 100%;
        height: 100%;
      }
      #btnLogin{
        width: 100%;
        height: 36px;
        background-color: #009bdc;
        margin-bottom: 10px;
      }
    </style>

  
</head>
<body>
<div id="bodybg">
  <div style="width: 180px; margin:auto;"><img style="width: 180px;" src="http://www.diazmorones.com/imagenes/logo nuevo vetical.png" id="logo"></div>
  <div class="frmLogin">Usuario:<br><input type="text" name="txtUsuario" id="txtUsuario"></div><br>
  <div class="frmLogin">Contraseña:<br><input type="password" name="txtClave" id="txtClave"></div><br>
   <div class="frmLogin"><input type="submit" value="Acceso" name="btnAceso" id="btnLogin" onclick="login()"><div id="my-signin2" class="g-signin2" data-onsuccess="onSignIn" style="width: 250px;"></div></div>
</div>
  
</body>
</html>