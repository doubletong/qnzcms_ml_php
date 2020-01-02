<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* shared/header.html */
class __TwigTemplate_2a88317fde7eab0894eb6e0baf29c5dbc3eaa05ba0f1bfb86852edd7a19dcd23 extends Template
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
        echo "<header class=\"site-header\" id=\"site-header\">
    <div class=\"container-fluid\">   
            <div class=\"row align-items-center\">
                <div class=\"col-auto\">
                    <a href=\"/\" class=\"logo\"><img id=\"logo\" src=\"/assets/img/logo.png\" alt=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "sitename", [], "any", false, false, false, 5), "html", null, true);
        echo "\"></a>
                </div>
                <div class=\"col\">
                    <div class=\"topnav\">
                        <a href=\"/jobs\">招贤纳士</a>
                        <a href=\"#\">商务入口</a>
                        <a href=\"#\">简体中文</a>
                    </div>
              
                    <ul class=\"mainav\" id=\"mainav\">
                        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 16
            echo "                            <li class=\"";
            echo (((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 16), "/") && (is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["uri"] ?? null)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 16)) && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144))))) ? ("active") : (""));
            echo "\">
                                <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 17), "html", null, true);
            echo "\" class=\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 17)) ? ("down") : (""));
            echo "\" data-id=\"nav";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "id", [], "any", false, false, false, 17), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "title", [], "any", false, false, false, 17), "html", null, true);
            echo "</a>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                        <li class=\"last\"><a href=\"/search\"><i class=\"iconfont icon-search\"></i></a></li>
                    </ul>

                </div>
                <!-- <div class=\"col-auto searchicon\">
                    <a href=\"/search\"><i class=\"iconfont icon-search\"></i></a>
                </div>
              
                <div class=\"col-auto menu-col\">
                    <div class=\"menu-toggle\">
                        <div class=\"one\"></div>
                        <div class=\"two\"></div>
                        <div class=\"three\"></div>
                    </div>
                </div> -->
            </div>
        </div>
</header>";
    }

    public function getTemplateName()
    {
        return "shared/header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 20,  65 => 17,  60 => 16,  56 => 15,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "shared/header.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\shared\\header.html");
    }
}
