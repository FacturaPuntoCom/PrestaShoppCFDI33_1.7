<?php

/* PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig */
class __TwigTemplate_e6ec461518c63a75d1bb58638dd8b2c8725b8b44963d10c777e3c8047051981b extends Twig_Template
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
        // line 25
        list($context["url"], $context["priceRaw"], $context["priceDisplay"], $context["url_active"], $context["urls"], $context["name"]) =         array($this->getAttribute($this->getAttribute(        // line 26
($context["module"] ?? null), "attributes", array()), "url", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
($context["module"] ?? null), "attributes", array()), "price", array()), "raw", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 28
($context["module"] ?? null), "attributes", array()), "price", array()), "displayPrice", array()), $this->getAttribute($this->getAttribute(        // line 29
($context["module"] ?? null), "attributes", array()), "url_active", array()), $this->getAttribute($this->getAttribute(        // line 30
($context["module"] ?? null), "attributes", array()), "urls", array()), $this->getAttribute($this->getAttribute(        // line 31
($context["module"] ?? null), "attributes", array()), "name", array()));
        // line 33
        echo "
<div class=\"pull-right btn-group\">
  ";
        // line 35
        if ((($context["level"] ?? null) > twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_READ"))) {
            // line 36
            echo "    ";
            if ((($context["url_active"] ?? null) == "buy")) {
                // line 37
                echo "      <a class=\"btn pull-left btn-primary btn-primary-reverse btn-primary-outline light-button module_action_menu_go_to_addons\" href=\"";
                echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                echo "\" target=\"_blank\">
        ";
                // line 38
                if ((($context["priceRaw"] ?? null) != "0.00")) {
                    echo twig_escape_filter($this->env, ($context["priceDisplay"] ?? null), "html", null, true);
                    echo "
        ";
                } else {
                    // line 39
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Discover", array(), "Admin.Modules.Feature"), "html", null, true);
                }
                // line 40
                echo "      </a>
    ";
            } else {
                // line 42
                echo "      <form class=\"btn-group\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["urls"] ?? null), ($context["url_active"] ?? null), array(), "array"), "html", null, true);
                echo "\">
        <button type=\"submit\" class=\"btn btn-primary-reverse btn-primary-outline light-button module_action_menu_";
                // line 43
                echo twig_escape_filter($this->env, ($context["url_active"] ?? null), "html", null, true);
                echo "\"
           data-confirm_modal=\"module-modal-confirm-";
                // line 44
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, ($context["url_active"] ?? null), "html", null, true);
                echo "\" ";
                if (((($context["level"] ?? null) < twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_UPDATE")) || ((($context["level"] ?? null) < twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_DELETE")) && !twig_in_filter(($context["url_active"] ?? null), array(0 => "configure", 1 => "install", 2 => "upgrade"))))) {
                    echo " disabled=\"disabled\" ";
                }
                echo ">
            ";
                // line 45
                echo twig_escape_filter($this->env, twig_replace_filter(twig_capitalize_string_filter($this->env, ($context["url_active"] ?? null)), array("_" => " ")), "html", null, true);
                echo "
        </button>
        ";
                // line 47
                if ((twig_length_filter($this->env, ($context["urls"] ?? null)) > 1)) {
                    // line 48
                    echo "        <input type=\"hidden\" class=\"btn\">
        ";
                }
                // line 50
                echo "      </form>
      ";
                // line 51
                if ((twig_length_filter($this->env, ($context["urls"] ?? null)) > 1)) {
                    // line 52
                    echo "        ";
                    if (((($context["level"] ?? null) > twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_CREATE")) || ((twig_in_filter("configure", twig_get_array_keys_filter(($context["urls"] ?? null))) && twig_in_filter("upgrade", twig_get_array_keys_filter(($context["urls"] ?? null)))) && twig_in_filter(($context["url_active"] ?? null), array(0 => "configure", 1 => "install", 2 => "upgrade"))))) {
                        // line 53
                        echo "            <button type=\"button\" class=\"btn btn-primary-outline  dropdown-toggle light-button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
              <span class=\"caret\"></span>
              <span class=\"sr-only\">";
                        // line 55
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Toggle Dropdown", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "</span>
            </button>
            <div class=\"dropdown-menu\">
              ";
                        // line 58
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["urls"] ?? null));
                        foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                            // line 59
                            echo "                ";
                            if (($context["module_action"] != ($context["url_active"] ?? null))) {
                                // line 60
                                echo "                  ";
                                if (((($context["level"] ?? null) >= twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_DELETE")) || ((($context["level"] ?? null) < twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_DELETE")) && twig_in_filter($context["module_action"], array(0 => "configure", 1 => "install", 2 => "upgrade"))))) {
                                    // line 61
                                    echo "                    <li>
                      <form method=\"post\" action=\"";
                                    // line 62
                                    echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                                    echo "\">
                        <button type=\"submit\" class=\"dropdown-item module_action_menu_";
                                    // line 63
                                    echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                                    echo "\" data-confirm_modal=\"module-modal-confirm-";
                                    echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                                    echo "-";
                                    echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                                    echo "\">
                          ";
                                    // line 64
                                    echo twig_escape_filter($this->env, twig_replace_filter(twig_capitalize_string_filter($this->env, $context["module_action"]), array("_" => " ")), "html", null, true);
                                    echo "
                        </button>
                      </form>
                    </li>
                  ";
                                }
                                // line 69
                                echo "                ";
                            }
                            // line 70
                            echo "              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 71
                        echo "            </div>
        ";
                    }
                    // line 73
                    echo "      ";
                }
                // line 74
                echo "    ";
            }
            // line 75
            echo "  ";
        }
        // line 76
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 76,  154 => 75,  151 => 74,  148 => 73,  144 => 71,  138 => 70,  135 => 69,  127 => 64,  119 => 63,  115 => 62,  112 => 61,  109 => 60,  106 => 59,  102 => 58,  96 => 55,  92 => 53,  89 => 52,  87 => 51,  84 => 50,  80 => 48,  78 => 47,  73 => 45,  63 => 44,  59 => 43,  54 => 42,  50 => 40,  47 => 39,  41 => 38,  36 => 37,  33 => 36,  31 => 35,  27 => 33,  25 => 31,  24 => 30,  23 => 29,  22 => 28,  21 => 27,  20 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/action_menu.html.twig");
    }
}
