_readroom.solicitudeModel = Backbone.Model.extend({
    url: absoluteUrl + "solicitude",
    defaults: {
        
    },
    initialize: function(attrs, opts) {

    },
    addNotification: function() {
        this.save({},{
            success: function(data) {
                $('#addFriend').html('Notificación enviada');
                $('#addFriend').addClass('disabled');
                $('#addFriend').prop("disabled", true);
            },
            fail: function(data) {
            
            }
        });
    }
});


