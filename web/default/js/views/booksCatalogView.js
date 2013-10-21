/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.booksCatalogView = Backbone.View.extend({
   template: _.template($("#template-books-catalog").html()),
   el: $("#books-catalog"),
   events: {
     "mouseover .book-image": "showButtons",
     "mouseout .book-image": "showButtons",
     "click .book-image": "showPopupDescription",
     "click .book-name": "showPopupDescription",
     "click .book-author": "showPopupDescription",
     "click #book-read-button": "goToReaderPage"
   },
   initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        return this;
    },
            
    showButtons: function(ev) {
        $(ev.currentTarget).find(".book-read-button").toggle();
    },
            
    showPopupDescription: function(ev) {
        var book = new _readroom.bookModel();
        book = this.collection.get($(ev.currentTarget).data("book-id"));
        bookDescriptionView = new _readroom.bookDescriptionView({el:$("#book-description"), model: book});
        bookDescriptionView.render();
        $('#book-description').foundation('reveal', 'open');
    },
            
    goToReaderPage: function(ev) {
        currentBook = this.collection.get($(ev.currentTarget).data("book-id"));
        currentBook.storeCurrentBookInSession();
    }
});