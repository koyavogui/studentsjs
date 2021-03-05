$(document).ready(function () {

    $("#passwordVerify").keyup(function (e) { 
        const pass = $("#password").val();
        const pass2 = $("#passwordVerify").val();
         
        if (pass === pass2) {
            // $("").attr("desabled", "desabled");
            $("#modalEnregistrementKey").removeAttr("disabled");
        }else{
            const desactiver = $("#modalEnregistrementKey").attr("disabled");
            $( "#modalEnregistrementKey" ).prop( "disabled", true );

        }
    });

    /**
     *function d'ajout d'eleve
     */
    function insert() {
        
        const form = $("#inscriptionForm").submit(function (e) {e.preventDefault();});
        var formdata = new FormData(form[0]);
        // ajout d'une clé permettant au fichier php de savoir quelle opération qu'on veut executer.
        formdata.append("key", "enregistrement");
        formdata.delete(passwordVerify);
        $.ajax({
            type: "POST",
            url: "./traitements/addStudent.php",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (m) {
                if(m.insert == 'success'){
                    $("#inscriptionForm")[0].reset();
                    $( "#InscriptionModal" ).modal('hide');
                    $('#result').modal('show');
                    setTimeout(function(){ 
                        $('#result').modal('hide');
                     }, 3000);
                }
            },
            dataType: "JSON"
        });
    }
    /**
     * enregistrement de l'utilisateur
     */
    $("#modalEnregistrementKey").click(function (e) { 
        e.preventDefault();
        console.log(e);
        insert();
    });

    /**
     * Verifivatiion que le mail saisie ou le contact saisir est libre
     */
    $("#email").keyup(function (e) { 
      const email = $("#email").val(); 
      const n = email.includes("@");
      if(n){
        $.post("./traitements/verif.php", {key : "email", saisie : email},
            function (r) {
                if (r.result == 0) {
                    //email libre
                    if (!($("#email").is(".is-valid"))) { 
                        $("#email").addClass("is-valid");
                        $("#modalEnregistrementKey").removeAttr("disabled");
                      }
                    if ($("#email").is(".is-invalid")) {
                        $("#email").removeClass("is-invalid");      
                    }
                }else{
                    
                    //email occupé
                    if (($("#email").is(".is-valid"))) { 
                        $("#email").removeClass("is-valid");
                      }
                    if (!($("#email").is(".is-invalid"))) {
                        $("#email").addClass("is-invalid");    
                        $( "#modalEnregistrementKey" ).prop( "disabled", true );  
                    }
                }
            },
            "json"
        );
      }else{
        if ($("#email").is(".is-invalid")) {
            $("#email").removeClass("is-invalid");      
        }
        if (($("#email").is(".is-valid"))) { 
            $("#email").removeClass("is-valid");
          }
      } 
    });

    $("#contact").keyup(function (e) { 
            const contact= $("#contact").val(); 
        if (contact.length >=8) {
            $.post("./traitements/verif.php", {key : "phone", saisie : contact},
                function (r) {
                    if (r.result == 0) {
                        //email libre
                        if (!($("#contact").is(".is-valid"))) { 
                            $("#contact").addClass("is-valid");
                            $("#modalEnregistrementKey").removeAttr("disabled");
                          }
                        if ($("#contact").is(".is-invalid")) {
                            $("#contact").removeClass("is-invalid");      
                        }
                    }else{
                        
                        //email occupé
                        if (($("#contact").is(".is-valid"))) { 
                            $("#contact").removeClass("is-valid");
                          }
                        if (!($("#contact").is(".is-invalid"))) {
                            $("#contact").addClass("is-invalid");    
                            $( "#modalEnregistrementKey" ).prop( "disabled", true );  
                        }
                    }
                },
                "json"
            );
        }else{
            if ($("#contact").is(".is-invalid")) {
                $("#contact").removeClass("is-invalid");      
            }
            if (($("#contact").is(".is-valid"))) { 
                $("#contact").removeClass("is-valid");
              }
        } 
    });

    /**
     * signer sa présence
     */
    $("#modalSignerKey").click(function (e) { 
        e.preventDefault();
        if ($("#username").val() !== "" && $("#passwordSign").val() !== "") {   
            $.post("./traitements/sign.php", $("#signform").serialize(),
            function (r) {
            console.log(r);
                
            },
            "json"
            );
        }
    });
});