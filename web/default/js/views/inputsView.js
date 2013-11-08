/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.inputsView = Backbone.View.extend({
    template: _.template($("#template-inputs-view").html()),
    events: {
        "click #prev-input": "previousInput",
        "click #next-input": "nextInput",
        "keyup #new-reply-text": "enableSubmit",
        "click .reply-send-button": "saveReply",
        "click #close-reveal-input": "closeReveal"
    },
    setReplies: function() {
        // Adelanto una posición en array de modelos para que el índice se situe en el primer input
        var nextElement = this.collection.next().getElement();
        
        // Busco las replicas a este input
        nextElement.showInputReplies(nextElement.get("id"));
    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        
        // desactivo las flechas de scroll si es necesario
        $("#prev-input").addClass("image-disabled");
        if(this.collection.length == 1) {
           $("#next-input").addClass("image-disabled"); 
        }
        
        return this;
    },
    previousInput: function() {
        
        // Retrocedo una posición en el array de modelos
        var prevElement = this.collection.prev().getElement();
        
        // Busco las replicas a este input
        prevElement.showInputReplies(prevElement.get("id"));
        
        // Compruebo que no se haya ido el índice del array para evitar errores
        if(typeof prevElement != "undefined") {
            // si es el primer elemento
            if(prevElement.get("id") == this.collection.at(0).get("id")){
                // escondo la flecha prev
                $("#prev-input").addClass("image-disabled");
            } 
            // si no es el primer elemento
            else {
                // activo la flecha prev
                $("#prev-input").removeClass("image-disabled");
            }
            // activo la flecha next
            $("#next-input").removeClass("image-disabled");
            // escondo el input actual
            $(".input-item").hide();
            // muestro el input anterior
            $("#input-" + prevElement.get("id")).show();
            
        }
    },
    nextInput: function() {
        
        // Adelanto una posición en el array de modelos
        var nextElement = this.collection.next().getElement();
        
        // Busco las replicas a este input
        nextElement.showInputReplies(nextElement.get("id"));
        
        // Compruebo que no se haya ido el índice del array para evitar errores 
        if(typeof nextElement != "undefined") {
            // si es el último elemento
            if(nextElement.get("id") == this.collection.at(this.collection.length - 1).get("id")){
                // desactivo la flecha next
                $("#next-input").addClass("image-disabled");
            } else {
                // activo la flecha next
                $("#next-input").removeClass("image-disabled");
                
            }
            // activo la flecha prev
            $("#prev-input").removeClass("image-disabled");
            // escondo el input actual
            $(".input-item").hide();
            // muestro el input anterior
            $("#input-" + nextElement.get("id")).show();
            
        }
    },
    /*
     * Activa y desactiva el botón en función de si no hay nada escrito en el textarea
     */
    enableSubmit: function(ev) {
        console.log("enable submit");
        if ($(ev.currentTarget).val().length == 0) {
            $(".reply-send-button").addClass("disabled");
            $(".reply-send-button").attr("disabled", "disabled");
        } else {
            $(".reply-send-button").removeClass("disabled");
            $(".reply-send-button").removeAttr("disabled");
        }
    },
    saveReply: function(ev) {
        // desactivo el botón para que no se haga la llamada dos veces
        $(".reply-send-button").addClass("disabled");
        $(".reply-send-button").attr("disabled", "disabled");
        $(".reply-loader").show();
        
        var comment = $("#input-" + $(ev.currentTarget).data("idinput") + "-reply-form").find("textarea").val();
        var reply = new _readroom.replyModel({input_id: $(ev.currentTarget).data("idinput"), comment: comment});
        reply.saveInputReply();
    },
   closeReveal: function() {
       $("#inputs-popup").foundation("reveal", "close");
   }

});

_readroom.replyView = Backbone.View.extend({ 
    template: _.template($("#template-input-reply").html()),
    el: $(".input-replies"),
    events: {
        "click #prev-input": "previousInput",
        "click #next-input": "nextInput",
        "click .reply-send-button": "saveReply"
    },
    initialize: function() {
        // Adelanto una posición en array de modelos para que el índice se situe en el primer input
    },
    render: function() {
        console.log("#input-" + this.model.get("input_id") + "-replies");
        $("#input-" + this.model.get("input_id") + "-replies").append(this.template(this.model.toJSON()));
        
        return this;
    }
});

_readroom.repliesView = Backbone.View.extend({ 
    template: _.template($("#template-input-replies").html()),
    el: $(".input-replies"),
    initialize: function() {
        
    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        
        return this;
    }
});

