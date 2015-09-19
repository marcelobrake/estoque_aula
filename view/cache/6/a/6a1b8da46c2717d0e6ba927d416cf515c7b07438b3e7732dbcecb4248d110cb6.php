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
<h1>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["mensagem"]) ? $context["mensagem"] : null), "html", null, true);
        echo "</h1>

<br/>
<img src=\"http://www.unifafibe.com.br/banner_menor/banner_Egressos.jpg\" />

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
        return array (  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <h1>{{mensagem}}</h1>*/
/* */
/* <br/>*/
/* <img src="http://www.unifafibe.com.br/banner_menor/banner_Egressos.jpg" />*/
/* */
/* {% endblock content %}*/
