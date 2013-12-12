_readroom.profileView = Backbone.View.extend({
    template: _.template($('#template-user-profile').html()),
    events: {
        'click #addFriend': 'addSolicitude'
    },
    initialize: function() {
        var isCurrentUser = (this.model.get('id') === currentUser.get('id')) ? true : false; 
        this.model.set({isCurrentUser: isCurrentUser});
        
        if(this.model.get('isCurrentUser') === false) {
            this.model.set({
                exist_solicitude: (currentUser.get('my_solicitudes').indexOf(this.model.get('id'))) === -1 ? false : true,
            });
        }
        
        console.log(this);
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    addSolicitude: function() {
        
        var notification = new _readroom.solicitudeModel({ typeId: 1, currentUserId: currentUser.get('id'), friendId: this.model.get('id') });
        console.log(notification);
        notification.addNotification();
    }
});


