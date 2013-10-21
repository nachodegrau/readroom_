/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.readerView = Backbone.View.extend({
   template: _.template($("#template-reader").html()),
   events: {
       "click #prev-page": "previousPage",
       "click #next-page": "nextPage",
       "click #open-inputs-bar": "openInputsMenu",
       "click #open-chapters-bar": "openChaptersMenu",
       "click #open-config-bar": "openConfigMenu"
   },
   initialize: function() {

    },
            
    render: function() {
        $(this.el).html(this.template());
        $("#reader-book-title").html("<span class='black-text'>" + currentBook.get("book_name") + "</span>" + " by " + currentBook.get("book_author"));
        return this;
    },
    
    previousPage: function() {
        console.log("preview");
        reader.previousPage();
    },
    
    nextPage: function() {
       reader.nextPage(); 
    },
            
    openInputsMenu: function() {
        $("#left-bar section").removeClass("active");
        $("#inputs-section").addClass("active");
        
        this.openCloseLeftMenu();
    },
    
    openChaptersMenu: function() {
        $("#left-bar section").removeClass("active");
        $("#chapters-section").addClass("active");
        
        this.openCloseLeftMenu();
    },
    
    openConfigMenu: function() {
        $("#left-bar section").removeClass("active");
        $("#config-section").addClass("active");
        
        this.openCloseLeftMenu();
    },
            
    openCloseLeftMenu: function() {

        $("#left-bar").css({"left": "0px"});
        $("#main-content").css({"margin-left": leftBarWith + "px"});

        if (reader != null) {
            reader.resizeContent();
        }
    }
});


