<?php

/* ReadroomHomeBundle:Reader:reader.html.twig */
class __TwigTemplate_829c8285fdd94a8696fa2e467d166d41 extends Twig_Template
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
        echo "<div class=\"row\">
    <div id=\"reader-content\" class=\"large-12 columns\"></div>
</div>

<script type=\"text/html\" id=\"template-reader\">
    <div class=\"row\"> 
        <div id=\"reader-header\" class=\"large-12 columns\"> 
            <div class=\"row\">
                <div class=\"large-2 columns\"> 
                    <a id=\"open-inputs-bar\"> <img width=\"30px\" height=\"30px\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/input_icon.png"), "html", null, true);
        echo "\"> </a> 
                    <a id=\"open-chapters-bar\"> <img width=\"30px\" height=\"30px\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/chapters_icon.png"), "html", null, true);
        echo "\"> </a>
                    <a id=\"open-config-bar\"> <img width=\"30px\" height=\"30px\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/config_icon.png"), "html", null, true);
        echo "\"> </a> 
                </div>
                <div class=\"large-10 columns\">
                    <h4 id=\"reader-book-title\" > </h4>
                </div>
                
        </div>
    </div>
    <div class=\"row\">
        <div id=\"prev-page\" >
            <img id=\"prev-page-image\" width=\"16px\" height=\"30px\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/previous_page.png"), "html", null, true);
        echo "\">
        </div>
        <div id=\"reader\" class=\"large-12 columns\" > 

        </div>
        <div id=\"next-page\">
            <img id=\"next-page-image\" width=\"16px\" height=\"30px\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/next_page.png"), "html", null, true);
        echo "\">
        </div>
   </div>


</script>";
    }

    public function getTemplateName()
    {
        return "ReadroomHomeBundle:Reader:reader.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 28,  38 => 12,  34 => 11,  30 => 10,  24 => 5,  152 => 114,  120 => 85,  111 => 79,  102 => 73,  90 => 64,  85 => 62,  77 => 57,  19 => 1,  355 => 138,  350 => 136,  346 => 135,  342 => 134,  337 => 132,  333 => 131,  329 => 130,  324 => 128,  320 => 127,  316 => 126,  312 => 125,  308 => 124,  304 => 123,  300 => 122,  296 => 121,  291 => 119,  287 => 118,  283 => 117,  279 => 116,  274 => 114,  270 => 113,  266 => 112,  262 => 111,  258 => 110,  251 => 106,  247 => 105,  243 => 104,  239 => 103,  235 => 102,  231 => 101,  227 => 100,  209 => 85,  205 => 84,  201 => 83,  197 => 82,  193 => 81,  189 => 80,  185 => 79,  181 => 78,  176 => 76,  172 => 75,  167 => 74,  164 => 73,  159 => 71,  154 => 67,  101 => 16,  98 => 15,  92 => 10,  88 => 9,  84 => 8,  79 => 7,  76 => 6,  70 => 5,  64 => 141,  62 => 73,  59 => 72,  57 => 71,  54 => 70,  51 => 22,  48 => 67,  44 => 15,  35 => 6,  31 => 5,  25 => 1,  52 => 10,  49 => 9,  46 => 66,  43 => 7,  40 => 6,  37 => 12,  32 => 3,  29 => 2,);
    }
}
