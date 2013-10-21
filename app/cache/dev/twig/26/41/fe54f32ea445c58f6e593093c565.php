<?php

/* ReadroomHomeBundle:Leftbar:leftbar.html.twig */
class __TwigTemplate_2641fe54f32ea445c58f6e593093c565 extends Twig_Template
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
        // line 1
        echo "<div id=\"left-bar\" class=\"no-home-structure\" >
    
</div>

    
    <script type=\"text/html\" id=\"template-top-menu\"> 
            <ul class=\"title-area\" >
                <li class=\"name\" >
                    <h1>
                        <a href=\"#\">
                            Readroom
                        </a>
                    </h1>
                </li>
                <li class=\"toggle-topbar menu-icon\"><a href=\"#\" id=\"menu-expand\"><span>menu</span></a></li>
            </ul>

            <section class=\"top-bar-section\" >
                <ul class=\"left\" >
                    <li class=\"has-form\">
                        <form >
                            <div class=\"row collapse\" >

                                <div class=\"large-centered columns\">
                                    <input type=\"text\">
                                </div>

                            </div>
                        </form>
                    </li>
                </ul>
            </section>

            <section class=\"top-bar-section\">
                <!-- Right Nav Section -->
                <ul class=\"left\">
                    <li id=\"categories-menu\" class=\"has-dropdown\">


                    </li>

                </ul>
            </section>
            <section class=\"top-bar-section\">
                <ul class=\"right\">
                    <li class=\"divider\"></li>
                    <li id=\"user-menu\" class=\"has-dropdown\">

                    </li>
                </ul>
            </section>
        </script>
    
    <script type=\"text/html\" id=\"template-left-menu\">
        
            <div id=\"close-leftbar\"> 
                <img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/close_icon.png"), "html", null, true);
        echo "\">
            </div>

        <div class=\"row\"> 
            <div id=\"user-info\" class=\"large-12 columns\"> 
                <a href=\"";
        // line 62
        echo $this->env->getExtension('routing')->getUrl("readroom_home_homepage");
        echo "#library/<%= id %>\">
                    <span id=\"user-thumbnail\">
                        <img width=\"25px\" height=\"25px\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/"), "html", null, true);
        echo "images/<%= image %>\"/>
                    </span>
                    <span id=\"user-name\"> <%= name %> </span>
                </a>
            </div>
        </div>
        
        <div class=\"section-container accordion\" data-section=\"accordion\">
            <section id=\"inputs-section\" class=\"active\">
              <p class=\"title\" data-section-title><a href=\"#\"><img width=\"30px\" height=\"30px\" src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/input_icon.png"), "html", null, true);
        echo "\"> Social</a></p>
              <div id=\"left-bar-social\" class=\"content\" data-section-content>
                
              </div>
            </section>
            <section id=\"chapters-section\">
              <p class=\"title\" data-section-title><a href=\"#\"><img width=\"30px\" height=\"30px\" src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/chapters_icon.png"), "html", null, true);
        echo "\"> Capítulos</a></p>
              <div id=\"left-bar-chapters\" class=\"content\" data-section-content>
                
              </div>
            </section>
            <section id=\"config-section\">
              <p class=\"title\" data-section-title><a href=\"#\"><img width=\"30px\" height=\"30px\" src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/config_icon.png"), "html", null, true);
        echo "\"> Configuración</a></p>
              <div class=\"content\" data-section-content>
                <p>Content of section 2.</p>
              </div>
            </section>
        </div>

        <div style=\"position:absolute; top:0px; right:-10px;\">
            <img src=\"\" id=\"openCloseLeftMenu\" />
        </div>
        
    </script>

    <script type=\"text/html\" id=\"template-left-menu-social\">
        <form id=\"leftbar-social-form\" action=\"javascript:null\">
            <div class=\"row collapse\">
                <div id=\"user-input-form\" class=\"large-12 columns\"> 
                    <textarea id=\"publish-content\" name=\"publishContent\" ></textarea>
                </div>
            </div>
            <div class=\"row collapse\">
                <div class=\"large-3 columns\"> <input id=\"archivos\" class=\"file\" type=\"file\" name=\"archivos\" multiple=\"multiple\" /></div>
                <div id=\"publish-options\" class=\"large-9 columns\">
                    <button id=\"publish-submit\" class=\"button disabled\">Publicar</button>
                </div>
            </div>
            <div class=\"row collapse\">
                <div class=\"large-12 columns\"> 
                    <div class=\"loading-container\" style=\"display: none;\"> 
                        <img src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/loader.gif"), "html", null, true);
        echo "\"/>
                    </div>
                    <div class=\"info\" style=\"display: none;\"> </div>
                </div>
            </div>
        </form>
    </script>
    
    <script type=\"text/html\" id=\"template-left-menu-chapters\">
        <ul>
        <% _.each(chapters, function(chapter){  %>
           <li class=\"chapter\" data-spine=\"<%= chapter.spine %>\" data-elementid=\"<%= chapter.elementId %>\"> <%= chapter.name %></li>
        <% }); %>
        </ul>
    </script>";
    }

    public function getTemplateName()
    {
        return "ReadroomHomeBundle:Leftbar:leftbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 114,  120 => 85,  111 => 79,  102 => 73,  90 => 64,  85 => 62,  77 => 57,  19 => 1,  355 => 138,  350 => 136,  346 => 135,  342 => 134,  337 => 132,  333 => 131,  329 => 130,  324 => 128,  320 => 127,  316 => 126,  312 => 125,  308 => 124,  304 => 123,  300 => 122,  296 => 121,  291 => 119,  287 => 118,  283 => 117,  279 => 116,  274 => 114,  270 => 113,  266 => 112,  262 => 111,  258 => 110,  251 => 106,  247 => 105,  243 => 104,  239 => 103,  235 => 102,  231 => 101,  227 => 100,  209 => 85,  205 => 84,  201 => 83,  197 => 82,  193 => 81,  189 => 80,  185 => 79,  181 => 78,  176 => 76,  172 => 75,  167 => 74,  164 => 73,  159 => 71,  154 => 67,  101 => 16,  98 => 15,  92 => 10,  88 => 9,  84 => 8,  79 => 7,  76 => 6,  70 => 5,  64 => 141,  62 => 73,  59 => 72,  57 => 71,  54 => 70,  51 => 68,  48 => 67,  44 => 15,  35 => 6,  31 => 5,  25 => 1,  52 => 10,  49 => 9,  46 => 66,  43 => 7,  40 => 6,  37 => 12,  32 => 3,  29 => 2,);
    }
}
