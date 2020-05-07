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
class __TwigTemplate_c2572e095e288d6b23888cc7c787701c532ec3a99819aff38e308fcfc831f334 extends Template
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
  <div class=\"topcol\"><img src=\"/assets/img/warning.png\" alt=\"本产品含有尼古丁，未成年人禁止购买及使用\"></div>
  <div class=\"mainavlogo\">
    <div class=\"row align-items-center\">
      <div class=\"col-auto\"><a class=\"logo\" href=\"/\"><img id=\"logo\" src=\"/assets/img/logo.png\" alt=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "sitename", [], "any", false, false, false, 5), "html", null, true);
        echo "\"></a></div>
      <div class=\"col\">
        <ul class=\"mainav\">
          ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 9
            echo "          <li class=\"";
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 9))) ? ("hasnav") : (""));
            echo " \">
              <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 10), "html", null, true);
            echo "\" class=\"";
            echo ((((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 10), "/") && (is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["uri"] ?? null)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 10)) && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 10), ($context["uri"] ?? null)))) ? ("active") : (""));
            echo "\" data-id=\"nav";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "id", [], "any", false, false, false, 10), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "title", [], "any", false, false, false, 10), "html", null, true);
            echo "</a>
              ";
            // line 11
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 11))) {
                // line 12
                echo "              <ul class=\"subnav\">
                  ";
                // line 13
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 13));
                foreach ($context['_seq'] as $context["_key"] => $context["subnav"]) {
                    // line 14
                    echo "                      <li><a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["subnav"], "url", [], "any", false, false, false, 14), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["subnav"], "title", [], "any", false, false, false, 14), "html", null, true);
                    echo "</a></li>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subnav'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 16
                echo "                  </ul>
              ";
            }
            // line 18
            echo "          </li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "          
        </ul>
      </div>
      <div class=\"col-auto mobilemenu\">
        <div class=\"menu-toggle\">
          <div class=\"one\"></div>
          <div class=\"two\"></div>
          <div class=\"three\"></div>
        </div>
      </div>
    </div>
  </div>
  <div class=\"menu-over\" id=\"overmenu\">
    <ul class=\"mobilenav\">
      ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
            // line 34
            echo "          <li class=\"";
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 34))) ? ("hasnav") : (""));
            echo " \">
              <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 35), "html", null, true);
            echo "\" class=\"";
            echo ((((0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 35), "/") && (is_string($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["uri"] ?? null)) && is_string($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 35)) && ('' === $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 || 0 === strpos($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b, $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002)))) || 0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["menu"], "url", [], "any", false, false, false, 35), ($context["uri"] ?? null)))) ? ("active") : (""));
            echo "\" data-id=\"nav";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "id", [], "any", false, false, false, 35), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["menu"], "title", [], "any", false, false, false, 35), "html", null, true);
            echo " </a>
              ";
            // line 36
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 36))) {
                // line 37
                echo "              <ul class=\"subnav\">
                  ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["menu"], "children", [], "any", false, false, false, 38));
                foreach ($context['_seq'] as $context["_key"] => $context["subnav"]) {
                    // line 39
                    echo "                      <li><a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["subnav"], "url", [], "any", false, false, false, 39), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["subnav"], "title", [], "any", false, false, false, 39), "html", null, true);
                    echo "</a></li>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subnav'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "                  </ul>
              ";
            }
            // line 43
            echo "          </li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "  
    </ul>
  </div>
</header>


";
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
        return array (  165 => 44,  158 => 43,  154 => 41,  143 => 39,  139 => 38,  136 => 37,  134 => 36,  124 => 35,  119 => 34,  115 => 33,  99 => 19,  92 => 18,  88 => 16,  77 => 14,  73 => 13,  70 => 12,  68 => 11,  58 => 10,  53 => 9,  49 => 8,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "shared/header.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\shared\\header.html");
    }
}
