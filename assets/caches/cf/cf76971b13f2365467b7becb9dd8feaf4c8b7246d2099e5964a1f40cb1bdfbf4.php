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

/* shared/footer.html */
class __TwigTemplate_905f03cdd397040c5691038d699df7b1ad3481f13f4367469963e071d1aed033 extends Template
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
        echo "<footer class=\"site-footer\" id=\"pagefooter\">
  <div class=\"footer_top\">
    <div class=\"row no-gutters align-items-center wow fadeInUp\">
      <div class=\"col-xl-auto\">
        <div class=\"item company_name\">
          <h3>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "company", [], "any", false, false, false, 6), "html", null, true);
        echo "</h3>
          <p>ShenZhen JVE Technology Co.,Ltd</p>
        </div>
      </div>
      <div class=\"col-xl\">
        <div class=\"row no-gutters contact\">
          <div class=\"col-md\">
            <div class=\"item\">
              <div class=\"icon\" style=\"background-image:url('/assets/img/phone.png')\"></div>
              <p>";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "phone", [], "any", false, false, false, 15), "html", null, true);
        echo "</p>
            </div>
          </div>
          <div class=\"col-md\">
            <div class=\"item add\">
              <div class=\"icon\" style=\"background-image:url('/assets/img/marker.png')\">                     </div>
              <p>";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "address", [], "any", false, false, false, 21), "html", null, true);
        echo "</p>
            </div>
          </div>
          <div class=\"col-md\">
            <div class=\"item\">
              <div class=\"icon\" style=\"background-image:url('/assets/img/email.png')\">                   </div>
              <p>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "email", [], "any", false, false, false, 27), "html", null, true);
        echo "</p>
            </div>
          </div>
          <div class=\"col-md\">
            <div class=\"item\"> 
              <nav class=\"social\"><a href=\"#\"><i class=\"iconfont icon-wechat\"></i></a><a href=\"#\"><i class=\"iconfont icon-sina\"></i></a><a href=\"#\"><i class=\"iconfont icon-user\"></i></a></nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class=\"copyright wow fadeInUp\">Copyright &copy; 2019 JVE All rights reserved.  <a href=\"http://www.beian.miit.gov.cn/\">";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["site"] ?? null), "webnumber", [], "any", false, false, false, 39), "html", null, true);
        echo "</a></div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "shared/footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 39,  74 => 27,  65 => 21,  56 => 15,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "shared/footer.html", "G:\\PhpWorkSpace\\TZGCMS_PHP\\assets\\templates\\shared\\footer.html");
    }
}
