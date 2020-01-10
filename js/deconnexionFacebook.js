window.fbAsyncInit = function() {

    FB.init({
        appId      : '572612350206643',
        cookie     : true,
        xfbml      : true,
        version    : 'v5.0'
    });

    FB.AppEvents.logPageView();
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


test = function(){
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });

}
// Renvoie le statut de connexion
function statusChangeCallback(response) {
    console.log('statusChangeCallback :');
    console.log(response);

    // Connecté
    if (response.status === 'connected') {

        FB.logout(function(response) {
            console.log("déco");
            alert("Déconnecté");
            window.location = "index.php?deco=deconnexion";
        });

    // Non connecté
    } else {
        console.log("Non connecté");
        window.location = "index.php?deco=deconnexion";
    }
    
}


