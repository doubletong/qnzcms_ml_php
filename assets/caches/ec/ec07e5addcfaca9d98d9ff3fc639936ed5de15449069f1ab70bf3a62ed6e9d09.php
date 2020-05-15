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

/* join/index.html */
class __TwigTemplate_495618c9a999ee78b7009325975dcaa777ae42169a185352272c8032acdac276 extends Template
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
        $this->parent = $this->loadTemplate("shared/layout.html", "join/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
 ";
        // line 3
        if (twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "title", [], "any", false, false, false, 3)) {
            // line 4
            echo "     ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "title", [], "any", false, false, false, 4), "html", null, true);
            echo "
 ";
        } else {
            // line 6
            echo "    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "title", [], "any", false, false, false, 6), "html", null, true);
            echo "
 ";
        }
        // line 8
        echo "
";
    }

    // line 10
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "  
    <meta name=\"keywords\" content=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "keywords", [], "any", false, false, false, 12), "html", null, true);
        echo "\">
    <meta name=\"description\" content=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "description", [], "any", false, false, false, 13), "html", null, true);
        echo "\">
";
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "    <div class=\"banner banner-about wow fadeInUp\" style=\"background-image:url('/assets/img/temp/banner-join.jpg')\"> </div>
    ";
        // line 17
        echo twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, false, 17);
        echo "        

";
    }

    public function getTemplateName()
    {
        return "join/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 17,  96 => 16,  92 => 15,  86 => 13,  82 => 12,  77 => 11,  73 => 10,  68 => 8,  62 => 6,  56 => 4,  54 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "join/index.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\join\\index.html");
    }
}