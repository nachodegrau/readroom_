/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.topBarView = Backbone.View.extend({
    template: _.template($("#template-top-bar").html()),
    events: {
        "click .category": "searchCategoryBooks",
        "click #close-session": "destroySession"
    },
    initialize: function() {
    },
    render: function() {
        $(this.el).html(this.template());
        return this;
    }
});

_readroom.userMenuView = Backbone.View.extend({
    template: _.template($("#template-user-menu").html()),
    events: {
        "click .category": "searchCategoryBooks",
        "click #go-to-library": "goToLibrary",
        "click #go-to-profile": "goToProfile",
        "click #go-to-account": "goToAccount",
        "click #close-session": "destroySession"
    },
    initialize: function() {
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    goToLibrary: function() {
        location.href = absoluteUrl + "#library/" + currentUser.get("id");
    },
    goToProfile: function() {
        location.href = absoluteUrl + "#profile/" + currentUser.get("id");
    },
    goToAccount: function() {
        location.href = absoluteUrl + "#account/" + currentUser.get("id");
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


