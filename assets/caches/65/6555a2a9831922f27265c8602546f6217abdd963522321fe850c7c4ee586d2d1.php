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

/* news/detail.html */
class __TwigTemplate_9b6db966bc19bc310c583feedd21524945229a44f5c0611316e88f93efb121af extends Template
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
        $this->parent = $this->loadTemplate("shared/layout.html", "news/detail.html", 1);
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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "title", [], "any", false, false, false, 7), "html", null, true);
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

<div class=\"page-news-detail\">
    <div class=\"top_pic wow fadeInUp\" style=\"background-image:url('/assets/img/temp/banner-news.jpg')\">
      <header>
        <h1 class=\"title-news wow fadeInUp\">";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "title", [], "any", false, false, false, 25), "html", null, true);
        echo "</h1>
        <time class=\"wow fadeInUp\">";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "pubdate", [], "any", false, false, false, 26), "html", null, true);
        echo "</time>
      </header>
    </div>
    <article class=\"container\">
      <main class=\"content wow fadeInUp\">
        ";
        // line 31
        echo twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "content", [], "any", false, false, false, 31);
        echo "
      </main>
      <div class=\"nav-page wow fadeInUp\">
        <div class=\"row no-gutters\">
          <div class=\"col prev\">
              ";
        // line 36
        if (($context["prevArticle"] ?? null)) {
            // line 37
            echo "              <a id=\"hlPrevious\" href=\"/news/detail-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prevArticle"] ?? null), "id", [], "any", false, false, false, 37), "html", null, true);
            echo "\"><span class=\"t1\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["prevArticle"] ?? null), "title", [], "any", false, false, false, 37), "html", null, true);
            echo "</span><span class=\"t2\">上一篇</span></a>
              ";
        }
        // line 39
        echo "            </div>
          <div class=\"col-auto back\"><a href=\"/news\"><i class=\"iconfont icon-close1line\"></i></a></div>
          <div class=\"col next\">
            ";
        // line 42
        if (($context["nextArticle"] ?? null)) {
            // line 43
            echo "              <a id=\"hlNext\" href=\"/news/detail-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["nextArticle"] ?? null), "id", [], "any", false, false, false, 43), "html", null, true);
            echo "\"><span class=\"t1\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["nextArticle"] ?? null), "title", [], "any", false, false, false, 43), "html", null, true);
            echo "</span><span class=\"t2\">下一篇</span></a>
              ";
        }
        // line 45
        echo "            </div>
        </div>
      </div>
    </article>
  </div>





    
";
    }

    public function getTemplateName()
    {
        return "news/detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 45,  141 => 43,  139 => 42,  134 => 39,  126 => 37,  124 => 36,  116 => 31,  108 => 26,  104 => 25,  97 => 20,  93 => 19,  87 => 15,  83 => 14,  78 => 13,  74 => 12,  69 => 9,  63 => 7,  57 => 5,  55 => 4,  52 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "news/detail.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\news\\detail.html");
    }
}
