window.fbAsyncInit = function() {

    FB.init({
        appId      : '572612350206643',
        cookie     : true,
        xfbml      : true,
        version    : 'v5.0'
    });

    FB.AppEvents.logPageView();

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });

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
    console.log('statusChangeCallback');
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
            console.log("reponse");
            console.log(response);

            var idFB = response.id,
                emailFB = response.email,
                prenomFB = response.first_name,
                nomFB = response.last_name;

            // Envoie les données sur la page InscriptionFB.php
            jQuery.ajax({
                url: 'modele/InscriptionFB.php',
                type: 'POST',
                data: 'id='+idFB+'&email='+emailFB+'&prenom='+prenomFB+'&nom='+nomFB,
                success: function(data){
                  var words = data.split(':');
                  var type = words[2].substr(1, words[2].length-3);
                  if (type == "Pilote"){
                    window.location.href = "index.php?page=user";
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
        });

    // Non connecté
    } else {
        console.log("Non connecté")
    }
}
