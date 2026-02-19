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

/* /@shared/fav-icons.twig */
class __TwigTemplate_e964ca8cd34d104e48a6894670739f69ae5dcffa3fd5f6c954eadc7c5dcb6516 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "<!-- Favicon : MS TILES -->
<meta name=\"msapplication-TileColor\" content=\"#ffffff\">
<meta name=\"msapplication-TileImage\" content=\"/public/assets/ic_fav_144x144.png\">

<!-- Favicon : APPLE -->

<!-- Favicon : BROWSERS -->
<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\"     href=\"/public/assets/ic_fav_16x16.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\"     href=\"/public/assets/ic_fav_32x32.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"36x36\"     href=\"/public/assets/ic_fav_36x36.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"96x96\"     href=\"/public/assets/ic_fav_96x96.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"144x144\"   href=\"/public/assets/ic_fav_144x144.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"168x168\"   href=\"/public/assets/ic_fav_168x168.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"   href=\"/public/assets/ic_fav_192x192.png\">
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/@shared/fav-icons.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array ();
    }

    public function getSourceContext()
    {
        return new Source("<!-- Favicon : MS TILES -->
<meta name=\"msapplication-TileColor\" content=\"#ffffff\">
<meta name=\"msapplication-TileImage\" content=\"/public/assets/ic_fav_144x144.png\">

<!-- Favicon : APPLE -->
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"57x57\" href=\"/src/assets/icons/back/fav/fav57.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"60x60\" href=\"/src/assets/icons/back/fav/fav60.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"72x72\" href=\"/src/assets/icons/back/fav/fav72.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"76x76\" href=\"/src/assets/icons/back/fav/fav76.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"114x114\" href=\"/src/assets/icons/back/fav/favi114.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"120x120\" href=\"/src/assets/icons/app/fav/fav120x120.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"144x144\" href=\"/src/assets/icons/back/fav/fav144.png\">#}
{#<link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"152x152\" href=\"/src/assets/icons/app/fav/fav152x152.png\">#}

<!-- Favicon : BROWSERS -->
<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\"     href=\"/public/assets/ic_fav_16x16.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\"     href=\"/public/assets/ic_fav_32x32.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"36x36\"     href=\"/public/assets/ic_fav_36x36.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"96x96\"     href=\"/public/assets/ic_fav_96x96.png\">
{#<link rel=\"icon\" type=\"image/png\" sizes=\"128x128\"   href=\"/public/assets/ic_fav_128x128.png\">#}
<link rel=\"icon\" type=\"image/png\" sizes=\"144x144\"   href=\"/public/assets/ic_fav_144x144.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"168x168\"   href=\"/public/assets/ic_fav_168x168.png\">
<link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"   href=\"/public/assets/ic_fav_192x192.png\">
", "/@shared/fav-icons.twig", "/var/www/tune-trafikskole.dk/portfolio/src/views/@shared/fav-icons.twig");
    }
}
