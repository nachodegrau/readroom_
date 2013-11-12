/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.socialRouter = Backbone.Router.extend({
    routes: {
        "p/:nameUser/:idUser": "userProfile"
    },
    
    userProfile: function(nameUser, idUser) {
        $("#left-bar").css({"left": "-" + leftBarWith + "px"});
        $("#main-content").css({"margin-left": "0"});
        $("#books-catalog").hide();
        $("#reader-content").empty();
        $("#login-page").hide();
        $("#account-page").hide();
        router.destroyInputViews();
        router.initUserMenu();
        
    }
});

