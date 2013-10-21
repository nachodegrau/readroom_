/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.bookModel = Backbone.Model.extend({
    url: absoluteUrl + "book",
    initialize: function(attrs, opts) {
        
    },
    storeCurrentBookInSession: function() {
        this.save({},{
            success: function() {
                var userBooks = new _readroom.userHasBooksModel({book_id: currentBook.get("id"), user_id: currentUser.get("id")});
                userBooks.addBookToUser();
                location.href = absoluteUrl + "#room";
            },
            fail: function() {
        
            }
        });
    }
});


