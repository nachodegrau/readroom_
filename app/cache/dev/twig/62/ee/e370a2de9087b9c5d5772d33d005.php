<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_62eee370a2de9087b9c5d5772d33d005 extends Twig_Template
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
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  75 => 28,  66 => 25,  50 => 15,  42 => 12,  26 => 3,  60 => 28,  38 => 12,  34 => 11,  30 => 5,  24 => 2,  152 => 114,  120 => 85,  111 => 79,  102 => 73,  90 => 64,  85 => 62,  77 => 57,  19 => 1,  355 => 138,  350 => 136,  346 => 135,  342 => 134,  337 => 132,  333 => 131,  329 => 130,  324 => 128,  320 => 127,  316 => 126,  312 => 125,  308 => 124,  304 => 123,  300 => 122,  296 => 121,  291 => 119,  287 => 118,  283 => 117,  279 => 116,  274 => 114,  270 => 113,  266 => 112,  262 => 111,  258 => 110,  251 => 106,  247 => 105,  243 => 104,  239 => 103,  235 => 102,  231 => 101,  227 => 100,  209 => 85,  205 => 84,  201 => 83,  197 => 82,  193 => 81,  189 => 80,  185 => 79,  181 => 78,  176 => 76,  172 => 75,  167 => 74,  164 => 73,  159 => 71,  154 => 67,  101 => 16,  98 => 15,  92 => 10,  88 => 9,  84 => 8,  79 => 29,  76 => 6,  70 => 26,  64 => 141,  62 => 24,  59 => 72,  57 => 71,  54 => 70,  51 => 22,  48 => 67,  44 => 15,  35 => 6,  31 => 5,  25 => 1,  52 => 10,  49 => 9,  46 => 14,  43 => 7,  40 => 6,  37 => 12,  32 => 6,  29 => 2,);
    }
}
