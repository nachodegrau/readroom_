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
        /*this.model.set({
            mail: $(form).find("input[name='userMail']").val(), 
            password: $(form).find("input[name='userPassword']").val()
        });*/
        
        this.model.registraUsuario(form);
    }
    
});

