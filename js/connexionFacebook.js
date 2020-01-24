<<<<<<< Updated upstream
window.fbAsyncInit = function() {

    FB.init({
        appId      : '572612350206643',
        cookie     : true,
        xfbml      : true,
        version    : 'v5.0'
    });
    FB.getLoginStatus(function(response){
        statusChangeCallback(response), true);
    FB.AppEvents.logPageView();


};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


// Renvoie le statut de connexion
function statusChangeCallback(response) {
    console.log('statusChangeCallback :');
    console.log(response);

    // Connecté
    if (response.status === 'connected') {

        console.log('Connecté !');
        FB.api('/me', {fields: 'id,name,first_name,last_name,email,picture'}, function (response) {
            console.log('Successful login for: ' + response.name);

            console.log("id :");
            console.log(response.id);
            console.log("Prénom :");
            console.log(response.first_name);
            console.log("Nom :");
            console.log(response.last_name);
            console.log("Email :");
            console.log(response.email);
            console.log("Photo :");
            console.log(response.picture.data.url);
            console.log("reponse :");
            console.log(response);

            var idFB = response.id,
                emailFB = response.email,
                prenomFB = response.first_name,
                nomFB = response.last_name;

            // Envoie les données sur la page InscriptionFB.php
            jQuery.ajax({
                url: 'modele/model_InscriptionFB.php',
                type: 'POST',
                data: 'id='+idFB+'&email='+emailFB+'&prenom='+prenomFB+'&nom='+nomFB,
                success: function(data){
                  console.log(data);
                  var words = data.split(':');
                  let type = words[2].substr(1, words[2].length-3);

                  alert("Connecté (" + type + ")");

                  //<?php $_SESSION["type"] ="Pilote" ?>

                  if (type == "Pilote"){
                     window.location = "index.php?page=user";
                   }
                   else if(type == "Administrateur"){
                     window.location.href = "index.php?page=admin_user";
                   }
                   else {
                     window.location.href = "index.php?page=gestionnaire";
                   }
                },
                error: function(){
                    alert('Erreur');
                }
            });
=======
$('#facebook-button').on('click', function() {
    alert("test");
    // Initialize with your OAuth.io app public key
    OAuth.initialize('stb46BJdyXHzXXqK-lODJv3ksO4');
    // Use popup for oauth
    OAuth.popup('facebook').then(facebook => {
      console.log('facebook:',facebook);
      // Prompts 'welcome' message with User's email on successful login
      // #me() is a convenient method to retrieve user data without requiring you
      // to know which OAuth provider url to call
      facebook.me().then(data => {
        console.log('data : ', data);
        console.log("id : " + data.id);
        console.log("Nom : " + data.lastname);
        console.log("Prénom : " + data.firstname);
        console.log("Email : " + data.email);
        console.log("Photo : " + data.avatar);
        alert("Connecté");
      
        var idFB = data.id,
        emailFB = data.email,
        nomFB = data.lastname;
        prenomFB = data.firstname;

        // Envoie les données sur la page InscriptionFB.php
        jQuery.ajax({
            url: 'modele/InscriptionFB.php',
            type: 'POST',
            data: 'id='+idFB+'&email='+emailFB+'&prenom='+prenomFB+'&nom='+nomFB,
            success: function(data){
            console.log(data);
            var words = data.split(':');
            let type = words[2].substr(1, words[2].length-3);

            alert("Connecté (" + type + ")");

            //<?php $_SESSION["type"] ="Pilote" ?>

            if (type == "Pilote"){
                window.location = "index.php?page=user";
            }
            // else if(type == "Administrateur"){
            //   window.location.href = "index.php?page=admin_user";
            // }
            // else {
            //   window.location.href = "index.php?page=gestionnaire";
            // }
            },
            error: function(){
                alert('Erreur');
            }
>>>>>>> Stashed changes
        });
      });
      // Retrieves user data from OAuth provider by using #get() and
      // OAuth provider url
      facebook.get('/v2.5/me?fields=name,first_name,last_name,email,gender,location,locale,work,languages,birthday,relationship_status,hometown,picture').then(data => {
        console.log('self data:', data);
      })
    });
  })
