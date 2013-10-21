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
    
    setInputInBook: function() {
        // rescato el iframe y recojo todos los contenidos
        var iframe = $("iframe")[this.get("book_spine")];
        var contents = $(iframe).contents();
        
        // busco la cita dentro dl contenido del Iframe y le añado la clase pertinente
        var $elements = contents.find("p:contains('" + this.get("input_quote") + "')");
        $elements.addClass("inputs");
        
        // cambio el contenido del elemento con los nuevos elementos
        var text = $elements.html();
        $elements.html(text.replace(this.get("input_quote"), "<span class='quote' data-inputid='" + this.get("id") + "'>" + this.get("input_quote") + "</span>"));
        that = this;
        // pongo ls id's de los inputs que hay en ese elemento
        $elements.each(function() {
            if(typeof $(this).data("inputs") != "undefined") {
                $(this).data("inputs", $(this).data("inputs") + "," + that.get('id'));
            } else {
                $(this).data("inputs", "," + that.get('id'));
            }
        });
        
            var afterEl = $elements.next();
            if(afterEl.attr("class") != "openInputPopup") {
            $elements.after("<div class='openInputPopup'> <div>inputs</div></div>");
        }
    },
            
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
    
    saveInputReply: function(input_id) {
        var that = this;
        this.save({},{
            success: function() {
                $(".new-reply-form").find("textarea").val(" ");
                var replyView = new _readroom.replyView({model: that });
                replyView.render();
            },
            fail: function() {
        
            }
        });
    }
    
});



