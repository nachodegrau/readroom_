/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.userHasBooksModel = Backbone.Model.extend({
    url: absoluteUrl + "user_has_books",
    defaults: {
        
    },
    initialize: function(attrs, opts) {

    },
    addBookToUser: function() {
        this.save({},{
            success: function(data) {
                $('#book-description').foundation('reveal', 'close');
            },
            fail: function() {
        
            }
        });
    },
    showUserBooks: function() {
        $("#books-catalog").html("<div class='loading-container'> <img src='" + rootUrl + "images/loader.gif'/> </div>");
        var data = {"id": this.get("userId")};
        this.fetch({
            data: data,
            success: function(data) {
                var books = new _readroom.booksCollection();
                books.set(data.get("books"));
                var libraryView = new _readroom.booksCatalogView({collection: books});
                libraryView.render();
            },
            fail: function() {
        
            }
        });
    }
});



