/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.inputModel = Backbone.Model.extend({
    url: absoluteUrl + "input",
    defaults: {
        spine: 0,
        elementId: "",
        element: "p",
        text: "",
        reader_id: 0,
        book_id: 0
    },
    initialize: function(attrs, opts) {
        
    },
    
    /*
     * Esta función hace la llamada AJAX para guardar la publicación
     */
    saveInput: function() {
        var that = this;
        $("#left-bar .loading-container").show();
        
        var archivos = document.getElementById("archivos");//Damos el valor del input tipo file
        var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo
        var data = new FormData();

        for (i = 0; i < archivo.length; i++) {
            data[i] = archivo[i];
            data.append('archivo' + i, archivo[i]);
        }
        
        data.append("book_spine", this.get("book_spine"));
        data.append("tag_name", this.get("tag_name"));
        data.append("input_quote", this.get("input_quote"));
        data.append("comment", this.get("comment"));
        data.append("reader_id", this.get("reader_id"));
        data.append("book_id", this.get("book_id"));
        
        this.save({},{
            type: 'POST', //Metodo que usaremos
            contentType: false, //Debe estar en false para que pase el objeto sin procesar
            data: data, //Le pasamos el objeto que creamos con los archivos
            processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
            cache: false, //Para que el formulario no guarde cache
            success: function(data) {
                inputs.add(data);
                $("#left-bar .loading-container").hide();
                $("#left-bar .info").html("Publicado");
                that.setInputInBook();
            },
            fail: function() {
                $("#left-bar .loading-container").html("Error en la publicación");
            }
        });
        
    },
    /*
     * Esta función se encarga de introducir dentro del iframe la información de las publicaciones hechas sobre el mismo
     */
    setInputInBook: function() {
        var that = this;
        // rescato el iframe y recojo todos los contenidos
        var iframe = $("iframe")[this.get("book_spine")];
        var contents = $(iframe).contents();
        
        // busco la cita dentro dl contenido del Iframe y le añado la clase pertinente
        var $elements = contents.find("p:contains('" + this.get("input_quote") + "')");
        $elements.addClass("inputs");
        
        // Compruebo que haya encontrado la cita en cuestión
        if ($elements.length != 0) {
            // cambio el contenido del elemento con los nuevos elementos
            var text = $elements.html();
            
            // Compruebo que la cita no tenga ya el span con class=quote
            var quotes = $elements.children(".quote");
            var exist = 0;
            for(var i=0; i<quotes.length; i++) {
                if($(quotes[i]).data("inputid") == this.get("id")) {
                    exist = 1;
                }
            }
            
            // Si no existe le pongo el span=quote
            if(exist == 0) {
                $elements.html(text.replace(this.get("input_quote"), "<span class='quote' data-inputid='" + this.get("id") + "'>" + this.get("input_quote") + "</span>"));
            }
            
            // pongo ls id's de los inputs que hay en ese elemento
            $elements.each(function() {
                // Si ya existe algun input en el párrafo
                if(typeof $(this).data("inputs") != "undefined") {
                    var idsArray = $(this).data("inputs").split(",");
                    // Compruebo que ese input no esté ya en la lista de id's
                    if(!router.in_array(that.get('id'),idsArray)) {
                       $(this).data("inputs", $(this).data("inputs") + "," + that.get('id')); 
                    }
                } 
                // Si no existe ningún input en el párrafo
                else {
                    $(this).data("inputs", "," + that.get('id'));
                }
            });
            
            // Añado un div debajo del párrafo que indica que allí hay alguna publicación
            var afterEl = $elements.next();
            if(afterEl.attr("class") != "openInputPopup") {
                $elements.after("<div class='openInputPopup' data-reveal-id='inputs-popup'> <div>inputs</div></div>");
            }
        }
    },
    
    
    
    /*
     * Para ver las réplicas a una publicación en concreto
     */
    showInputReplies: function(id) {
        var replies = new _readroom.repliesCollection();
        replies.showReplies(id);
    }
});

_readroom.replyModel = Backbone.Model.extend({
    url: absoluteUrl + "reply",
    defaults: {
        input_id: 0,
        reader_id: 0,
        comment: ""
    },
            
    initialize: function(attrs, opts) {
        
    },
    
    /*
     * Función que hace una llamada AJAX para guardar una réplica
     */
    saveInputReply: function(input_id) {
        var that = this;
        this.save({},{
            success: function() {
                // activo el botón y vacío el textarea
                $(".reply-send-button").removeClass("disabled");
                $(".reply-send-button").removeAttr("disabled");
                $(".new-reply-form").find("textarea").val(" ");
                $(".reply-loader").hide();
                
                // añado la replica a la lista
                var replyView = new _readroom.replyView({model: that });
                replyView.render();
            },
            fail: function() {
                // activo el botón y vacío el textarea
                $(".reply-send-button").removeClass("disabled");
                $(".reply-send-button").removeAttr("disabled");
                $(".new-reply-form").find("textarea").val(" ");
                $(".reply-loader").hide();
                
                // Añado un mensaje de error en el sistema de alerta
            }
        });
    }
    
});



