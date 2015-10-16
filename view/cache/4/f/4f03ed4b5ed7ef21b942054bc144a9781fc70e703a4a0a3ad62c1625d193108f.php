<?php

/* listarUsuarios.html */
class __TwigTemplate_5263859969534ee8e9eca241310cbe0f2bb5e15c178adffa813d3fc7b52305a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "listarUsuarios.html", 1);
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


    <div class=\"well\">

        <div class=\"text-right\">
            <a class=\"btn btn-success\" href=\"/add/usuario\">Cadastrar</a>
        </div>
        <hr>

        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lista"]) ? $context["lista"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 16
            echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <a href=\"/usuario/";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "nome", array()), "html", null, true);
            echo "</a>
                <span class=\"pull-right\"><a href=\"mailto:";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</a></span>
            </div>
        </div>

        <hr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "    </div>


</div>

";
    }

    public function getTemplateName()
    {
        return "listarUsuarios.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 26,  59 => 20,  53 => 19,  48 => 16,  44 => 15,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <div class="thumbnail">*/
/* */
/* */
/*     <div class="well">*/
/* */
/*         <div class="text-right">*/
/*             <a class="btn btn-success" href="/add/usuario">Cadastrar</a>*/
/*         </div>*/
/*         <hr>*/
/* */
/*         {% for user in lista %}*/
/* */
/*         <div class="row">*/
/*             <div class="col-md-12">*/
/*                 <a href="/usuario/{{ user.id }}">{{ user.nome }}</a>*/
/*                 <span class="pull-right"><a href="mailto:{{ user.email }}">{{ user.email }}</a></span>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <hr>*/
/*         {% endfor %}*/
/*     </div>*/
/* */
/* */
/* </div>*/
/* */
/* {% endblock %}*/
