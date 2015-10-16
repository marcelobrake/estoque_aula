<?php

/* login.html */
class __TwigTemplate_949400a7095f4de8433b99bc51717cce1be1c28f240b77142a1f7fd78f6cd8fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "login.html", 1);
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
<form action=\"/entrar\" method=\"POST\">
  <p>Email: <input type=\"text\" name=\"email\" id=\"email\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["email_value"]) ? $context["email_value"] : null), "html", null, true);
        echo "\" /></p>
  <p>Senha: <input type=\"password\" name=\"password\" id=\"password\" /> </p>
  <p><input type=\"submit\" value=\"Entrar\" />
</form>

";
        // line 11
        if ((isset($context["email_error"]) ? $context["email_error"] : null)) {
            // line 12
            echo "<p class=\"alert-danger\">
    ";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["email_error"]) ? $context["email_error"] : null), "html", null, true);
            echo "
</p>
";
        }
        // line 16
        echo "
";
        // line 17
        if ((isset($context["urlRedirect"]) ? $context["urlRedirect"] : null)) {
            // line 18
            echo "<p class=\"small\">(Voc&ecirc; ser&aacute; redirecionando para  ";
            echo twig_escape_filter($this->env, (isset($context["urlRedirect"]) ? $context["urlRedirect"] : null), "html", null, true);
            echo " ap&oacute;s o login)</p>
";
        }
        // line 20
        echo "
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 20,  59 => 18,  57 => 17,  54 => 16,  48 => 13,  45 => 12,  43 => 11,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <form action="/entrar" method="POST">*/
/*   <p>Email: <input type="text" name="email" id="email" value="{{ email_value }}" /></p>*/
/*   <p>Senha: <input type="password" name="password" id="password" /> </p>*/
/*   <p><input type="submit" value="Entrar" />*/
/* </form>*/
/* */
/* {% if email_error %}*/
/* <p class="alert-danger">*/
/*     {{ email_error }}*/
/* </p>*/
/* {% endif %}*/
/* */
/* {% if urlRedirect %}*/
/* <p class="small">(Voc&ecirc; ser&aacute; redirecionando para  {{ urlRedirect }} ap&oacute;s o login)</p>*/
/* {% endif %}*/
/* */
/* {% endblock %}*/
