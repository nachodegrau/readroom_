<?php

/* ::base.html.twig */
class __TwigTemplate_0843baec77dc561344b1c6a8a42d7482 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'main_menu' => array($this, 'block_main_menu'),
            'left_menu' => array($this, 'block_left_menu'),
            'home' => array($this, 'block_home'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
            ";
        // line 15
        $this->displayBlock('main_menu', $context, $blocks);
        // line 68
        echo "         ";
        // line 69
        echo "         ";
        $this->displayBlock('left_menu', $context, $blocks);
        // line 70
        echo "            
         ";
        // line 72
        echo "         <div id=\"main-content\">
            ";
        // line 73
        $this->displayBlock('home', $context, $blocks);
        // line 74
        echo "         </div> 
        ";
        // line 75
        $this->displayBlock('javascripts', $context, $blocks);
        // line 143
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/css/lib/foundation.min.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/css/lib/normalize.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/css/base.css"), "html", null, true);
        echo "\" />
        ";
    }

    // line 15
    public function block_main_menu($context, array $blocks = array())
    {
        // line 16
        echo "            <div >
                <nav id=\"main-header\" class=\"top-bar no-home-structure\">
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
                </nav>
            </div>
            ";
    }

    // line 69
    public function block_left_menu($context, array $blocks = array())
    {
    }

    // line 73
    public function block_home($context, array $blocks = array())
    {
    }

    // line 75
    public function block_javascripts($context, array $blocks = array())
    {
        // line 76
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/custom.modernizr.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/underscore.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/json2.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js\" ></script> 
            <!-- <script type=\"text/javascript\" src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/jquery-1.9.1.js"), "html", null, true);
        echo "\" ></script> -->
            <script type=\"text/javascript\" src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/modernizr-2.5.3.min.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/backbone.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/foundation.min.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/jquery.validate.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/additional-methods.min.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/URI-1.10.0.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/lib/SimpleReadium.js"), "html", null, true);
        echo "\" ></script>
            
            <script type=\"text/javascript\">

                // inicializo la variable javascript princpial desde la que colgará todo el resto de objetos
                var _readroom = _readroom || {};

                \$(document).foundation();

                var currentUser;
                var currentBook;
                var userFacebookFunctions;
                var leftBarWith = 230;
                var reader;
                var inputs;
                var rootUrl = '";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/"), "html", null, true);
        echo "';
                var rootBooks = '";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("books/"), "html", null, true);
        echo "';
                var rootUsers = '";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/"), "html", null, true);
        echo "';
                var absoluteUrl = '";
        // line 105
        echo $this->env->getExtension('routing')->getUrl("readroom_home_homepage");
        echo "';
                var currentBookJSON = ";
        // line 106
        echo twig_jsonencode_filter((isset($context["currentBook"]) ? $context["currentBook"] : $this->getContext($context, "currentBook")));
        echo ";
                var currentUserJSON = ";
        // line 107
        echo twig_jsonencode_filter((isset($context["currentUser"]) ? $context["currentUser"] : $this->getContext($context, "currentUser")));
        echo ";
                var categoriesJSON = ";
        // line 108
        echo twig_jsonencode_filter((isset($context["categories"]) ? $context["categories"] : $this->getContext($context, "categories")));
        echo "; 
     
            </script>
            
            <script type=\"text/javascript\" src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/routers/router.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/userModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/userHasBooksModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/loginView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/saveUserView.js"), "html", null, true);
        echo "\" ></script>
            
            <script type=\"text/javascript\" src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/categoryModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/collections/categoriesCollection.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/categoriesView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/userMenuView.js"), "html", null, true);
        echo "\" ></script>

            <script type=\"text/javascript\" src=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/leftBarModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/leftBarView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/bookModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/collections/booksCollection.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/booksCatalogView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/bookDescriptionView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/readerModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/readerView.js"), "html", null, true);
        echo "\" ></script>
            
            <script type=\"text/javascript\" src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/models/inputModel.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/collections/inputsCollection.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/inputsView.js"), "html", null, true);
        echo "\" ></script>
            
            <script type=\"text/javascript\" src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/socialView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/chaptersView.js"), "html", null, true);
        echo "\" ></script>
            <script type=\"text/javascript\" src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/views/configView.js"), "html", null, true);
        echo "\" ></script>
            
            <script type=\"text/javascript\" src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/js/init.js"), "html", null, true);
        echo "\" ></script>
            
        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  357 => 140,  352 => 138,  348 => 137,  344 => 136,  339 => 134,  335 => 133,  331 => 132,  326 => 130,  322 => 129,  318 => 128,  314 => 127,  310 => 126,  306 => 125,  302 => 124,  298 => 123,  293 => 121,  289 => 120,  285 => 119,  281 => 118,  276 => 116,  272 => 115,  268 => 114,  264 => 113,  260 => 112,  253 => 108,  249 => 107,  245 => 106,  241 => 105,  237 => 104,  233 => 103,  229 => 102,  211 => 87,  207 => 86,  203 => 85,  199 => 84,  195 => 83,  191 => 82,  187 => 81,  183 => 80,  178 => 78,  174 => 77,  169 => 76,  166 => 75,  161 => 73,  156 => 69,  101 => 16,  98 => 15,  92 => 10,  88 => 9,  84 => 8,  79 => 7,  76 => 6,  70 => 5,  64 => 143,  62 => 75,  59 => 74,  57 => 73,  54 => 72,  51 => 70,  48 => 69,  46 => 68,  44 => 15,  37 => 12,  35 => 6,  31 => 5,  25 => 1,);
    }
}
