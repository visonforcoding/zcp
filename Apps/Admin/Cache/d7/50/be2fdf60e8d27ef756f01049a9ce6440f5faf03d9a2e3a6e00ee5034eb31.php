<?php

/* index.twig */
class __TwigTemplate_d750be2fdf60e8d27ef756f01049a9ce6440f5faf03d9a2e3a6e00ee5034eb31 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>";
        echo twig_escape_filter($this->env, (isset($context["the"]) ? $context["the"] : null), "html", null, true);
        echo "</h1>";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
