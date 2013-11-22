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
       this.destroyInputViews();
       this.initUserMenu();
       this.initCategories();
       var booksCatalog = new _readroom.booksCollection();
       var bookscatalogView = new _readroom.booksCatalogView({ collection: booksCatalog});
       booksCatalog.searchAllBooks(bookscatalogView);
       $(window).off("resize");
    },
            
    room: function () {
        this.checkUser();
        $("#top-bar").empty();
        $("#books-catalog").empty();
        $("#books-catalog").hide();
        $("#login-page").hide();
        $("#account-page").hide();
        //this.initUserMenu();
        this.initLeftBar();
        var readerView = new _readroom.readerView({el: $("#reader-content")});
        readerView.render(); 
        
        // inicializo el ebook
        reader = new _readroom.readerModel();
        reader.showPageByElement(0, 0);
        
        // inicializo la vista de inputs que pinta el popup
        inputsView =  new _readroom.inputsView({el:$("#inputs-popup")});
        
        // voy a buscar a la BBDD todas las publicaciones que se han hecho sobre ese capítulo
        inputs = new _readroom.inputsCollection();
        //inputs.searchAllInputsByBook(currentBook.get("id"), reader.get("currentSpine"));
 

        // inicializo la lista de capítulos
        var chaptersView = new _readroom.chaptersView({el:$("#left-bar-chapters"), model: reader });
        chaptersView.render();
        
        var configView = new _readroom.configurationView({el: $("#left-bar-config")});
        configView.render();
        
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
        this.destroyInputViews();
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
        this.checkUser("login");
        this.initUserMenu();
        this.destroyInputViews();
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
        this.checkUser();
        this.initUserMenu();
        this.destroyInputViews();
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
        var topbar = new _readroom.topBarView({el: $("#top-bar")});
        topbar.render();
        if(typeof currentUser.get("id") == "undefined" || currentUser.get("id") == null) {
            var notUserMenuView = new _readroom.notUserMenuView({el: $("#user-menu")});
            notUserMenuView.render();
        } else {
            var userMenuView = new _readroom.userMenuView({model: currentUser, el: $("#user-menu")});
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
                userUsername: {
                    required: true
                },
                userMail: {
                    required: true,
                    email: true
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
    
    destroyInputViews: function() {
        if(!_.isUndefined(inputsView)) {
            console.log("DESTROY VIEW");
            inputsView.destroy_view();
        }
    },
    
    checkUser: function(page) {
        if (typeof currentUser.get("id") == "undefined" || currentUser.get("id") == null) {
            location.href = absoluteUrl + "#login";
        } else if(page == "login") {
            location.href = absoluteUrl + "#library/" + currentUser.get("id");
        }
    },
    
    initFacebook: function() {
        window.fbAsyncInit = function() {
            // init the FB JS SDK
            FB.init({
              appId      : '520935901318052',                        // App ID from the app dashboard
              channelUrl : 'http://local.readroom.com/app_dev.php', // Channel file for x-domain comms
              status     : true,                                 // Check Facebook Login status
              xfbml      : true                                  // Look for social plugins on the page
            });

            // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
            // for any authentication related change, such as login, logout or session refresh. This means that
            // whenever someone who was previously logged out tries to log in again, the correct case below 
            // will be handled. 
            FB.Event.subscribe('auth.authResponseChange', function(response) {
              // Here we specify what we do with the response anytime this event occurs. 
              if (response.status === 'connected') {
                // The response object is returned with a status field that lets the app know the current
                // login status of the person. In this case, we're handling the situation where they 
                // have logged in to the app.
                testAPI();
              } else if (response.status === 'not_authorized') {
                // In this case, the person is logged into Facebook, but not into the app, so we call
                // FB.login() to prompt them to do so. 
                // In real-life usage, you wouldn't want to immediately prompt someone to login 
                // like this, for two reasons:
                // (1) JavaScript created popup windows are blocked by most browsers unless they 
                // result from direct interaction from people using the app (such as a mouse click)
                // (2) it is a bad experience to be continually prompted to login upon page load.
                FB.login();
              } else {
                // In this case, the person is not logged into Facebook, so we call the login() 
                // function to prompt them to do so. Note that at this stage there is no indication
                // of whether they are logged into the app. If they aren't then they'll see the Login
                // dialog right after they log in to Facebook. 
                // The same caveats as above apply to the FB.login() call here.
                FB.login();
              }
            });
          };

          // Load the SDK asynchronously
          (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
          }(document));

          // Here we run a very simple test of the Graph API after login is successful. 
          // This testAPI() function is only called in those cases. 
          function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
              console.log('Good to see you, ' + response.name + '.');
            });
          }
    },
    
    in_array: function(needle, haystack) {
        var length = haystack.length;
        for(var i = 0; i < length; i++) {
            if(haystack[i] == needle) return true;
        }
        return false;
    }
});

