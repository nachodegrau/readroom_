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
        var that = this;
        var spine = -1,
        chapters = [],
        currentSpineSrc = "";
        
        //var depth = $tocXML.find('meta[name="dtb:depth"]').attr("content");
        
        var $elem = $tocXML.find("navMap");
                
        $elem.children("navPoint").each( function() {
            var chapter = {};
            
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
            chapter.elementId = src[1];
            chapter.spine = spine;
            chapter.name = $(this).children("navLabel").children("text").text();
            chapters.push(chapter);
        });
        this.set({chapters: chapters});
        
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
            // sumo el spine para que sume el spine correcto
            that.set({currentSpine: that.get("currentSpine") + 1});
            that.initSocial();
        });
    },
    
    previousPage: function(callback) {
        var that = this;
        this.get("readium").previousPage(function() {
            // resto el spine para que busque el iframe correcto
            that.set({currentSpine: that.get("currentSpine") - 1});
            that.initSocial();
        });
    },
    
    initSocial: function(that) {
        var that = this;
        
        // Guardo el contexto del iframe en cuestión a partir del spine
        var iframe = $("iframe.readium-flowing-content")[this.get("currentSpine")];
        var context = $(iframe).contents();
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
       
        /*
        $(this.get("context")).hammer({ prevent_default: true }).on("swipe", "#heading_id_2", function() {
            alert("swipe");
        });*/
        
    },
    
    /*
    * función que añade o quita el listener que permite publicar el libro en función del estado en que se encuentre
    */
    chagePublishStatus: function(inputText) {
        that = this;
        
        var text = that.getSelectedText();
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
        var iframe = $("iframe.readium-flowing-content")[this.get("currentSpine")];
        var iframeWindow = iframe.contentWindow;
        var iframeDocument = iframe.contentDocument;
        
        if (window.getSelection) {  // all browsers, except IE before version 9
            var range = iframeWindow.getSelection();
            return range.toString();
        } 
        else {
            if (document.selection.createRange) { // Internet Explorer
                var range = iframeDocument.selection.createRange();
                return range.text;
            }
        }
    },
    
    setCurrentChapter: function(spine, elementId) {
        this.set({currentSpine: spine, currentElementId: elementId});
    }        
    
});


