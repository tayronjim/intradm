<html lang="en">
  <head>
  <!-- ID de Cliente: 355653812398-7ti3u20mkn5uh6sofeudut60ig0gvsj3  -->
  <!-- Key Secreto: umJRyPZvFJMa6y6ezCsJjwKv  -->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="355653812398-7ti3u20mkn5uh6sofeudut60ig0gvsj3.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
     
      });
    </script>
  </head>
  <body>
   
    <div id="my-signin2" class="g-signin2" ></div><br>
   
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
     

     function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }


     function onFailure(error) {
      console.log(error);
    }


    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 540,
        'height': 50,
        'longtitle': false,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }

    </script>
    <a href="#" onclick="signOut();">Sign out</a>
    <script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
        console.log('User signed out.');
        });
      }
    </script>


    
  </body>
</html>