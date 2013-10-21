/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.categoriesCollection = Backbone.Collection.extend({ 
    model: _readroom.categoryModel,
    url: absoluteUrl + "categories",
    initialize: function() {
        
    },
    searchAllCategories: function() {
        this.fetch({
            success: function(data) {
                bookscatalogView.render();
            },
            fail: function(data) {
               
            }
        });
    }
});



