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

/* index.html */
class __TwigTemplate_a6cb3979bc684c9130a4437e97e36b6930f9a569bd0ac68d0cb4facdc1b30676 extends Template
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
        // line 2
        return "shared/layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("shared/layout.html", "index.html", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "首页";
    }

    // line 5
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
 
    <link rel=\"stylesheet\" href=\"/assets/js/vendor/swiper/css/swiper.min.css\">
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "
<section class=\"sliders swiper-container wow fadeInUp\">
  <div class=\"swiper-wrapper\">
  ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["carousels"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 15
            echo "    <div class=\"swiper-slide\" style=\"background-image:url(";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "image_url", [], "any", false, false, false, 15), "html", null, true);
            echo ");\"></div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "  </div>
  <div class=\"swiper-pagination\"></div>
</section>
 <div class=\"page-home\">        
      <section class=\"s1\">           
        <div class=\"title\"> 
          <h2 class=\"wow fadeInLeft\">非我产品</h2>
          <h3 class=\"wow fadeInRight\">PRODUCTS</h3>
        </div>
        <div class=\"pic01 wow slideInLeft\"><img src=\"/assets/img/home_s1_01.jpg\" alt=\"\">
          <p>JVE 001</p>
        </div>
        <div class=\"pic02 wow slideInRight\"><img src=\"/assets/img/home_s1_03.png\" alt=\"\">
          <p>JVE 002</p>
        </div>
        <div class=\"pic03 wow fadeInUp\"><img src=\"/assets/img/home_s1_02.jpg\" alt=\"\">
          <p>JVE 003</p>
        </div>
        <div class=\"pic04 wow slideInLeft\"><img src=\"/assets/img/home_logo.png\" alt=\"\"></div>
      </section>
      <section class=\"s2\">
        <div class=\"pic wow fadeInRight\"><img src=\"/assets/img/s2_01.png\" alt=\"\"></div>
        <div class=\"txt wow fadeInLeft\">在别人眼中也许毫无意义，<br>但每次尝试都更激发我的动力，<br>why not？
          <h3>just love！</h3>
        </div>
      </section>
      <section class=\"s2_odd\">
        <div class=\"pic wow fadeInLeft\"><img src=\"/assets/img/s2_02.jpg\" alt=\"\"></div>
        <div class=\"txt wow fadeInRight\">在无数被质疑的路上特立独行，<br>但没有喝彩的时候头脑更加清晰，<br>why not？
          <h3>just love！</h3>
        </div>
      </section>
      <section class=\"s2\">
        <div class=\"pic wow fadeInRight\"><img src=\"/assets/img/s2_01.png\" alt=\"\"></div>
        <div class=\"txt wow fadeInLeft\">圆滑世故或许永远学不会，<br>但攻克专业难题我从不喊累，<br>why not？
          <h3>just love！</h3>
        </div>
      </section>
    </div>


  
  
";
    }

    // line 62
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 63
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
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 63,  138 => 62,  91 => 17,  82 => 15,  78 => 14,  73 => 11,  69 => 10,  60 => 6,  56 => 5,  49 => 4,  38 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\index.html");
    }
}
