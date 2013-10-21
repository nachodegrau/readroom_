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
    var router = new _readroom.router;

    // inicializo la entidad history de Backbone para poder uilizar las rutas
    Backbone.history.start();
       
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

