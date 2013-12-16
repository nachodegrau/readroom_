/**
 * Created by nachodegrau on 14/12/13.
 */

_readroom.notificationsView = Backbone.View.extend({
    template: _.template($('#template-notifications').html()),
    events: {
        'click .notification-link': 'goToReaderPage',
        'click .accept-solicitude': 'acceptSolicitude'
    },
    initialize: function() {

    },
    render: function() {
        $(this.el).html(this.template(this.collection));
        return this;
    },
    goToReaderPage: function(ev) {
        console.log($(ev.currentTarget).data('id-reader'));
        socialRouter.navigate('profile/' + $(ev.currentTarget).data('id-reader'), {trigger: true});
    },
    acceptSolicitude: function(ev) {
        $('.notification-loader').show();
        var friends = new _readroom.friendModel({currentUserId: currentUser.get("id"), friendId: $(ev.currentTarget).data('id-reader')});
        friends.addRelation();
    }
});
