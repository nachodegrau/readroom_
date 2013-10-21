<?php

/* ReadroomUserBundle:User:user.html.twig */
class __TwigTemplate_0913804ecc533e67e738735beca155d1 extends Twig_Template
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
        echo "<div id=\"fb-root\"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '520935901318052',                        // App ID from the app dashboard
      channelUrl : 'http://local.readroom.com/app_dev.php', // Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
    // for any authentication related change, such as login, logout or session refresh. This means that
    // whenever someone who was previously logged out tries to log in again, the correct case below 
    // will be handled. 
    FB.Event.subscribe('auth.authResponseChange', function(response) {
      // Here we specify what we do with the response anytime this event occurs. 
      if (response.status === 'connected') {
        // The response object is returned with a status field that lets the app know the current
        // login status of the person. In this case, we're handling the situation where they 
        // have logged in to the app.
        testAPI();
      } else if (response.status === 'not_authorized') {
        // In this case, the person is logged into Facebook, but not into the app, so we call
        // FB.login() to prompt them to do so. 
        // In real-life usage, you wouldn't want to immediately prompt someone to login 
        // like this, for two reasons:
        // (1) JavaScript created popup windows are blocked by most browsers unless they 
        // result from direct interaction from people using the app (such as a mouse click)
        // (2) it is a bad experience to be continually prompted to login upon page load.
        FB.login();
      } else {
        // In this case, the person is not logged into Facebook, so we call the login() 
        // function to prompt them to do so. Note that at this stage there is no indication
        // of whether they are logged into the app. If they aren't then they'll see the Login
        // dialog right after they log in to Facebook. 
        // The same caveats as above apply to the FB.login() call here.
        FB.login();
      }
    });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = \"//connect.facebook.net/en_US/all.js\";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>


<div id=\"login-page\">

<div class=\"row\"> 
    <div id=\"login-user\" class=\"large-4 large-centered columns\"> 
    
    </div>
</div>

<div class=\"row\"> 
    <div id=\"login-user\" class=\"large-4 large-centered columns\"> 
        <h3> o </h3>
    </div>
</div>

<div class=\"row\"> 
    <div id=\"save-user\" class=\"large-4 large-centered columns\"> 
    
    </div>
</div>
    
</div>


<script type=\"text/html\" id=\"template-user-menu\">
    <a href=\"#\"> 
        <% if(isFacebook == true) { %>
            <img width=\"20px\" height=\"20px\" src=\"<%= image %>\"/> <span id=\"user-name-menu\"><%= name %></span>
        <% } else { %>
            <img id=\"user-image-menu\" width=\"20px\" height=\"20px\" src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/"), "html", null, true);
        echo "images/<%= image %>\"/> <span><%= name %></span>
        <% } %>
    </a>

    <ul class=\"dropdown\">
        <li><a href=\"";
        // line 96
        echo $this->env->getExtension('routing')->getUrl("readroom_home_homepage");
        echo "#library/<%= id %>\">mi biblioteca</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"";
        // line 98
        echo $this->env->getExtension('routing')->getUrl("readroom_home_homepage");
        echo "#account/<%= id %>\">mi cuenta</a></li>
        <li class=\"divider\"></li>
        <li><a href=\"#\">Cerrar sesión</a></li>
    </ul>
</script>

<script type=\"text/html\" id=\"template-not-user-menu\">
    <a href=\"";
        // line 105
        echo $this->env->getExtension('routing')->getUrl("readroom_home_homepage");
        echo "#login\"> Iniciar sesión</a>
    
</script>


<script type=\"text/html\" id=\"template-login\"> 
        <form id=\"user-login-form\" action=\"javascript:null\">
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h3> Inicia sesión </h3>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <a id=\"login-with-facebook\" class=\"button small\" > Login Facebook </a> 
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input type=\"text\" name=\"userMail\" placeholder=\"e-mail\" /> 
                </div>
            </div>
            <div class=\"row collapse\">
                <div class=\"large-9 columns\">
                    <input type=\"password\" name=\"userPassword\" placeholder=\"Contraseña\" />
                </div>
                
                <div class=\"large-3 columns\">
                    <button id=\"user-login-submit\" class=\"small button right\"> Enviar </button>
                </div>
            </div>
            <div class=\"row\">
                <div id=\"login-form-submit-info\" class=\"user-form-submit-info large-12 columns\"></div>
            </div>
        </form>
</script>

<script type=\"text/html\" id=\"template-save-user\"> 
        <form id=\"user-save-form\" action=\"javascript:null\">
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h3> Regístrate </h3>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input type=\"text\" name=\"userMail\" placeholder=\"e-mail\" /> 
                </div>
            </div>
            <div class=\"row collapse\">
                <div class=\"large-9 columns\">
                    <input type=\"password\" name=\"userPassword\" placeholder=\"Contraseña\" />
                </div>
                
                <div class=\"large-3 columns\">
                    <button id=\"user-login-submit\" class=\"small button right\"> Enviar </button>
                </div>
            </div>
            <div class=\"row\">
                <div id=\"login-form-submit-info\" class=\"user-form-submit-info large-12 columns\"></div>
            </div>
        </form>
</script>

<div>
    <div class=\"row\">
        <div id=\"account-page\" class=\"large-5 large-centered columns\">

        </div>
    </div>
</div>

<script type=\"text/html\" id=\"template-account\">
    <form id=\"image-account-form\" action=\"javascript:null\">
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h3> Tu cuenta: </h3>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h4> Imagen: </h4>
                </div>
            </div>
            <% if(isFacebook == false) { %>
                <div class=\"row\">
                    <div class=\"large-3 columns\">
                        <img id=\"preview-image-account\" src=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("readers/"), "html", null, true);
        echo "images/<%= image %>\" />
                    </div>
                    <div class=\"large-9 columns\"> 
                        <input style=\"color: white\" id=\"account-image\" class=\"file\" type=\"file\" name=\"archivos\" multiple=\"multiple\" />
                    </div>
                </div>
            <% } %>
            <div class=\"row\">
                <div id=\"loading-account-image\" class=\"large-9 columns\" style=\"display: none;\"> 
                        <img class=\"right\" src=\"";
        // line 201
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/loader.gif"), "html", null, true);
        echo "\"/>
                </div>
                <div class=\"large-3 columns right\">
                    <button id=\"user-login-submit right\" class=\"small button right\"> Enviar </button>
                </div>
            </div>
    </form>
     <form id=\"user-account-form\" action=\"javascript:null\">
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h4> Datos personales: </h4>
                </div>
            </div>
            
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input type=\"text\" name=\"userName\" placeholder=\"Nombre\" value=\"<%= name %>\" /> 
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input type=\"text\" name=\"userMail\" placeholder=\"e-mail\" value=\"<%= mail %>\"/> 
                </div>
            </div>
            <div class=\"row\">
                <div id=\"loading-account-1\" class=\"large-9 columns\" style=\"display: none;\"> 
                        <img class=\"right\" src=\"";
        // line 227
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/loader.gif"), "html", null, true);
        echo "\"/>
                </div>
                <div class=\"large-3 columns right\">
                    <button id=\"user-login-submit right\" class=\"small button right\"> Enviar </button>
                </div>
            </div>
    </form>
    <form id=\"password-account-form\" action=\"javascript:null\">
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <h4> Contraseña: </h4>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input id=\"user-password-account\" type=\"password\" name=\"userPassword\" placeholder=\"Contraseña actual\" />
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input id=\"user-new-password\" type=\"password\" name=\"userNewPassword\" placeholder=\"Contraseña nueva\" />
                </div>
            </div>
            <div class=\"row\">
                <div class=\"large-12 columns\">
                    <input id=\"user-new-password-repeat\" type=\"password\" name=\"userNewPasswordRepeat\" placeholder=\"Repite contraseña\" />
                </div>
            </div>
            <div class=\"row\">
                <div id=\"loading-account-2\" class=\"large-9 columns\" style=\"display: none;\"> 
                        <img class=\"right\" src=\"";
        // line 257
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("default/images/loader.gif"), "html", null, true);
        echo "\"/>
                </div>
                <div class=\"large-9 columns\">
                    <button id=\"user-login-submit right\" class=\"small button right\"> Enviar </button>
                </div>
            </div>
            <div class=\"row\">
                <div id=\"login-form-submit-info\" class=\"user-form-submit-info large-12 columns\"></div>
            </div>
   </form>
</script>";
    }

    public function getTemplateName()
    {
        return "ReadroomUserBundle:User:user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 257,  265 => 227,  236 => 201,  224 => 192,  134 => 105,  124 => 98,  119 => 96,  111 => 91,  19 => 1,);
    }
}
