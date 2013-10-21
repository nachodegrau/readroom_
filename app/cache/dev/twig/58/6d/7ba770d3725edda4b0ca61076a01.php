<?php

/* ReadroomBooksBundle:Books:books.html.twig */
class __TwigTemplate_586d7ba770d3725edda4b0ca61076a01 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"row\"> 
    <div id=\"books-catalog\" class=\"large-12 columns\">
        <div class=\"loading-container\"> 
            <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/loader.gif"), "html", null, true);
        echo "\"/>
        </div>
    </div>
</div>

<div id=\"book-description\" class=\"reveal-modal\"> </div>

<script type=\"text/html\" id=\"template-books-catalog\">
    <div class=\"row\">
        <% if(models.length > 0) { %>
            
            <%  for(var i=0; i<models.length; i++) { %>
            <% var book=models[i]; %>
                <% if (i < models.length - 1 || i==0) { %>
                    <div class=\"large-3 columns\">
                <% } else { %>
                    <% var offset = models.length/4 - Math.floor( models.length/4 ) %>
                    <% if(offset == 0) { %>
                        <div class=\"large-3 columns\">
                    <% } else if(offset == 0.25) { %>
                        <div class=\"large-3 pull-9 columns\">
                    <% } else if(offset == 0.5) { %>
                        <div class=\"large-3 pull-6 columns\">
                    <% } else if(offset == 0.75) { %>
                        <div class=\"large-3 pull-3 columns\">
                    <% } %>
               <% } %>
                        <div class=\"row\">
                            <div class=\"book-image large-12 columns\" data-book-id=\"<%= book.attributes.id %>\">
                                <div class=\"book-read-button\" data-book-id=\"<%= book.attributes.id %>\" >LEER </div>
                                <img src=\"/<%= book.attributes.book_front %>\" />
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"large-12 columns\">
                                <div class=\"book-info\">
                                    <div class=\"book-name row\" data-book-id=\"<%= book.attributes.id %>\">
                                        <div class=\"large-12 columns\">
                                            <%= book.attributes.book_name %> 
                                        </div>
                                     </div>
                                    <div class=\"book-author row\" data-book-id=\"<%= book.attributes.id %>\">
                                        <div class=\"large-12 columns\">
                                            <%= book.attributes.book_author %> 
                                        </div>
                                    </div>
                                </div>
                           </div>
                         </div>
                    </div>
               
            <% } %>
        <% } else { %>
            <div class=\"centered-info large-6 large-centered columns\"> Todavía no disponemos de libros en esta categoría </div>
        <% } %>
    </div>
</script>

<script type=\"text/html\" id=\"template-book-description-popup\">
    <div class=\"row\"> 
        <div id=\"book-image-description\" class=\"large-4 small-12 columns\">
            <img src=\"/<%= book_front %>\" />
        </div>
        <div class=\"large-8 small-12 columns\">
            <div class=\"row\">
                <div class=\"large-9 columns\">
                    <div class=\"row\">
                        <div class=\"large-12 columns\">
                            <h3 id=\"book-name-description\"><%= book_name %></h3> 
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"large-12 columns\">
                            <h4 id=\"book-author-description\"><%= book_author %></h4> 
                        </div>
                    </div>
                </div>
                <div id=\"book-read-button-description\" class=\"large-3 columns\">
                    <div >LEER </div>
                </div>
            </div>
            <div class=\"row\">
                <div id=\"book-social-description\" class=\"large-4 large-offset-8 columns\"> 
                    <ul>
                        <li> <a>facebook</a> </li> 
                        <li> <a>twitter</a> </li>
                    </ul>
                </div>
            </div>
            <div class=\"row\"> 
                <div id=\"book-synopsis\" class=\"large-12 columns\"> 
                    <p><%= book_synopsis %></p>
                </div>
            </div>
        </div>
    </div>
</script>
";
    }

    public function getTemplateName()
    {
        return "ReadroomBooksBundle:Books:books.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 5,  152 => 114,  120 => 85,  111 => 79,  102 => 73,  90 => 64,  85 => 62,  77 => 57,  19 => 2,  355 => 138,  350 => 136,  346 => 135,  342 => 134,  337 => 132,  333 => 131,  329 => 130,  324 => 128,  320 => 127,  316 => 126,  312 => 125,  308 => 124,  304 => 123,  300 => 122,  296 => 121,  291 => 119,  287 => 118,  283 => 117,  279 => 116,  274 => 114,  270 => 113,  266 => 112,  262 => 111,  258 => 110,  251 => 106,  247 => 105,  243 => 104,  239 => 103,  235 => 102,  231 => 101,  227 => 100,  209 => 85,  205 => 84,  201 => 83,  197 => 82,  193 => 81,  189 => 80,  185 => 79,  181 => 78,  176 => 76,  172 => 75,  167 => 74,  164 => 73,  159 => 71,  154 => 67,  101 => 16,  98 => 15,  92 => 10,  88 => 9,  84 => 8,  79 => 7,  76 => 6,  70 => 5,  64 => 141,  62 => 73,  59 => 72,  57 => 71,  54 => 70,  51 => 68,  48 => 67,  44 => 15,  35 => 6,  31 => 5,  25 => 1,  52 => 10,  49 => 9,  46 => 66,  43 => 7,  40 => 6,  37 => 12,  32 => 3,  29 => 2,);
    }
}
