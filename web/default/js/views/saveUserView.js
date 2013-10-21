/*
 * Esta vista se encarga de gestionar los formularios de registro
 */
_readroom.saveUserView = Backbone.View.extend({
    template: _.template($("#template-save-user").html()),
    events: {

    },
    initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        
        
        return this;
    },
            
    enviaDatos: function(form) {
        
        // loading...
        $(".user-form-submit-info").html("Cargando...");
        
        // introduzco los datos del formulario dentro del modelo
        this.model.set({
            mail: $(form).find("input[name='userMail']").val(), 
            password: $(form).find("input[name='userPassword']").val()
        });

        // llamada ajax para guardar al nuevo usuario
        this.model.save({}, {
            success: function(data) {
                
                if(data.get("error") == 0) {
                    currentUser = data;
                    location.href = absoluteUrl + "#save-user-step1";
                } else {
                    $("#artist-form-submit-info").html("Este Usuario ya exite");
                }
            },
            fail: function() {
                $("#artist-form-submit-info").html("Ha ocurrido un error en el proceso de registro");
            }
        });
    }
    
});

