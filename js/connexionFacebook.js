$('#facebook-button').on('click', function() {
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
      facebook.get('/v2.5/me?fields=name,first_name,last_name,email,gender,location,locale,work,languages,birthday,relationship_status,hometown,picture').then(data => {
        console.log('self data:', data);
      })
    });
  })
