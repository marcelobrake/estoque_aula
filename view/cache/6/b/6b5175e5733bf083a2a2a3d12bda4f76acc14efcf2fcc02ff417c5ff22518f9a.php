<?php

/* layout.html */
class __TwigTemplate_89232a90b59e57c475d7a4d0b08d14c197115ca1a7a44ac24d0d374a22e63a88 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"br\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"Exemplo de Aula\">
        <meta name=\"author\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["autor"]) ? $context["autor"] : null), "html", null, true);
        echo "\">
        <title>";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</title>
    </head>
    <body>
        ";
        // line 12
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "    </body>
</html>
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 13,  47 => 12,  41 => 15,  39 => 12,  33 => 9,  29 => 8,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="br">*/
/*     <head>*/
/*         <meta charset="utf-8">*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*         <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*         <meta name="description" content="Exemplo de Aula">*/
/*         <meta name="author" content="{{autor}}">*/
/*         <title>{{titulo}}</title>*/
/*     </head>*/
/*     <body>*/
/*         {% block content %}*/
/* */
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
