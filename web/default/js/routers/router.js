/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.router = Backbone.Router.extend({
    routes: {
        ""      : "home",
        "room"  : "room",
        "login" : "login",
        "library/:id": "library",
        "account/:id": "account"
    },
    
    // función que se llama al entrar en la home
    home: function() {
       $("#left-bar").css({"left": "-" + leftBarWith + "px"});
       $("#main-content").css({"margin-left": "0"});
       $("#books-catalog").show();
       $("#reader-content").empty();
       $("#login-page").hide();
       $("#account-page").hide();
       this.initUserMenu();
       this.initCategories();
       var booksCatalog = new _readroom.booksCollection();
       var bookscatalogView = new _readroom.booksCatalogView({ collection: booksCatalog});
       booksCatalog.searchAllBooks(bookscatalogView);
       $(window).off("resize");
    },
            
    room: function () {
        this.checkUser();
        $("#books-catalog").empty();
        $("#books-catalog").hide();
        $("#login-page").hide();
        $("#account-page").hide();
        this.initUserMenu();
        this.initLeftBar();
        var readerView = new _readroom.readerView({el: $("#reader-content")});
        readerView.render(); 
        
        // inicializo el ebook
        reader = new _readroom.readerModel();
        reader.showPageByElement(0, 0);
        
        // voy a buscar a la BBDD todas las publicaciones que se han hecho sobre ese capítulo
        inputs = new _readroom.inputsCollection();
        inputs.searchAllInputsByBook(currentBook.get("id"), reader.get("currentSpine"));
 

        // inicializo la lista de capítulos
        var chaptersView = new _readroom.chaptersView({el:$("#left-bar-chapters"), model: reader });
        chaptersView.render();
        
        //listener del evento "resize"
        $(window).on("resize", function() {
            $("#left-bar").css({"height": $(window).height()});
            reader.resizeContent();
        });
        
    },
            
    library: function(idUser) {
        this.checkUser();
        this.initUserMenu();
        this.initCategories();
        $("#left-bar").css({"left": "-" + leftBarWith + "px"});
        $("#books-catalog").empty();
        $("#books-catalog").show();
        $("#reader-content").empty();
        $("#login-page").hide();
        $("#account-page").hide();
        
        var userBooks = new _readroom.userHasBooksModel({userId: idUser });
        userBooks.showUserBooks();
    },
            
    login: function() {
        this.initUserMenu();
        $("#left-bar").css({"left": "-" + leftBarWith + "px"});
        $("#login-page").show();
        $("#reader-content").empty();
        $("#books-catalog").empty();
        $("#account-page").hide();
        var user = new _readroom.userModel();
        
        var loginView = new _readroom.loginView({el: $("#login-user"), model: user});
        loginView.render();
        
        var saveUserView = new _readroom.saveUserView({el: $("#save-user"), model: user});
        saveUserView.render();
        
        this.initLoginForms(loginView, saveUserView);
        
    },
            
    account: function() {
        this.initUserMenu();
        $("#left-bar").css({"left": "-" + leftBarWith + "px"});
        $("#main-content").css({"margin-left": "0"});
        $("#login-page").empty();
        $("#reader-content").empty();
        $("#books-catalog").empty();
        $("#account-page").show();
        
        var account = new _readroom.accountView({el: $("#account-page"), model: currentUser});
        account.render();
        
    },
            
    initUserMenu: function() {
        $("#main-header").show();
        //var topbar = new _readroom.topBarView();
        //topbar.render();
        if(typeof currentUser.get("id") == "undefined") {
            var notUserMenuView = new _readroom.notUserMenuView();
            notUserMenuView.render();
        } else {
            var userMenuView = new _readroom.userMenuView({model: currentUser});
            userMenuView.render();
        }
        
    },
            
    /*
     * 
     */
    initCategories: function() {
        var categories = new _readroom.categoriesCollection(categoriesJSON);
        var categoriesView = new _readroom.categoriesView({el:$("#categories-menu"), collection: categories });
        
        categoriesView.render();
    },        
    /*
     * Inicializamos la barra de la izquierda
     */
    initLeftBar: function() {
        $("#left-bar").show();
        //$("#left-bar").css({"left": "0px"});
        //$("#main-content").css({"margin-left": "200px"});
        var leftBarModel = new _readroom.leftBarModel();
        var leftBarView = new _readroom.leftBarView({el:$("#left-bar"), model: currentUser});
        leftBarView.render();
        $("#left-bar").css({"height": $(window).height()});
        
        $("#leftbar-social-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            rules: {
                archivos: {
                    extension: "png|jpe?g|gif|mp4|ogg|webm"
                },
                publishContent: {
                    required: true
                }
            },
            submitHandler: function(form) {
                reader.chagePublishStatus($("#publish-content").val());
            }
      });
    },
    
    /*
     * 
     */
    initLoginForms: function(loginView, saveUserView) {
        //validate del formulario de login
        $("#user-login-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            rules: {
                userName: {
                    required: true
                },
                userPassword: {
                    required: true
                }
            },
            submitHandler: function(form) {
                loginView.enviaDatos(form);
            }
        });
        
        $("#user-save-form").validate({
            ignore: ".ignore",
            errorElement: 'small',
            rules: {
                userName: {
                    required: true
                },
                userPassword: {
                    required: true
                }
            },
            submitHandler: function(form) {
                saveUserView.enviaDatos(form);
            }
        });

    },
    
    checkUser: function() {
        if (typeof currentUser.get("id") == "undefined") {
            location.href = absoluteUrl + "#login";
        }
    }
});

