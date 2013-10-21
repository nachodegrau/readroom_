<?php

/* ReadroomHomeBundle:Default:index.html.twig */
class __TwigTemplate_e8931b5b1e3dc5f94c39ffc73bb07bc5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'left_menu' => array($this, 'block_left_menu'),
            'home' => array($this, 'block_home'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_left_menu($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->env->loadTemplate("ReadroomHomeBundle:Leftbar:leftbar.html.twig")->display($context);
    }

    // line 5
    public function block_home($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->env->loadTemplate("ReadroomBooksBundle:Books:books.html.twig")->display($context);
        // line 7
        echo "    ";
        $this->env->loadTemplate("ReadroomHomeBundle:Reader:reader.html.twig")->display($context);
        // line 8
        echo "    ";
        $this->env->loadTemplate("ReadroomInputBundle:Input:input.html.twig")->display($context);
        // line 9
        echo "    ";
        $this->env->loadTemplate("ReadroomUserBundle:User:user.html.twig")->display($context);
        // line 10
        echo "    ";
        $this->env->loadTemplate("ReadroomCategoriesBundle:Categories:categories.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "ReadroomHomeBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 10,  49 => 9,  46 => 8,  43 => 7,  40 => 6,  37 => 5,  32 => 3,  29 => 2,);
    }
}
