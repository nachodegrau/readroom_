/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.userMenuView = Backbone.View.extend({
    template: _.template($("#template-user-menu").html()),
    el: $("#user-menu"),
    events: {
        "click .category": "searchCategoryBooks"
    },
    initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
});

_readroom.notUserMenuView = Backbone.View.extend({
    template: _.template($("#template-not-user-menu").html()),
    el: $("#user-menu"),
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


