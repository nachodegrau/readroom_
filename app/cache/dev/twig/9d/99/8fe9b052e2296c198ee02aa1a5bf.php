<?php

/* ReadroomCategoriesBundle:Categories:categories.html.twig */
class __TwigTemplate_9d998fe9b052e2296c198ee02aa1a5bf extends Twig_Template
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
        echo "

<script type=\"text/html\" id=\"template-categories\">
    
    
    <a href=\"#\"> <span>Categorías </span></a>

    <ul class=\"dropdown\">
        <%  _.each(models, function(category) { %>
            <% if (category.attributes.parent_id == 0) { %>
                <% if (category.attributes.children.length == 0) { %>
                   <li> <a class=\"category\" data-categoryid=\"<%= category.attributes.id %>\"> <%= category.attributes.category_name %> </a> </li>
                <% } else { %>
                    <li class=\"has-dropdown\" > <a class=\"category parent\" data-categoryid=\"<%= category.attributes.id %>\" > <%= category.attributes.category_name %> </a>
                        <ul class=\"dropdown\">
                        <% _.each(category.attributes.children, function(children) { %>
                            <li ><a class=\"category\" data-categoryid=\"<%= children.id %>\"><%= children.category_name %></a></li>
                            <li class=\"divider\"></li>

                        <% }); %>
                        </ul>
                    </li>
                <% } %>
                <li class=\"divider\"></li>
            <% } %>
            
        <% }); %>
   </ul>
        
        
 </script>
";
        // line 45
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ReadroomCategoriesBundle:Categories:categories.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  52 => 45,  128 => 102,  118 => 95,  110 => 90,  160 => 116,  144 => 103,  131 => 93,  90 => 55,  80 => 48,  74 => 45,  58 => 32,  38 => 15,  23 => 3,  19 => 1,);
    }
}
