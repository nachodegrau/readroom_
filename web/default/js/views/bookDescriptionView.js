/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.bookDescriptionView = Backbone.View.extend({
   template: _.template($("#template-book-description-popup").html()),
   events: {
       "click #book-read-button-description": "goToReaderPage"
   },
   
   initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    goToReaderPage: function() {
        currentBook = this.model;
        currentBook.storeCurrentBookInSession();
    }
});


