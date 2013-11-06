/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.inputsCollection = Backbone.Collection.extend({ 
    model: _readroom.inputModel,
    url: absoluteUrl + "inputs",
    initialize: function() {
        
    },
    comparator: function(model) {
        return model.get("id");
    },
    getElement: function() {
        return this.currentElement;
    },
    setElement: function(model) {
        this.currentElement = model;
    },
    next: function() {
        this.setElement(this.at(this.indexOf(this.getElement()) + 1));
        return this;
    },
    prev: function() {
        this.setElement(this.at(this.indexOf(this.getElement()) - 1));
        return this;
    },
    
    // Busco todos los inputs de un spine en concreto
    searchAllInputsByBook: function(idBook,spine) {
        var that = this;
        var data = { idBook: idBook, spine: spine };
        this.fetch({
            data: data,
            success: function(data) {
                var those = that;
                $(reader.get("context")).on("click", ".openInputPopup", function() {
                    those.viewInputs(this); 
                });
                that.setInputsInBook();
            },
            fail: function(data) {
               
            }
        });
    },
    
    // Pongo todos los inputs en el párrafo correspondiente
    setInputsInBook: function() {
        this.each(function(input) {
           input.setInputInBook();
        });
    },
            
    // preparo el popup de inputs y lo muestro
    viewInputs: function(ev) {
        // recojo el campo inputs del párrafo comentado que es un string con los id's de los inputs separados por ","
        var inputsData = $(ev).prev().data("inputs");
        var inputsToView = new _readroom.inputsCollection();

        // Guardo en inputsToView los inputs que hay para ese párrafo en particular
        var inputsArray = inputsData.split(",");
        for (var i = 1; i < inputsArray.length; i++) {
            inputsToView.add(this.get(inputsArray[i]));
        }
        
        //var inputsView = new _readroom.inputsView({el:$("#inputs-popup"), collection:inputsToView, inputs: inputsArray, index: 1});
        inputsView.collection = inputsToView;
        inputsView.setReplies();
        inputsView.render();
        
        $("#input-" + inputsArray[1]).show();
        
        $("#inputs-popup").foundation("reveal", "open");
    }
});

_readroom.repliesCollection = Backbone.Collection.extend({ 
    model: _readroom.replyModel,
    url: absoluteUrl + "replies",
    initialize: function() {
        
    },
    showReplies: function(id) {
        this.fetch({
            data: {
                idinput: id
            },
            success: function(collection) {
                // pinto las replies en el popup debajo del input
                
                console.log(collection);
                
                var repliesview = new _readroom.repliesView({el: $("#input-" + id + "-replies"), collection: collection });
                repliesview.render();
            },
            fail: function () {
        
            }
        });
    }

});