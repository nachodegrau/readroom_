_readroom.profileView = Backbone.View.extend({
    template: _.template($("#template-user-profile").html()),
    events: {
        "click #addFriend": "addFriend"
    },
    initialize: function() {
        var isCurrentUser = (this.model.get("id") == currentUser.get("id")) ? true : false; 
        this.model.set({isCurrentUser: isCurrentUser});
        console.log(this);
    },
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    },
    addFriend: function() {
        console.log("add friend");
        var friends = new _readroom.friendModel({currentUserId: currentUser.get("id"), friendId: this.model.get("id")});
        friends.addRelation();
    }
});


