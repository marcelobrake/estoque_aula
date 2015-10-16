<?php

/* index.html */
class __TwigTemplate_13c702e8927c4338274b1842ef87b338539d2c2d47147b1b879c6a614ee9fb3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "index.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"thumbnail\">
    <img class=\"img-responsive\" src=\"imgs/img800x300.gif\" alt=\"\">
    <div class=\"caption-full\">
        <h4><a href=\"#\">Desenvolvimento Web</a>
        </h4>
        <p>Exemplo de aula sobre Desenvolvimento Web com Slim Framework</p>
        <p>";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["user"]) ? $context["user"] : null), "html", null, true);
        echo "</p>

        <form method=\"post\" action=\"/usuario/popular\">
            Qtde de Registros: <input type=\"number\" max=\"1000\" min=\"0\" name=\"qtde\" id=\"qtde\"/>
            <button type=\"submit\">Criar Usuarios</button>
        </form>
    </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <div class="thumbnail">*/
/*     <img class="img-responsive" src="imgs/img800x300.gif" alt="">*/
/*     <div class="caption-full">*/
/*         <h4><a href="#">Desenvolvimento Web</a>*/
/*         </h4>*/
/*         <p>Exemplo de aula sobre Desenvolvimento Web com Slim Framework</p>*/
/*         <p>{{user}}</p>*/
/* */
/*         <form method="post" action="/usuario/popular">*/
/*             Qtde de Registros: <input type="number" max="1000" min="0" name="qtde" id="qtde"/>*/
/*             <button type="submit">Criar Usuarios</button>*/
/*         </form>*/
/*     </div>*/
/* */
/* </div>*/
/* */
/* {% endblock %}*/
