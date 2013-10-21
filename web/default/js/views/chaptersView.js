/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.chaptersView = Backbone.View.extend({
    template: _.template($("#template-left-menu-chapters").html()),
    events: {
        "click .chapter": "goToChapter"
    },
    initialize: function() {
        //this.model.set({user: currentUser});
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    goToChapter: function(ev) {
        console.log($(ev.currentTarget).data("spine"), $(ev.currentTarget).data("elementid"));
        $(".chapter").removeClass("current");
        $(ev.currentTarget).addClass("current");
        reader.showPageByElement($(ev.currentTarget).data("spine"), $(ev.currentTarget).data("elementid"));
    }
});


