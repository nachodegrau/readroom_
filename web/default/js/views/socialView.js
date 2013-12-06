/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.socialView = Backbone.View.extend({
    template: _.template($("#template-left-menu-social").html()),
    events: {
        //"click #publish-submit": "chagePublishStatus",
        "keyup #publish-content": "enableSubmit"
    },
    initialize: function() {
        //this.model.set({user: currentUser});
    },
    render: function() {
        $(this.el).html(this.template());
        this.initForm();
        return this;
    },
    chagePublishStatus: function(ev) {
        reader.chagePublishStatus($("#publish-content").val());
    },
    enableSubmit: function(ev) {
        if ($(ev.currentTarget).val().length == 0) {
            $("#publish-submit").addClass("disabled");
        } else {
            $("#publish-submit").removeClass("disabled");
        }
    },
    initForm: function() {
        console.log("initForm");
        $("#leftbar-social-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            rules: {
                archivos: {
                    extension: "png|jpe?g|gif|mp4|ogg|webm"
                },
                publishContent: {
                    required: true
                }
            },
            submitHandler: function(form) {
                console.log("SUBMIT");
                reader.chagePublishStatus($("#publish-content").val());
            }
      });
    }
});


