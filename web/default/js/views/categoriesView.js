/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.categoriesView = Backbone.View.extend({
    template: _.template($("#template-categories").html()),
    events: {
        "click .category": "searchCategoryBooks"
    },
    initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        return this;
    },
    searchCategoryBooks: function(ev) {
        $("#books-catalog").html("<div class='loading-container'> <img src='" + rootUrl + "images/loader.gif'/> </div>");
        var id = $(ev.currentTarget).data("categoryid");
        
        var data = {id: id, parent: $(ev.currentTarget).hasClass("parent")};
        
        this.collection.fetch({
            data: data,
            success: function(data) {
                
                var categoryBooks = new _readroom.booksCollection();
                categoryBooks.set(data.models);
                var categoryBooksView = new _readroom.booksCatalogView({collection: categoryBooks });
                categoryBooksView.render();
            },
            fail: function() {
        
            }
        });
        
    }
});


