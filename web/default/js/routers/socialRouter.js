/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.socialRouter = Backbone.Router.extend({
    routes: {
        "profile/:idUser": "userProfile"
    },
    
    userProfile: function(idUser) {
        $("#left-bar").css({"left": "-" + leftBarWith + "px"});
        $("#main-content").css({"margin-left": "0"});
        $("#books-catalog").hide();
        $("#reader-content").empty();
        $("#login-page").hide();
        $("#account-page").hide();
        router.destroyInputViews();
        router.initUserMenu();
        
        var profileView;
        
        if(currentUser.get("id") == idUser) {
            profileView = new _readroom.profileView({el: $("#user-profile"), model: currentUser});
            profileView.render();
        } else {
            console.log("NOT CURRENT USER");
            var user = new _readroom.userModel({id: idUser});
            user.getUser();
        }
        
    }
});

