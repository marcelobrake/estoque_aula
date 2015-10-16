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
<html lang=\"pt-BR\">

    <head>

        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">

        <title>";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</title>

        <!-- Bootstrap Core CSS -->
        <link href=\"/css/bootstrap.min.css\" rel=\"stylesheet\">

        <!-- Custom CSS -->
        <link href=\"/css/shop-item.css\" rel=\"stylesheet\">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
            <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
        <![endif]-->
            ";
        // line 26
        if ((isset($context["msg"]) ? $context["msg"] : null)) {
            // line 27
            echo "        <script>
            window.alert('";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["msg"]) ? $context["msg"] : null), "html", null, true);
            echo "');
        </script>
        ";
        }
        // line 31
        echo "    </head>

    <body>

        <!-- Navigation -->
        <nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
            <div class=\"container\">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=\"navbar-header\">
                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                        <span class=\"sr-only\">Barra de Navega&ccedil;&atilde;o</span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                    <a class=\"navbar-brand\" href=\"#\">";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["titulo"]) ? $context["titulo"] : null), "html", null, true);
        echo "</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                    <ul class=\"nav navbar-nav\">
                        ";
        // line 51
        if ((isset($context["user"]) ? $context["user"] : null)) {
            // line 52
            echo "                        <li>
                            <a href=\"/cliente\">Clientes</a>
                        </li>
                        <li>
                            <a href=\"/fornecedor\">Fornecedores</a>
                        </li>
                        <li>
                            <a href=\"/produto\">Produtos</a>
                        </li>
                        <li>
                            <a href=\"/compra\">Compras</a>
                        </li>
                        <li>
                            <a href=\"/venda\">Vendas</a>
                        </li>
                        <li>
                            <a href=\"/usuario\">Usu&aacute;rios</a>
                        </li>
                        
                        <li>
                            <a href=\"/sair\">Sair</a>
                        </li>
                        ";
        } else {
            // line 75
            echo "                        <li>
                            <a href=\"/entrar\">Entrar</a>
                        </li>
                        ";
        }
        // line 79
        echo "                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class=\"container\">

            <div class=\"row\">

                <div class=\"col-md-3\">
                    <p class=\"lead\">Estoque Aula</p>
                    <div class=\"list-group\">
                        <a href=\"/\" class=\"list-group-item\">Inicial</a>
                        ";
        // line 95
        if ((isset($context["user"]) ? $context["user"] : null)) {
            // line 96
            echo "                        <a href=\"/cliente\" class=\"list-group-item\">Clientes</a>
                        <a href=\"/fornecedor\" class=\"list-group-item\">Fornecedores</a>
                        <a href=\"/produto\" class=\"list-group-item\">Produtos</a>
                        <a href=\"/compra\" class=\"list-group-item\">Compra</a>
                        <a href=\"/venda\" class=\"list-group-item\">Venda</a>
                        <a href=\"/usuario\" class=\"list-group-item\">Usu&aacute;rios</a>
                        ";
        }
        // line 103
        echo "                    </div>
                </div>
                <div class=\"col-md-9\">

                    <!-- BLOCK CONTENT - INICIO -->
                    ";
        // line 108
        $this->displayBlock('content', $context, $blocks);
        // line 111
        echo "                    <!-- BLOCK CONTENT - FIM -->
                </div>
            </div>

        </div>
        <!-- /.container -->

        <div class=\"container\">

            <hr>

            <!-- Footer -->
            <footer>
                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <p>";
        // line 126
        echo twig_escape_filter($this->env, (isset($context["rodape"]) ? $context["rodape"] : null), "html", null, true);
        echo "</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src=\"js/jquery.js\"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src=\"js/bootstrap.min.js\"></script>

    </body>

</html>
";
    }

    // line 108
    public function block_content($context, array $blocks = array())
    {
        // line 109
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
        return array (  199 => 109,  196 => 108,  174 => 126,  157 => 111,  155 => 108,  148 => 103,  139 => 96,  137 => 95,  119 => 79,  113 => 75,  88 => 52,  86 => 51,  78 => 46,  61 => 31,  55 => 28,  52 => 27,  50 => 26,  33 => 12,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="pt-BR">*/
/* */
/*     <head>*/
/* */
/*         <meta charset="utf-8">*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*         <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*         <meta name="description" content="">*/
/*         <meta name="author" content="">*/
/* */
/*         <title>{{titulo}}</title>*/
/* */
/*         <!-- Bootstrap Core CSS -->*/
/*         <link href="/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*         <!-- Custom CSS -->*/
/*         <link href="/css/shop-item.css" rel="stylesheet">*/
/* */
/*         <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*         <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*         <!--[if lt IE 9]>*/
/*             <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*             <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*         <![endif]-->*/
/*             {% if msg %}*/
/*         <script>*/
/*             window.alert('{{ msg }}');*/
/*         </script>*/
/*         {% endif %}*/
/*     </head>*/
/* */
/*     <body>*/
/* */
/*         <!-- Navigation -->*/
/*         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">*/
/*             <div class="container">*/
/*                 <!-- Brand and toggle get grouped for better mobile display -->*/
/*                 <div class="navbar-header">*/
/*                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">*/
/*                         <span class="sr-only">Barra de Navega&ccedil;&atilde;o</span>*/
/*                         <span class="icon-bar"></span>*/
/*                         <span class="icon-bar"></span>*/
/*                         <span class="icon-bar"></span>*/
/*                     </button>*/
/*                     <a class="navbar-brand" href="#">{{titulo}}</a>*/
/*                 </div>*/
/*                 <!-- Collect the nav links, forms, and other content for toggling -->*/
/*                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*                     <ul class="nav navbar-nav">*/
/*                         {% if user %}*/
/*                         <li>*/
/*                             <a href="/cliente">Clientes</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="/fornecedor">Fornecedores</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="/produto">Produtos</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="/compra">Compras</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="/venda">Vendas</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="/usuario">Usu&aacute;rios</a>*/
/*                         </li>*/
/*                         */
/*                         <li>*/
/*                             <a href="/sair">Sair</a>*/
/*                         </li>*/
/*                         {% else %}*/
/*                         <li>*/
/*                             <a href="/entrar">Entrar</a>*/
/*                         </li>*/
/*                         {% endif %}*/
/*                     </ul>*/
/*                 </div>*/
/*                 <!-- /.navbar-collapse -->*/
/*             </div>*/
/*             <!-- /.container -->*/
/*         </nav>*/
/* */
/*         <!-- Page Content -->*/
/*         <div class="container">*/
/* */
/*             <div class="row">*/
/* */
/*                 <div class="col-md-3">*/
/*                     <p class="lead">Estoque Aula</p>*/
/*                     <div class="list-group">*/
/*                         <a href="/" class="list-group-item">Inicial</a>*/
/*                         {% if user %}*/
/*                         <a href="/cliente" class="list-group-item">Clientes</a>*/
/*                         <a href="/fornecedor" class="list-group-item">Fornecedores</a>*/
/*                         <a href="/produto" class="list-group-item">Produtos</a>*/
/*                         <a href="/compra" class="list-group-item">Compra</a>*/
/*                         <a href="/venda" class="list-group-item">Venda</a>*/
/*                         <a href="/usuario" class="list-group-item">Usu&aacute;rios</a>*/
/*                         {% endif %}*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-9">*/
/* */
/*                     <!-- BLOCK CONTENT - INICIO -->*/
/*                     {% block content %}*/
/* */
/*                     {% endblock %}*/
/*                     <!-- BLOCK CONTENT - FIM -->*/
/*                 </div>*/
/*             </div>*/
/* */
/*         </div>*/
/*         <!-- /.container -->*/
/* */
/*         <div class="container">*/
/* */
/*             <hr>*/
/* */
/*             <!-- Footer -->*/
/*             <footer>*/
/*                 <div class="row">*/
/*                     <div class="col-lg-12">*/
/*                         <p>{{rodape}}</p>*/
/*                     </div>*/
/*                 </div>*/
/*             </footer>*/
/* */
/*         </div>*/
/*         <!-- /.container -->*/
/* */
/*         <!-- jQuery -->*/
/*         <script src="js/jquery.js"></script>*/
/* */
/*         <!-- Bootstrap Core JavaScript -->*/
/*         <script src="js/bootstrap.min.js"></script>*/
/* */
/*     </body>*/
/* */
/* </html>*/
/* */
