<?php

/* ReadroomInputBundle:Input:input.html.twig */
class __TwigTemplate_6ab261ad32253618391a18f632d6fd58 extends Twig_Template
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
        echo "<div id=\"inputs-popup\" class=\"reveal-modal\"> 
    <div class=\"loading-container\"> 
        <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/loader.gif"), "html", null, true);
        echo "\"/>
    </div>
</div>


        


<script type=\"text/html\" id=\"template-inputs-view\">
    
<div class=\"row\">
    <div id=\"prev-input\"> 
        <img width=\"30px\" height=\"30px\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/previous_page.png"), "html", null, true);
        echo "\">
    </div>
    <div class=\"input-view large-12 columns\">
        <div class=\"row\">
            <% _.each(models, function(input){ %>
            
            <div id=\"input-<%= input.attributes.id %>\" class=\"input-item large-12 columns\">
                <div class=\"row\"> 
                    <div class=\"input-quote large-12 columns\"> 
                        <h3>\" <%= input.attributes.input_quote_mini %> \"</h3>
                    </div>
                </div>
                <div class=\"row\">
                    <% if(input.attributes.type == 0) { %>
                        <div class=\"input-right-column large-12 columns\">
                            <div class=\"row collapse\">
                                <div class=\"input-user large-12 columns\">
                                    <img width=\"30\" height=\"30\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/images/"), "html", null, true);
        echo "<%= input.attributes.reader_image %>\"> <%= input.attributes.reader_name %>

                                </div>
                            </div>
                            <div class=\"row collapse\">
                                <div class=\"input-comment large-12 columns\">
                                    <p> <%= input.attributes.comment %> </p>
                                </div>
                            </div>
                        </div>
                    <% } else { %>
                        <div class=\"input-media large-6 columns\"> 
                            <% if(input.attributes.type == 1) { %> 
                            <img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("inputs/files/"), "html", null, true);
        echo "<%= input.attributes.source %>\" />
                            <% } else if (input.attributes.type == 2) { %>
                            <video width=\"475\" controls>
                                <source src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("inputs/files/"), "html", null, true);
        echo "<%= input.attributes.source %>\" type=\"video/mp4\">
                            </video>
                            <% } %>
                        </div>
                        <div class=\"input-right-column large-6 columns\">
                            <div class=\"input-comment row collapse\">
                                <div class=\"large-1 columns\">
                                    <img width=\"30\" height=\"30\" src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/images/"), "html", null, true);
        echo "<%= input.attributes.reader_image %>\"> 

                                </div>
                           
                                <div class=\" large-11 columns\">
                                    <span class=\"reader-name\"> <%= input.attributes.reader_name %> </span> <%= input.attributes.comment %> 
                                </div>
                            </div>
                            
                            <div class=\"row collapse\">
                                <div id=\"input-<%= input.attributes.id %>-replies\" class=\"input-replies large-12 columns\">
                                    
                                </div>
                            </div>
                            <div class=\"new-reply-form\">
                                <form id=\"input-<%= input.attributes.id %>-reply-form\" action=\"javascript:null\">
                                <div class=\"row collapse\">

                                    <div class=\"input-replies large-12 columns\">
                                        <textarea> </textarea>
                                    </div>
                                </div>
                                <div class=\"row collapse\">
                                    <div class=\"input-replies large-12 columns\">
                                        <button class=\"reply-send-button small right\" data-idinput=\"<%= input.attributes.id %>\" > Enviar </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    
                   <% }  %> 
                </div>
            </div>
            <% }); %>
        </div>
    </div>
    <div id=\"next-input\">
        <img width=\"30px\" height=\"30px\" src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/next_page.png"), "html", null, true);
        echo "\">
    </div>
</div>

</script>

<script type=\"text/html\" id=\"template-input-reply\">
    <div class=\"input-reply\">
            <div class=\"row collapse\">
                <div class=\" large-1 columns\">
                    <img width= \"75%\" src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/images/"), "html", null, true);
        echo "<%= reader_image %>\"> 
                    
                </div>
                <div class=\"large-11 columns\"> <span class=\"reader-name\"><%= reader_name %> </span> <%= comment %>  </div>
            </div>
       </div>
</script>

<script type=\"text/html\" id=\"template-input-replies\">
    <% _.each(models, function(reply){ %>
        <div class=\"input-reply\">
            <div class=\"row collapse\">
                <div class=\" large-1 columns\">
                    <img width= \"30px\" src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/images/"), "html", null, true);
        echo "<%= reply.attributes.reader_image %>\"> 
                    
                </div>
                <div class=\"large-11 columns\"> <span class=\"reader-name\"><%= reply.attributes.reader_name %> </span> <%= reply.attributes.comment %>  </div>
            </div>
       </div>
   <% }); %>
   
   
</script>


";
    }

    public function getTemplateName()
    {
        return "ReadroomInputBundle:Input:input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 116,  144 => 103,  131 => 93,  90 => 55,  80 => 48,  74 => 45,  58 => 32,  38 => 15,  23 => 3,  19 => 1,);
    }
}
