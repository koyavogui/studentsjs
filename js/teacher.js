$(document).ready(function () {
    /**
     *  code pour faire la connexion 
     */

    $("#MySigin").click(function (e) { 
        e.preventDefault();
        $.post( "traitements/login.php", $("#formSingin").serialize(), function (data) {
            if ( data.login == "S-success") {
                document.location = './dashbord.php';
                 
            }else{
                $("#formTitle").text("L'un de vos accès est incorrect");
                if ($("#formTitle").is(".bg-warning")) {
                $( "#formTitle" ).toggleClass("bg-danger", "bg-warning");
              }
              if ($("#cadre").is(".border-warning")) {
                $( "#cadre" ).toggleClass("border-danger", "border-warning");
              }
            } 
        },"json")
    });

    $("#btnCours").click(function (e) { 
        e.preventDefault();
        if ($("#btnCours").is(".btn-success")) {
            $.post("./traitements/cours.php", {key : 'demarrer'},
                function (r) {
                    if (r.result == 'success') {
                        $( "#btnCours" ).toggleClass("btn-success");
                        $("#btnCours").addClass('btn-warning');
                        $("#btnCours").text("Terminer cours");
                    }
                },
                "json"
            );
        }else{
            $.post("./traitements/cours.php", {key : 'terminer'},
                function (r) {
                    if (r.result == 'success') {  
                        $( "#btnCours" ).toggleClass("btn-warning");
                        $("#btnCours").addClass('btn-success');
                        $("#btnCours").text("Démarrer cours");
                    }
                },
                "json"
            );
        }
    });
});