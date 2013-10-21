/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.booksCollection = Backbone.Collection.extend({ 
    model: _readroom.bookModel,
    url: absoluteUrl + "books",
    initialize: function() {
        
    },
    searchAllBooks: function(bookscatalogView) {
        this.fetch({
            success: function(data) {
                bookscatalogView.render();
            },
            fail: function(data) {
               
            }
        });
    }
});


