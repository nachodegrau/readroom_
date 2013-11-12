/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

_readroom.readerModel = Backbone.Model.extend({
    url: absoluteUrl + "reader",
    defaults: {
        context: {},
        readerElement: "#reader",
        readium: {},
        viewSettings: {
            syntheticLayout: false,
            currentMargin: 1,
            setFontSize: 12,
            currentTheme: "default",
            tocVisible: true
        },
        bottomOffset: 114,
        publishStatus: false,
        chapters:[],
        currentSpine: 0,
        currentElementId: ""
    },
    
    initialize: function(attrs, opts) {
        that = this;
        this.setHeight();
        this.setReadium();
        
    },
    
    setReadium: function() {

        // content.opf 
        var xmlUrl = rootBooks + currentBook.get("source") + currentBook.get("opf_name");
	var xmlDoc = this.getXML(xmlUrl);
        
        // toc.ncx
        var tocUrl = rootBooks + currentBook.get("source") + "toc.ncx";
	var $tocXML = $( $.parseXML(this.xmlToString(this.getXML(tocUrl))) );
        this.setChapters($tocXML);

        var packageDocumentURL = rootBooks + currentBook.get("source");
        var readium = SimpleReadiumJS(this.get('readerElement'), this.get('viewSettings'), packageDocumentURL, this.xmlToString(xmlDoc), "lazy");
        this.set({readium: readium});
        this.get("readium").render();
    },
            
    showPageByElement: function(spine_id, elemento_id) {
        this.setCurrentChapter(spine_id, elemento_id);
        this.get("readium").showPageByElementId(spine_id, elemento_id, this.initSocial, reader);
    },
            
    setChapters: function($tocXML) {
        var that = this,
        chapters = [];
        
        var depth = $tocXML.find('meta[name="dtb:depth"]').attr("content");
        
        var $elem = $tocXML.find("navMap");
        
        chapters = this.chaptersTreeNavigate(depth - 1, $elem.children("navPoint"));
        
        this.set({chapters: chapters});
        
    },
    
    chaptersTreeNavigate: function(depth, $elem) {
        var that = this;
        var nodes = [];
        var spine = -1,
        currentSpineSrc = "";
        var i = 0;
        
        $elem.each(function() {
            // divido el src entre archivo e ID
            var src = $(this).find("content").attr("src").split("#");
            // busco el spine
            if(src[0] != currentSpineSrc) {
                currentSpineSrc = src[0];
                spine++;
            }
            
            if(src[1] == null) {
                src[1] = 0;
            }
            var chapter = {
                name: $(this).children("navLabel").children("text").text(),
                elementId: src[1],
                spine: spine,
                children: []
            };
            
            if($(this).children("navPoint").length == 0 || depth == 0) {
                nodes[i] = chapter;
            } else {
                nodes[i] = chapter;
                nodes[i].children = that.chaptersTreeNavigate(depth, $(this).children("navPoint"));
            }
            i++;
        });
        
        return nodes;
    },
    
    getXML: function(url) {
        // I get the xml package document from packageDocumentURL
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        }
        else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xhttp.open("GET", url, false);
        xhttp.send();
        xmlDoc = xhttp.responseXML;

        return xmlDoc;
    },
    
    xmlToString: function(xmlData) {

        var xmlString;
        //IE
        if (window.ActiveXObject) {
            xmlString = xmlData.xml;
        }
        // All browsers
        else {
            xmlString = (new XMLSerializer()).serializeToString(xmlData);
        }

        return xmlString;
    },
    
    setHeight: function() {
        var that = this;        
        $("#prev-page-image").css({"marginTop": $(window).height() / 2.2});
        $("#next-page-image").css({"marginTop": $(window).height() / 2.2});
        $("#reader").css({"height": $(window).height() - that.get("bottomOffset")});
    },
            
    resizeContent: function() {
        this.setHeight();
        this.get("readium").resizeContent();
    },
            
    nextPage: function(callback) {
        var that = this;
        this.get("readium").nextPage(function() {
            console.log("SALTO");
            // sumo el spine para que sume el spine correcto
            that.set({currentSpine: that.get("currentSpine") + 1});
            that.initSocial();
        });
        //console.log("actual: " + this.get("readium").getCurrentPage() + " total: " + this.get("readium").getNumberOfPages());
        $(".meter").css({width: (this.get("readium").getCurrentPage()/this.get("readium").getNumberOfPages())*100 + "%"});
    },
    
    previousPage: function(callback) {
        var that = this;
        this.get("readium").previousPage(function() {
            // resto el spine para que busque el iframe correcto
            that.set({currentSpine: that.get("currentSpine") - 1});
            that.initSocial();
        });
        $(".meter").css({width: (this.get("readium").getCurrentPage()/this.get("readium").getNumberOfPages())*100 + "%"});
    },
    
    initSocial: function(that) {
        var that = this;
        
        // Guardo el contexto del iframe en cuestión a partir del spine
        var iframe = $("iframe.readium-flowing-content")[this.get("currentSpine")];
        var context = $(iframe).contents();
        this.set({iframe: iframe});
        this.set({context: context});
        
        // Añado a la cabecera del iframe el css de los inputs
        this.get("context").find("head").append("<link rel='stylesheet' type='text/css' href='" + rootUrl + "css/social.css' />");
        
        // Busco todos los inputs que hay en ese iframe
        inputs.searchAllInputsByBook(currentBook.get("id"), reader.get("currentSpine"));
        
        $(this.get("context")).off("click", ".openInputPopup");
        // Añado el evento de click al icono azul
        $(this.get("context")).on("click", ".openInputPopup", function() {
            inputs.viewInputs(this); 
        });
        
        $(this.get("context")).on("mouseup", that.getSelectedText);
        
        //if(navigator.userAgent.indexOf("Mobile") !== -1) {
            $(this.get("context")).on("touchend", function() {
                var timer = setInterval(that.getSelectedText, 100);
            });
            
            $(this.get("context")).swipe({
                //Generic swipe handler for all directions
                swipe:function(event, direction, distance, duration, fingerCount) {
                  if(direction == "left") {
                      that.nextPage();
                  } else if(direction == "right"){
                      that.previousPage();
                  }
                },
                //Default is 75px, set to 0 for demo so any distance triggers swipe
                 threshold:50
            });
            
            
        //}
        
    },
    
    /*
    * función que añade o quita el listener que permite publicar el libro en función del estado en que se encuentre
    */
    chagePublishStatus: function(inputText) {
        var that = this;
        //var text = that.getSelectedText();
        var text = that.get("text");
        if (text != "") {
            var input = new _readroom.inputModel({
                book_spine: that.get("currentSpine"),
                tag_name: that.get("currentElementId"),
                input_quote: text,
                comment: inputText,
                reader_id: currentUser.id,
                book_id: currentBook.get("id")
            });
            input.saveInput();
            
        } else {
            alert("selecciona un fragmento");
        }
       
    },
    
    getSelectedText: function() {
        var iframeWindow = reader.get("iframe").contentWindow;
        var iframeDocument = reader.get("iframe").contentDocument;

        if (window.getSelection) {  // all browsers, except IE before version 9
            try {
                var range = iframeWindow.getSelection().getRangeAt(0);
                that.set({text: range.toString()});
                $("#selected-text").html(range.toString());
            } catch (err) {
                //alert(err);
            }
        }
        else {
            if (document.selection.createRange) { // Internet Explorer
                var range = iframeDocument.selection.createRange();
                that.set({text: range.text});
                $("#selected-text").html(range.toString());
            }
        }
    },
    
    setCurrentChapter: function(spine, elementId) {
        this.set({currentSpine: spine, currentElementId: elementId});
    },
    
    setFontSize: function(fontSize) {
        this.get("readium").setFontSize(fontSize);
    }
    
});


