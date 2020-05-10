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

/* products/detail.html */
class __TwigTemplate_61da9dc58a927fe345374d018ba87b43e9cb356e83edae06f58d31c785f51df9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "shared/layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("shared/layout.html", "products/detail.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
  ";
        // line 4
        if (twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "title", [], "any", false, false, false, 4)) {
            // line 5
            echo "    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "title", [], "any", false, false, false, 5), "html", null, true);
            echo "
  ";
        } else {
            // line 7
            echo "    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
            echo "
  ";
        }
        // line 9
        echo "   
";
    }

    // line 12
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "    
    <meta name=\"keywords\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "keywords", [], "any", false, false, false, 14), "html", null, true);
        echo "\">
    <meta name=\"description\" content=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "description", [], "any", false, false, false, 15), "html", null, true);
        echo "\">
";
    }

    // line 19
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "     

<div class=\"page-product-detail\">
  <section class=\"s1 container\">
    ";
        // line 24
        echo twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "content", [], "any", false, false, false, 24);
        echo "
  </section>
</div>

";
    }

    // line 30
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "  <script>
    \$(\".mainav li:nth-of-type(2) a,.mobilenav li:nth-of-type(2) a\").addClass(\"active\");
  </script>
";
    }

    public function getTemplateName()
    {
        return "products/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 31,  113 => 30,  104 => 24,  98 => 20,  94 => 19,  88 => 15,  84 => 14,  79 => 13,  75 => 12,  70 => 9,  64 => 7,  58 => 5,  56 => 4,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "products/detail.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\products\\detail.html");
    }
}
