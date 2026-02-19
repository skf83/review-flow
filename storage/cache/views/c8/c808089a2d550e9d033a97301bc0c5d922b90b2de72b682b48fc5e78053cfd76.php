<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /@shared/head.twig */
class __TwigTemplate_5a653f7ed89f81624b79907150e97fce76f4b60d221ce1f51268903b03c725fe extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield "<head>

    <!-- Meta -->
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">

    <!-- App manifest -->
    <link rel=\"manifest\" href=\"";
        // line 9
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        yield "/public/manifest.json\">

    <!-- Browserconfig -->
    <meta name=\"msapplication-config\" content=\"";
        // line 12
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        yield "/public/browserconfig.xml\" />

    <!-- Favicon(s) -->
    ";
        // line 15
        yield Twig\Extension\CoreExtension::include($this->env, $context, "/@shared/fav-icons.twig");
        yield "

    <!-- Page Title -->
    <title>
        ";
        // line 19
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 20
        yield "    </title>

    <!-- Nucleo Icons -->
    <link href=\"../assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
    <link href=\"../assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- Font Awesome Icons -->
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
    <link href=\"../assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- CSS Files -->
    <link id=\"pagestyle\" href=\"";
        // line 29
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        yield "/public/css/back/app.min.css\" rel=\"stylesheet\" />

</head>";
        return; yield '';
    }

    // line 19
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "default title";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/@shared/head.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  89 => 19,  81 => 29,  70 => 20,  68 => 19,  61 => 15,  55 => 12,  49 => 9,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<head>

    <!-- Meta -->
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">

    <!-- App manifest -->
    <link rel=\"manifest\" href=\"{{ base_url() }}/public/manifest.json\">

    <!-- Browserconfig -->
    <meta name=\"msapplication-config\" content=\"{{ base_url() }}/public/browserconfig.xml\" />

    <!-- Favicon(s) -->
    {{ include('/@shared/fav-icons.twig') }}

    <!-- Page Title -->
    <title>
        {% block title %}default title{% endblock %}
    </title>

    <!-- Nucleo Icons -->
    <link href=\"../assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
    <link href=\"../assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- Font Awesome Icons -->
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
    <link href=\"../assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- CSS Files -->
    <link id=\"pagestyle\" href=\"{{ base_url() }}/public/css/back/app.min.css\" rel=\"stylesheet\" />

</head>", "/@shared/head.twig", "/var/www/tune-trafikskole.dk/portfolio/src/views/@shared/head.twig");
    }
}
