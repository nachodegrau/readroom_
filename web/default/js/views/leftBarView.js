/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.leftBarView = Backbone.View.extend({
    template: _.template($("#template-left-menu").html()),
    events: {
        "click #close-leftbar": "closeLeftbar"
    },
    initialize: function() {
        //this.model.set({user: currentUser});
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        var socialView = new _readroom.socialView({el: $("#left-bar-social")});
        socialView.render();
        
        return this;
    },
    closeLeftbar: function() {
        $("#left-bar").css({"left": "-" + leftBarWith + "px"});
        $("#main-content").css({"margin-left": "0"});
        
        if (reader != null) {
            reader.resizeContent();
        }
    }       
});

