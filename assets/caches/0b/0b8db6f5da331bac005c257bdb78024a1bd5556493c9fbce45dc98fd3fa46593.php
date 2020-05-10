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

/* news/index.html */
class __TwigTemplate_f08ac077e8ccb51757567081c5d3c5120298849e38a5a1a138bb9523c252ae9c extends Template
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
        $this->parent = $this->loadTemplate("shared/layout.html", "news/index.html", 1);
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
            echo "    新闻动态
  ";
        }
        // line 9
        echo "   
";
    }

    // line 11
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "  
    <meta name=\"keywords\" content=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "keywords", [], "any", false, false, false, 13), "html", null, true);
        echo "\">
    <meta name=\"description\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "description", [], "any", false, false, false, 14), "html", null, true);
        echo "\">  
 
    <link rel=\"stylesheet\" href=\"/assets/js/vendor/swiper/css/swiper.min.css\">
";
    }

    // line 18
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 19
        echo "  
<section class=\"sliders sliders-news swiper-container wow fadeInUp\">
    <div class=\"swiper-wrapper\">
      <div class=\"swiper-slide\" style=\"background-image:url(/assets/img/temp/slider_n01.jpg);\">
        <div class=\"container txt-news\">             <img src=\"/assets/img/temp/slider_n01_1.png\" alt=\"\"></div>
      </div>
      <div class=\"swiper-slide\" style=\"background-image:url(/assets/img/temp/slider_n01.jpg);\">
        <div class=\"container txt-news\">                <img src=\"/assets/img/temp/slider_n01_1.png\" alt=\"\"></div>
      </div>
      <div class=\"swiper-slide\" style=\"background-image:url(/assets/img/temp/slider_n01.jpg);\">
        <div class=\"container txt-news\">               <img src=\"/assets/img/temp/slider_n01_1.png\" alt=\"\"></div>
      </div>
    </div>
    <div class=\"swiper-pagination\"></div>
  </section>


  <div class=\"page page-news\">    
    <section class=\"s1 container\">
      <div class=\"row newslist\">

        ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["news"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            echo "            
            <div class=\"col-4\">
                <div class=\"item\"><a class=\"pic wow fadeInUp\" href=\"/news/detail-";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 42), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "thumbnail", [], "any", false, false, false, 42), "html", null, true);
            echo "\"></a>
                  <time class=\"wow fadeInUp\">
                    ";
            // line 44
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "pubdate", [], "any", false, false, false, 44), "j. F Y"), "html", null, true);
            echo "</time>
                  <h3 class=\"title wow fadeInUp\"><a href=\"/news/detail-";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 45), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 45), "html", null, true);
            echo "</a></h3>
                  <p class=\"des wow fadeInUp\">";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, false, 46), "html", null, true);
            echo "</p>
                </div>
              </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "   

       
      </div>
    </section>
    <footer class=\"blog-footer\">      
        ";
        // line 55
        if (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "numPages", [], "any", false, false, false, 55), 1)) {
            // line 56
            echo "        <ul class=\"pagination\">
            ";
            // line 57
            if (twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "prevUrl", [], "any", false, false, false, 57)) {
                // line 58
                echo "                <li class=\"page-item\"><a class=\"page-link\" href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "prevUrl", [], "any", false, false, false, 58), "html", null, true);
                echo "\">&laquo;</a></li>
            ";
            }
            // line 60
            echo "
            ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "pages", [], "any", false, false, false, 61));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 62
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 62)) {
                    // line 63
                    echo "                    <li ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page"], "isCurrent", [], "any", false, false, false, 63)) ? ("class=\"page-item active\"") : ("page-item"));
                    echo "><a class=\"page-link\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "url", [], "any", false, false, false, 63), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "num", [], "any", false, false, false, 63), "html", null, true);
                    echo "</a></li>
                ";
                } else {
                    // line 65
                    echo "                    <li class=\"page-item disabled\"><span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "num", [], "any", false, false, false, 65), "html", null, true);
                    echo "</span></li>
                ";
                }
                // line 67
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "
            ";
            // line 69
            if (twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "nextUrl", [], "any", false, false, false, 69)) {
                // line 70
                echo "                <li class=\"page-item\"><a class=\"page-link\" href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["paginator"] ?? null), "nextUrl", [], "any", false, false, false, 70), "html", null, true);
                echo "\">&raquo;</a></li>
            ";
            }
            // line 72
            echo "        </ul>
    ";
        }
        // line 74
        echo "    </footer>
  </div>

  
";
    }

    // line 79
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 80
        echo "<script src=\"/assets/js/vendor/swiper/js/swiper.min.js\"></script>
    <script>
      var swiper = new Swiper('.sliders', {
          pagination: {
              el: '.swiper-pagination',
              clickable: true
          },
          autoplay: {
              delay: 2500,
              disableOnInteraction: false,
          },
          //- navigation: {
          //-     nextEl: '.swiper-button-next',
          //-     prevEl: '.swiper-button-prev',
          //- },
      });
    </script>
";
    }

    public function getTemplateName()
    {
        return "news/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 80,  231 => 79,  223 => 74,  219 => 72,  213 => 70,  211 => 69,  208 => 68,  202 => 67,  196 => 65,  186 => 63,  183 => 62,  179 => 61,  176 => 60,  170 => 58,  168 => 57,  165 => 56,  163 => 55,  155 => 49,  145 => 46,  139 => 45,  135 => 44,  128 => 42,  121 => 40,  98 => 19,  94 => 18,  86 => 14,  82 => 13,  77 => 12,  73 => 11,  68 => 9,  64 => 7,  58 => 5,  56 => 4,  53 => 3,  49 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "news/index.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\news\\index.html");
    }
}
