/**
 * Created by nachodegrau on 14/12/13.
 */

_readroom.notificationsCollection = Backbone.Collection.extend({
    model: _readroom.notificationModel,
    url: absoluteUrl + "notifications",
    initialize: function() {

    },
    searchNotificationsByUser: function(idUser) {
        this.fetch({
            data: {
                idUser: idUser
            },
            success: function(data) {
                console.log(data);
                var notificationView = new _readroom.notificationsView({collection: data, el: $('#notifications')});
                notificationView.render();
            },
            fail: function(data) {

            }
        });
    }
});