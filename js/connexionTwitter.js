$('#twitter-button').on('click', function() {
    // Initialize with your OAuth.io app public key
    OAuth.initialize('stb46BJdyXHzXXqK-lODJv3ksO4');
    // Use popup for OAuth
    OAuth.popup('twitter').then(twitter => {
      console.log('twitter:', twitter);
      // Prompts 'welcome' message with User's email on successful login
      // #me() is a convenient method to retrieve user data without requiring you
      // to know which OAuth provider url to call
      twitter.me().then(data => {
        console.log('data : ', data);
        console.log("id : " + data.id);
        console.log("Nom : " + data.name);
        console.log("Email : " + data.email);
        console.log("Photo : " + data.avatar);

        var idTW = data.id,
            emailTW = data.email,
            nomTW = data.name;

        // Envoie les données sur la page InscriptionTW.php
        jQuery.ajax({
            url: 'modele/model_InscriptionTW.php',
            type: 'POST',
            data: 'id='+idTW+'&email='+emailTW+'&nom='+nomTW,
            success: function(data){
                console.log(data);
                var words = data.split(':');
                let type = words[2].substr(1, words[2].length-3);

                //<?php $_SESSION["type"] ="Pilote" ?>

                if (type == "Pilote"){
                  window.location = "index.php?page=user";
                }
                else if(type == "Administrateur"){
                  window.location = "index.php?page=admin_user";
                }
                else {
                  window.location = "index.php?page=gestionnaire";
                }
            },
            error: function(){
                alert('Erreur');
            }
        });
      });
      // Retrieves user data from OAuth provider by using #get() and
      // OAuth provider url    
      twitter.get('/1.1/account/verify_credentials.json?include_email=true').then(data => {
        console.log('self data:', data);
      })    
    });
  })