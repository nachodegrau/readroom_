/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    initCurrentBook(currentBookJSON);
    initCurrentUser(currentUserJSON);
    
    userFacebookFunctions = new _readroom.userFacebookModel();
    //userBooks = new _readroom.booksCollection();
    
    Backbone.emulateJSON = true;
    // creo una instancia del router
    router = new _readroom.router;
    socialRouter = new _readroom.socialRouter;

    // inicializo la entidad history de Backbone para poder uilizar las rutas
    Backbone.history.start();
    
    bookDescriptionView = new _readroom.bookDescriptionView({el:$("#book-description")});
    
    router.initFacebook();
       
});

/*
 * Incializo el usuario si existe
 */

var initCurrentBook = function(book) {
    currentBook = new _readroom.bookModel();
    
    if(book != null) {
       currentBook.set(book);
    }
};

var initCurrentUser = function(user) {    
    currentUser = new _readroom.userModel();
    
    if(user != null) {
       currentUser.set(user);
    }
};

