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

/* /auth/layout.twig */
class __TwigTemplate_4d82820164679d5b21a80c0104cbd1c87671b4e4864a23beb23e6360c503c523 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield "<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang=\"en\">

    <!-- Section : head -->
    ";
        // line 19
        yield Twig\Extension\CoreExtension::include($this->env, $context, "/@shared/head.twig");
        yield "

    <body class=\"\">

";
        // line 25
        yield "
";
        // line 27
        yield "
";
        // line 32
        yield "
";
        // line 35
        yield "
";
        // line 37
        yield "
        <!--------------------------
         | Page content comes here |
         -------------------------->
        ";
        // line 41
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 42
        yield "
        <!--------------------------
        |   Core JS Files          |
        -------------------------->

        <!-- jQuery -->
        <script src=\"https://code.jquery.com/jquery-3.7.0.min.js\" integrity=\"sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=\" crossorigin=\"anonymous\"></script>
        <script src=\"https://code.jquery.com/ui/1.13.2/jquery-ui.min.js\" integrity=\"sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=\" crossorigin=\"anonymous\"></script>
        <!-- popper.js -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js\" integrity=\"sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- Bootstrap -->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js\" integrity=\"sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+\" crossorigin=\"anonymous\"></script>
        <!-- intl-tel-input -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.6/js/intlTelInput.min.js\" integrity=\"sha512-TJcZiZrZVz21UAAVhWdDyVWIBVa7mGSWk3jrmrq/laOjpoi+bSsCSN51WG5YKwGp4ZmOhlg5PZZKzR9hReehiw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- perfect-scroll -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js\" integrity=\"sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- smooth-scroll -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.8.4/smooth-scrollbar.min.js\" integrity=\"sha512-UOuvdHxPTS8D5IoOYOwLGAN05jYYXKhxFOZDe/24o53eOOf9ylws0uPfV+gRj/k1z17C0KtC7Vkt+5H7BLQxOA==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- Pace -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js\" integrity=\"sha512-2cbsQGdowNDPcKuoBd2bCcsJky87Mv0LEtD/nunJUgk6MOYTgVMGihS/xCEghNf04DPhNiJ4DZw5BxDd1uyOdw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>

        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src=\"";
        // line 64
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        yield "/public/js/back/app.min.js\"></script>

        <!-- Vue.js -->
        <script src=\"";
        // line 67
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        yield "/public/js/vue/main.min.js\"></script>

        <!-- Local script(s) -->
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>

        <!-- Page load -->
        <script>
            \$(document).ajaxStart(function() { Pace.restart(); });
        </script>

        <!-- extending inline scripts -->
        ";
        // line 86
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 87
        yield "
    </body>

</html>";
        return; yield '';
    }

    // line 41
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        return; yield '';
    }

    // line 86
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/auth/layout.twig";
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
        return array (  156 => 86,  149 => 41,  141 => 87,  139 => 86,  117 => 67,  111 => 64,  87 => 42,  85 => 41,  79 => 37,  76 => 35,  73 => 32,  70 => 27,  67 => 25,  60 => 19,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang=\"en\">

    <!-- Section : head -->
    {{ include('/@shared/head.twig') }}

    <body class=\"\">

{#        <!-- Navbar -->#}
{#        {% include '/auth/_partials/navbar.twig' %}#}

{#        <main class=\"main-content mt-0\">#}

{#            <!--------------------------#}
{#             | Page content comes here |#}
{#             -------------------------->#}
{#            {% block content %}{% endblock %}#}

{#            <!-- Footer -->#}
{#            {% include '/auth/_partials/footer.twig' %}#}

{#        </main>#}

        <!--------------------------
         | Page content comes here |
         -------------------------->
        {% block content %}{% endblock %}

        <!--------------------------
        |   Core JS Files          |
        -------------------------->

        <!-- jQuery -->
        <script src=\"https://code.jquery.com/jquery-3.7.0.min.js\" integrity=\"sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=\" crossorigin=\"anonymous\"></script>
        <script src=\"https://code.jquery.com/ui/1.13.2/jquery-ui.min.js\" integrity=\"sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=\" crossorigin=\"anonymous\"></script>
        <!-- popper.js -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js\" integrity=\"sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- Bootstrap -->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js\" integrity=\"sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+\" crossorigin=\"anonymous\"></script>
        <!-- intl-tel-input -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.6/js/intlTelInput.min.js\" integrity=\"sha512-TJcZiZrZVz21UAAVhWdDyVWIBVa7mGSWk3jrmrq/laOjpoi+bSsCSN51WG5YKwGp4ZmOhlg5PZZKzR9hReehiw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- perfect-scroll -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js\" integrity=\"sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- smooth-scroll -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.8.4/smooth-scrollbar.min.js\" integrity=\"sha512-UOuvdHxPTS8D5IoOYOwLGAN05jYYXKhxFOZDe/24o53eOOf9ylws0uPfV+gRj/k1z17C0KtC7Vkt+5H7BLQxOA==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
        <!-- Pace -->
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js\" integrity=\"sha512-2cbsQGdowNDPcKuoBd2bCcsJky87Mv0LEtD/nunJUgk6MOYTgVMGihS/xCEghNf04DPhNiJ4DZw5BxDd1uyOdw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>

        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src=\"{{ base_url() }}/public/js/back/app.min.js\"></script>

        <!-- Vue.js -->
        <script src=\"{{ base_url() }}/public/js/vue/main.min.js\"></script>

        <!-- Local script(s) -->
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>

        <!-- Page load -->
        <script>
            \$(document).ajaxStart(function() { Pace.restart(); });
        </script>

        <!-- extending inline scripts -->
        {% block scripts %}{% endblock %}

    </body>

</html>", "/auth/layout.twig", "/var/www/tune-trafikskole.dk/portfolio/src/views/auth/layout.twig");
    }
}
