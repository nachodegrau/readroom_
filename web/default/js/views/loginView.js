/*
 * Esta vista se encarga de gestionar el formulario de login
 */

_readroom.loginView = Backbone.View.extend({
    template: _.template($("#template-login").html()),
    events: {
        "click #login-with-facebook": "loginWidthFacebook"
    },
    initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        
        
        return this;
    },
    enviaDatos: function() {
        // loading...
        $("#login-form-submit-info").html("cargando...");

        // introduzco los datos del formulario dentro del modelo
        this.model.set({
            mail: $("#user-login-form").find("input[name='userMail']").val(), 
            password: $("#user-login-form").find("input[name='userPassword']").val(),
            isFacebook: false
        });
        
        this.model.enviaDatos();
        
    },
    
    loginWidthFacebook: function() {
        
        var that = this;
    
        FB.login(function(response) {
            if (response.authResponse) {
                userFacebookFunctions.getUserData(that.model);
            } else {
                // The person cancelled the login dialog
            }
        }, {perms:'email'}); 
    }
    
});

_readroom.accountView = Backbone.View.extend({
    template: _.template($("#template-account").html()),
    events: {
        "click #login-with-facebook": "loginWidthFacebook"
    },
            
    initialize: function() {
        
    },
            
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        this.initValidation();
        
        return this;
    },
            
    initValidation: function() {
         var that = this;
         
         $("#image-account-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            rules: {
                archivos: {
                    extension: "png|jpe?g"
                }
            },
            submitHandler: function(form) {
                console.log("ARGHHH");
                that.model.changeImage();
            }
        });
         
         $("#user-account-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            rules: {
                archivos: {
                    extension: "png|jpe?g"
                }
            },
            submitHandler: function(form) {
                that.model.set({
                    name: $(form).find("input[name='userName']").val(),
                    mail: $(form).find("input[name='userMail']").val()
                });
               
                that.model.modificarDatos(1);
            }
        });
      
      jQuery.validator.addMethod("passwordsAreEquals", function(value, element) {
  
            return ($("#user-new-password").val() == $("#user-new-password-repeat").val());
        }, "Los passwords tiene que ser iguales");
      
      $("#password-account-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            groups: {
                endDateTime: "userNewPassword userNewPasswordRepeat"
            },
            rules: {
                archivos: {
                    extension: "png|jpe?g"
                },
                userNewPassword: {
                    required: true
                },
                userNewPasswordRepeat: {
                    required: true,
                    passwordsAreEquals: true
                }
            },
            submitHandler: function(form) {
                that.model.modificarDatos(2);
            }
      });
    }
});


