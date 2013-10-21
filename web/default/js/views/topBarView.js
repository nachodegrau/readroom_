/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.topBarView = Backbone.View.extend({
    template: _.template($("#template-top-menu").html()),
    el: $("#main-header"),
    initialize: function() {
        //this.model.set({user: currentUser});
    },
    render: function() {
        $(this.el).html(this.template());
        return this;
    }
});