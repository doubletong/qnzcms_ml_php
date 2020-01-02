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

/* shared/layoutForHome.html */
class __TwigTemplate_a2955f9386ca336c4fba5f19a3b01ee8104ae34719d3d158c283aa6ee906175b extends Template
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
        // line 20
        echo "</head>
<body>
    ";
        // line 22
        echo twig_include($this->env, $context, "shared/header.html");
        echo "

    ";
        // line 24
        $this->displayBlock('content', $context, $blocks);
        // line 25
        echo "    
    <script src=\"/assets/js/vendor/modernizr-3.7.1.min.js\"></script>
    <script src=\"/assets/js/lib/jquery-1.12.4.min.js\"></script>
    <script src=\"/assets/js/vendor/wow/dist/wow.min.js\"></script>
    <script src=\"/assets/js/app.js\"></script>

    ";
        // line 31
        $this->displayBlock('footer', $context, $blocks);
        // line 32
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
        echo "</title>

  <link rel=\"manifest\" href=\"site.webmanifest\">
  <link rel=\"apple-touch-icon\" href=\"icon.png\">
  <meta name=\"theme-color\" content=\"#fafafa\">

  <!-- CSS, you gotta have style -->
  <link href=\"/assets/fonts/iconfont.css\" rel=\"stylesheet\">  
  <link rel=\"stylesheet\" href=\"/assets/js/vendor/wow/css/libs/animate.css\">
  <link rel=\"stylesheet\" href=\"/assets/css/styles.css?v=20190414\">

  ";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 24
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 31
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "shared/layoutForHome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 31,  104 => 24,  83 => 8,  78 => 5,  74 => 4,  69 => 32,  67 => 31,  59 => 25,  57 => 24,  52 => 22,  48 => 20,  46 => 4,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "shared/layoutForHome.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\shared\\layoutForHome.html");
    }
}
