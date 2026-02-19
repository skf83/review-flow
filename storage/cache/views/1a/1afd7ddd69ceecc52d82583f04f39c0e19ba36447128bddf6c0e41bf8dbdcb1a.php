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

/* /home/_partials/header.twig */
class __TwigTemplate_477e30ce037b42901beffef1aa90b2583d9cff11a1b6eb35a93bfe06bcf0faaa extends Template
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
        // line 1
        yield "<header class=\"p-3 mb-3 border-bottom\">
    <div class=\"container\">
        <div class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start\">
            <a href=\"/\" class=\"d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none\">
                <svg class=\"bi me-2\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"></use></svg>
            </a>

            <ul class=\"nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0\">
                <li>
                    <a href=\"";
        // line 10
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("home"), "html", null, true);
        yield "\" class=\"nav-link px-2 link-secondary\">
                        Home
                    </a>
                </li>
                ";
        // line 14
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "user", [], "any", false, false, false, 14)) {
            // line 15
            yield "                    <li>
                        <a href=\"";
            // line 16
            yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("dashboard.overview"), "html", null, true);
            yield "\" class=\"nav-link px-2 link-dark\">
                            Dashboard
                        </a>
                    </li>
                ";
        }
        // line 21
        yield "            </ul>

            <form class=\"col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3\">
                <input type=\"search\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Search\">
            </form>

            <div class=\"row\">
                <div class=\"col-6\">
                    <div class=\"dropdown text-end\">
                        <a href=\"#\" class=\"d-block link-dark text-decoration-none dropdown-toggle\" id=\"locale\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <span class=\"material-icons\" style=\"vertical-align: middle\">
                        &#xE8E2;
                    </span>
                        </a>
                        <ul class=\"dropdown-menu text-small\" aria-labelledby=\"locale\">
                            ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["locales"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["i18n"]) {
            // line 37
            yield "                                ";
            if ((0 !== CoreExtension::compare($this->extensions['app\views\extensions\TranslationExtension']->locale(), CoreExtension::getAttribute($this->env, $this->source, $context["i18n"], "code", [], "any", false, false, false, 37)))) {
                // line 38
                yield "                                    <li>
                                        <a class=\"dropdown-item\" href=\"";
                // line 39
                yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("translate.switch", ["lang" => CoreExtension::getAttribute($this->env, $this->source, $context["i18n"], "code", [], "any", false, false, false, 39)]), "html", null, true);
                yield "\">
                                            ";
                // line 40
                yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["i18n"], "name", [], "any", false, false, false, 40), "html", null, true);
                yield "
                                        </a>
                                    </li>
                                ";
            }
            // line 44
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i18n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        yield "                        </ul>
                    </div>
                </div>
                <div class=\"col-6\">
                    ";
        // line 49
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "user", [], "any", false, false, false, 49)) {
            // line 50
            yield "
                        <div class=\"dropdown text-end\">
                            <a href=\"#\" class=\"d-block link-dark text-decoration-none dropdown-toggle\" id=\"dropdownUser1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <img src=\"";
            // line 53
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "user", [], "any", false, false, false, 53), "img_avatar", [], "any", false, false, false, 53), "html", null, true);
            yield "\" alt=\"mdo\" width=\"32\" height=\"32\" class=\"rounded-circle\">
                            </a>
                            <ul class=\"dropdown-menu text-small\" aria-labelledby=\"dropdownUser1\">
                                <li>
                                    <a class=\"dropdown-item\" href=\"#\">
                                        ";
            // line 58
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["auth"] ?? null), "user", [], "any", false, false, false, 58), "first_name", [], "any", false, false, false, 58), "html", null, true);
            yield "
                                    </a>
                                </li>
                                <li>
                                    <hr class=\"dropdown-divider\">
                                </li>
                                <li>
                                    <a class=\"dropdown-item\" href=\"#\">
                                        Settings
                                    </a>
                                </li>
                                <li><a class=\"dropdown-item\" href=\"#\">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class=\"dropdown-divider\">
                                </li>
                                <li>
                                    <a href=\"";
            // line 77
            yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-out"), "html", null, true);
            yield "\" class=\"dropdown-item\" type=\"submit\">
                                        Sign out
                                    </a>
                                    <!-- CSRF protection -->
                                    ";
            // line 81
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["csrf"] ?? null), "field", [], "any", false, false, false, 81);
            yield "
                                </li>
                            </ul>
                        </div>

                    ";
        } else {
            // line 87
            yield "
                        <div class=\"col-md-3 text-end\">
                            <a href=\"";
            // line 89
            yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("auth.sign-in"), "html", null, true);
            yield "\" class=\"btn btn-outline-primary me-2\">
                                Login
                            </a>
";
            // line 95
            yield "                        </div>

                    ";
        }
        // line 98
        yield "                </div>
            </div>
        </div>
    </div>
</header>

";
        // line 110
        yield "
";
        // line 117
        yield "
";
        // line 121
        yield "
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/home/_partials/header.twig";
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
        return array (  201 => 121,  198 => 117,  195 => 110,  187 => 98,  182 => 95,  176 => 89,  172 => 87,  163 => 81,  156 => 77,  134 => 58,  126 => 53,  121 => 50,  119 => 49,  113 => 45,  107 => 44,  100 => 40,  96 => 39,  93 => 38,  90 => 37,  86 => 36,  69 => 21,  61 => 16,  58 => 15,  56 => 14,  49 => 10,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header class=\"p-3 mb-3 border-bottom\">
    <div class=\"container\">
        <div class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start\">
            <a href=\"/\" class=\"d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none\">
                <svg class=\"bi me-2\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"></use></svg>
            </a>

            <ul class=\"nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0\">
                <li>
                    <a href=\"{{ path_for('home') }}\" class=\"nav-link px-2 link-secondary\">
                        Home
                    </a>
                </li>
                {% if auth.user %}
                    <li>
                        <a href=\"{{ path_for('dashboard.overview') }}\" class=\"nav-link px-2 link-dark\">
                            Dashboard
                        </a>
                    </li>
                {% endif %}
            </ul>

            <form class=\"col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3\">
                <input type=\"search\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Search\">
            </form>

            <div class=\"row\">
                <div class=\"col-6\">
                    <div class=\"dropdown text-end\">
                        <a href=\"#\" class=\"d-block link-dark text-decoration-none dropdown-toggle\" id=\"locale\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                    <span class=\"material-icons\" style=\"vertical-align: middle\">
                        &#xE8E2;
                    </span>
                        </a>
                        <ul class=\"dropdown-menu text-small\" aria-labelledby=\"locale\">
                            {% for i18n in locales %}
                                {% if locale() != i18n.code %}
                                    <li>
                                        <a class=\"dropdown-item\" href=\"{{ path_for('translate.switch', {lang: i18n.code}) }}\">
                                            {{ i18n.name }}
                                        </a>
                                    </li>
                                {% endif %}
                            {% endfor %}
                        </ul>
                    </div>
                </div>
                <div class=\"col-6\">
                    {% if auth.user %}

                        <div class=\"dropdown text-end\">
                            <a href=\"#\" class=\"d-block link-dark text-decoration-none dropdown-toggle\" id=\"dropdownUser1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                <img src=\"{{ auth.user.img_avatar }}\" alt=\"mdo\" width=\"32\" height=\"32\" class=\"rounded-circle\">
                            </a>
                            <ul class=\"dropdown-menu text-small\" aria-labelledby=\"dropdownUser1\">
                                <li>
                                    <a class=\"dropdown-item\" href=\"#\">
                                        {{ auth.user.first_name }}
                                    </a>
                                </li>
                                <li>
                                    <hr class=\"dropdown-divider\">
                                </li>
                                <li>
                                    <a class=\"dropdown-item\" href=\"#\">
                                        Settings
                                    </a>
                                </li>
                                <li><a class=\"dropdown-item\" href=\"#\">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class=\"dropdown-divider\">
                                </li>
                                <li>
                                    <a href=\"{{ path_for('auth.sign-out') }}\" class=\"dropdown-item\" type=\"submit\">
                                        Sign out
                                    </a>
                                    <!-- CSRF protection -->
                                    {{ csrf.field | raw }}
                                </li>
                            </ul>
                        </div>

                    {% else %}

                        <div class=\"col-md-3 text-end\">
                            <a href=\"{{ path_for('auth.sign-in') }}\" class=\"btn btn-outline-primary me-2\">
                                Login
                            </a>
{#                            <a href=\"{{ path_for('auth.sign-up') }}\" class=\"btn btn-primary\">#}
{#                                Sign-up#}
{#                            </a>#}
                        </div>

                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</header>

{#<header class=\"p-3 mb-3 border-bottom\">#}
{#    <div class=\"container\">#}
{#        <div class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start\">#}
{#            <a href=\"/\" class=\"d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none\">#}
{#                <svg class=\"bi me-2\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"></use></svg>#}
{#            </a>#}

{#            <ul class=\"nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0\">#}
{#                <li><a href=\"#\" class=\"nav-link px-2 link-secondary\">Overview</a></li>#}
{#                <li><a href=\"#\" class=\"nav-link px-2 link-dark\">Inventory</a></li>#}
{#                <li><a href=\"#\" class=\"nav-link px-2 link-dark\">Customers</a></li>#}
{#                <li><a href=\"#\" class=\"nav-link px-2 link-dark\">Products</a></li>#}
{#            </ul>#}

{#            <form class=\"col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3\">#}
{#                <input type=\"search\" class=\"form-control\" placeholder=\"Search...\" aria-label=\"Search\">#}
{#            </form>#}

{#            <div class=\"dropdown text-end\">#}
{#                <a href=\"#\" class=\"d-block link-dark text-decoration-none dropdown-toggle\" id=\"dropdownUser1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">#}
{#                    <img src=\"https://github.com/mdo.png\" alt=\"mdo\" width=\"32\" height=\"32\" class=\"rounded-circle\">#}
{#                </a>#}
{#                <ul class=\"dropdown-menu text-small\" aria-labelledby=\"dropdownUser1\">#}
{#                    <li><a class=\"dropdown-item\" href=\"#\">New project...</a></li>#}
{#                    <li><a class=\"dropdown-item\" href=\"#\">Settings</a></li>#}
{#                    <li><a class=\"dropdown-item\" href=\"#\">Profile</a></li>#}
{#                    <li><hr class=\"dropdown-divider\"></li>#}
{#                    <li><a class=\"dropdown-item\" href=\"#\">Sign out</a></li>#}
{#                </ul>#}
{#            </div>#}
{#        </div>#}
{#    </div>#}
{#</header>#}", "/home/_partials/header.twig", "/var/www/tune-trafikskole.dk/portfolio/src/views/home/_partials/header.twig");
    }
}
