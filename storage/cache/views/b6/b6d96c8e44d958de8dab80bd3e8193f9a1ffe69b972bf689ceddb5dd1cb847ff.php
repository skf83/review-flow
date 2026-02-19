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

/* /auth/_partials/footer.twig */
class __TwigTemplate_a5025443a2c6486504d769eb8bfaab08f9ecf8a4da1690a0cb0127e59b4bbcd4 extends Template
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
        yield "<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class=\"footer py-5\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-8 mb-4 mx-auto text-center\">
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Company
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    About Us
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Team
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Products
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Blog
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Pricing
                </a>
            </div>
            <div class=\"col-lg-8 mx-auto text-center mb-4 mt-2\">
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-dribbble\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-twitter\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-instagram\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-pinterest\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-github\"></span>
                </a>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-8 mx-auto text-center mt-1\">
                <p class=\"mb-0 text-secondary\">
                    Copyright © <script>
                        document.write(new Date().getFullYear())
                    </script> Soft by Creative Tim.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/auth/_partials/footer.twig";
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
        return new Source("<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class=\"footer py-5\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-8 mb-4 mx-auto text-center\">
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Company
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    About Us
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Team
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Products
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Blog
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
                    Pricing
                </a>
            </div>
            <div class=\"col-lg-8 mx-auto text-center mb-4 mt-2\">
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-dribbble\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-twitter\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-instagram\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-pinterest\"></span>
                </a>
                <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
                    <span class=\"text-lg fab fa-github\"></span>
                </a>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-8 mx-auto text-center mt-1\">
                <p class=\"mb-0 text-secondary\">
                    Copyright © <script>
                        document.write(new Date().getFullYear())
                    </script> Soft by Creative Tim.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->", "/auth/_partials/footer.twig", "/var/www/tune-trafikskole.dk/portfolio/src/views/auth/_partials/footer.twig");
    }
}
