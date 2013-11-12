/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.socialRouter = Backbone.Router.extend({
    routes: {
        "p/:nameUser/:idUser": "userProfile"
    },
    
    userProfile: function(nameUser, idUser) {
        alert("Aiiii mamitaaa");
    }
});

