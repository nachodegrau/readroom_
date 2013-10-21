/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.configView = Backbone.View.extend({
    //template: _.template($("#template-left-menu-config").html()),
    events: {
        "click #publish-submit": "chagePublishStatus",
        "keyup #publish-content": "enableSubmit"
    },
    initialize: function() {
        //this.model.set({user: currentUser});
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    chagePublishStatus: function(ev) {
        reader.chagePublishStatus();
    },
    enableSubmit: function(ev) {
        if ($(ev.currentTarget).val().length == 0) {
            $("#publish-submit").addClass("disabled");
        } else {
            $("#publish-submit").removeClass("disabled");
        }
    }
});


