/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.userModel = Backbone.Model.extend({
    url: absoluteUrl + "user",
    defaults: {
        isFacebook: false,
        readerName: null,
        readerSecondName: null,
        image: null
    },
    initialize: function(attrs, opts) {

    },
    enviaDatos: function() {
        this.fetch({
            data: $.param(this.toJSON()), 
            success: function(data) {
                if(data.get("error") == 0) {
                    currentUser = data;
                    location.href = absoluteUrl + "#library/" + data.get("id");
                } else {
                    $("#login-form-submit-info").html("el e-mail o la contraseña son erróneos");
                }
            },
            fail: function(data) {
                $("#login-form-submit-info").html("Ha ocurrido un error en el proceso de Login");
            }
        });
    },
    modificarDatos: function(type) {
        $("#loading-account-" + type).show();
        var that = this;
        $("#left-bar .loading-container").show();
        
        if(type == 1) {
            this.set({typeUpdate: "datos_personales" });
        } else {
            this.set({typeUpdate: "contrasena", reader_password: $("#user-password-account").val(), reader_new_password: $("#user-new-password").val() });
        }
        
        
        this.save({},{
            success: function(data) {
                 $("#loading-account-" + type).hide();
                if(type == 2) {
                    $("#user-password-account").val("");
                    $("#user-new-password").val("");
                    $("#user-new-password-repeat").val("");
                } else if(type == 1) {
                    $("#user-name-menu").val(data.name);
                }
            },
            fail: function() {
                $("#loading-account-" + type).html("Error en la publicación");
            }
        });
    },
    
    changeImage: function() {
        $("#loading-account-image").show();
        var data = new FormData();
        
        var archivos = document.getElementById("account-image");//Damos el valor del input tipo file
            var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo
            
            for (i = 0; i < archivo.length; i++) {
                data[i] = archivo[i];
                data.append('archivo' + i, archivo[i]);
        }
        
        data.append("idUser", this.get("id"));
        
        $.ajax({
            url: absoluteUrl + "userimage",
            type: 'POST', //Metodo que usaremos
            contentType: false, //Debe estar en false para que pase el objeto sin procesar
            data: data, //Le pasamos el objeto que creamos con los archivos
            processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
            cache: false, //Para que el formulario no guarde cache
          }).done(function(data) {
              $("#loading-account-image").hide();
              currentUser.set({image: data.image});
              $("#preview-image-account").attr("src", rootUsers + "images/" + data.image);
              $("#user-image-menu").attr("src", rootUsers + "images/" + data.image);
        });
    },
    
    destroySession: function() {
        if(currentUser.get("isFacebook") == true) {
            console.log("Facebook logout");
            FB.logout();
        }
        this.destroy({
            success: function() {
                currentUser.set({id: null});
                router.initUserMenu();
                location.href = absoluteUrl +"#"; 
            }, 
            fail: function() {
                Console.log("Error al cerrar sesión");
            }
        });
    }
});

_readroom.userFacebookModel = Backbone.Model.extend({
    url: absoluteUrl + "facebookuser",
    defaults: {
        
    },
    initialize: function(attrs, opts) {

    },
    getUserData: function () {
        var that = this;
        FB.api('/me', function(response) {
            // introduzco los datos del formulario dentro del modelo
            that.set({
                mail: response.email,
                name: response.name
            });
            
            FB.api('/me/picture', function(response) {
                console.log(response);
                that.set({image: response.data.url});
                that.enviaDatos();
            });

            
        });
    },
    enviaDatos: function() {
        this.save({},{
            success: function(data) {
                if(data.get("error") == 0) {
                    console.log(data);
                    currentUser = data;
                    
                    location.href = absoluteUrl + "#library/" + data.get("id");
                } else {
                    $("#login-form-submit-info").html("el e-mail o la contraseña son erróneos");
                }
            },
            fail: function(data) {
                $("#login-form-submit-info").html("Ha ocurrido un error en el proceso de Login");
            }
        });
    }
});


