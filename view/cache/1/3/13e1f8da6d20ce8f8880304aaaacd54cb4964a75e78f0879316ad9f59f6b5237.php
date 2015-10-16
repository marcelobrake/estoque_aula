<?php

/* formUsuario.html */
class __TwigTemplate_6603ddb3c208c656ad4be340581a946d8938597b97bab95905f4d73837e2c146 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "formUsuario.html", 1);
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
    <form action=\"";
        // line 6
        if ((isset($context["new"]) ? $context["new"] : null)) {
            echo " /add/usuario ";
        } else {
            echo " /usuario ";
        }
        echo "\" method=\"post\">
        ID#: <input type=\"hidden\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "id", array()), "html", null, true);
        echo "\" name=\"id\" id=\"id\"/>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "id", array()), "html", null, true);
        echo "<br/>
        NOME: <input type=\"text\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "nome", array()), "html", null, true);
        echo "\" name=\"nome\" id=\"nome\"/><br/>
        EMAIL: <input type=\"email\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "email", array()), "html", null, true);
        echo "\" name=\"email\" id=\"email\"/><br/> 
        ";
        // line 10
        if ((isset($context["new"]) ? $context["new"] : null)) {
            // line 11
            echo "        SENHA: <input type=\"password\"  name=\"senha\" id=\"senha\"/><br/>
        ";
        }
        // line 13
        echo "        ATIVO: <input type=\"radio\" id=\"ativo\" name=\"ativo\" value=\"1\" ";
        if (($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "ativo", array()) == 1)) {
            echo " checked=\"checked\" ";
        }
        echo " /> SIM 
                      <input type=\"radio\" id=\"ativo\" name=\"ativo\" value=\"0\" ";
        // line 14
        if (($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "ativo", array()) == 0)) {
            echo " checked=\"checked\" ";
        }
        echo " /> N&Atilde;O <br/>           
        ADMINISTRADOR: <input type=\"radio\" id=\"administrador\" name=\"administrador\" value=\"1\" ";
        // line 15
        if (($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "administrador", array()) == 1)) {
            echo " checked=\"checked\" ";
        }
        echo " /> SIM 
                              <input type=\"radio\" id=\"administrador\" name=\"administrador\" value=\"0\" ";
        // line 16
        if (($this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "administrador", array()) == 0)) {
            echo " checked=\"checked\" ";
        }
        echo " /> N&Atilde;O <br/>   
        <button type=\"sumit\" name=\"salvar\" id=\"salvar\">Salvar</button>
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "formUsuario.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 16,  76 => 15,  70 => 14,  63 => 13,  59 => 11,  57 => 10,  53 => 9,  49 => 8,  43 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <div class="thumbnail">*/
/*     <form action="{% if new %} /add/usuario {% else %} /usuario {% endif %}" method="post">*/
/*         ID#: <input type="hidden" value="{{ usuario.id }}" name="id" id="id"/>{{ usuario.id }}<br/>*/
/*         NOME: <input type="text" value="{{ usuario.nome }}" name="nome" id="nome"/><br/>*/
/*         EMAIL: <input type="email" value="{{ usuario.email }}" name="email" id="email"/><br/> */
/*         {% if new %}*/
/*         SENHA: <input type="password"  name="senha" id="senha"/><br/>*/
/*         {% endif %}*/
/*         ATIVO: <input type="radio" id="ativo" name="ativo" value="1" {% if usuario.ativo == 1 %} checked="checked" {% endif %} /> SIM */
/*                       <input type="radio" id="ativo" name="ativo" value="0" {% if usuario.ativo == 0 %} checked="checked" {% endif %} /> N&Atilde;O <br/>           */
/*         ADMINISTRADOR: <input type="radio" id="administrador" name="administrador" value="1" {% if usuario.administrador == 1 %} checked="checked" {% endif %} /> SIM */
/*                               <input type="radio" id="administrador" name="administrador" value="0" {% if usuario.administrador == 0 %} checked="checked" {% endif %} /> N&Atilde;O <br/>   */
/*         <button type="sumit" name="salvar" id="salvar">Salvar</button>*/
/*     </form>*/
/* </div>*/
/* */
/* {% endblock %}*/
