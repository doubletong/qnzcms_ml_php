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

/* shared/layout.html */
class __TwigTemplate_271ea6542a0c7ab9273c16de1a094d26d4e5d90379f68836c4a185aa133dd40a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html class=\"no-js\" lang=\"zh-CN\">
<head>
  ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 23
        echo "</head>
<body>
    ";
        // line 25
        echo twig_include($this->env, $context, "shared/header.html");
        echo "

    ";
        // line 27
        $this->displayBlock('content', $context, $blocks);
        // line 28
        echo "
    ";
        // line 29
        echo twig_include($this->env, $context, "shared/footer.html");
        echo "
    <script src=\"/assets/js/vendor/modernizr-3.7.1.min.js\"></script>
    <script src=\"/assets/js/lib/jquery-1.12.4.min.js\"></script>
    <script src=\"/assets/js/vendor/wow/dist/wow.min.js\"></script>
    <script src=\"/assets/js/app.js\"></script>

    ";
        // line 35
        $this->displayBlock('footer', $context, $blocks);
        // line 36
        echo "</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
  <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "sitename", [], "any", false, false, false, 8), "html", null, true);
        echo "</title>

  <link rel=\"manifest\" href=\"site.webmanifest\">
  <link rel=\"apple-touch-icon\" href=\"icon.png\">
  <meta name=\"theme-color\" content=\"#fafafa\">

  <!-- CSS, you gotta have style -->
  <link href=\"/assets/fonts/iconfont.css\" rel=\"stylesheet\">  
  <link rel=\"stylesheet\" href=\"/assets/js/vendor/wow/css/libs/animate.css\">
  <link rel=\"stylesheet\" href=\"/assets/css/styles.css?v=20190414\">
    <script src=\"/assets/js/vendor/wow/dist/wow.min.js\"></script>
    <script>
      new WOW().init(); 
    </script>
  ";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 35
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "shared/layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 35,  113 => 27,  87 => 8,  82 => 5,  78 => 4,  73 => 36,  71 => 35,  62 => 29,  59 => 28,  57 => 27,  52 => 25,  48 => 23,  46 => 4,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "shared/layout.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\shared\\layout.html");
    }
}
