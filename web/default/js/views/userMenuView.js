/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.userMenuView = Backbone.View.extend({
    template: _.template($("#template-user-menu").html()),
    events: {
        "click .category": "searchCategoryBooks",
        "click #close-session": "destroySession"
    },
    initialize: function() {
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    destroySession: function() {
        this.model.destroySession();
    }
});

_readroom.notUserMenuView = Backbone.View.extend({
    template: _.template($("#template-not-user-menu").html()),
    events: {
        "click .category": "searchCategoryBooks"
    },
    initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template());
        return this;
    }
});


