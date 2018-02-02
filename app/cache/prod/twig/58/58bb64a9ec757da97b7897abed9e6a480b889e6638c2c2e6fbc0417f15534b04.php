<?php

/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 26);
        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'choice_tree_widget' => array($this, 'block_choice_tree_widget'),
            'choice_tree_item_widget' => array($this, 'block_choice_tree_item_widget'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["categories"] ?? null), array(0 => $this));
        // line 26
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_javascripts($context, array $blocks = array())
    {
        // line 29
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/catalog.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/category-tree.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/jquery/ui/jquery.ui.sortable.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 36
    public function block_choice_tree_widget($context, array $blocks = array())
    {
        // line 37
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        <ul class=\"category-tree\">";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 40
            echo "            ";
            $this->displayBlock("choice_tree_item_widget", $context, $blocks);
            echo "
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "</ul>
    </div>";
    }

    // line 46
    public function block_choice_tree_item_widget($context, array $blocks = array())
    {
        // line 47
        echo "<li>
        ";
        // line 48
        $context["checked"] = ((($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "submitted_values", array(), "any", true, true) && $this->getAttribute(($context["submitted_values"] ?? null), $this->getAttribute(($context["child"] ?? null), "id_category", array()), array(), "array", true, true))) ? ("checked=\"checked\"") : (""));
        // line 49
        echo "
         <div class=\"radio\">
             <label class=\"category-label\" for=\"form[";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "id", array()), "html", null, true);
        echo "][tree]\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "name", array()), "html", null, true);
        echo "
                 <input
                   type=\"radio\"
                   name=\"form[";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "id", array()), "html", null, true);
        echo "][tree]\"
                   value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "id_category", array()), "html", null, true);
        echo "\" ";
        echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
        echo "
                   class=\"category pull-right\"
                 />
             </label>
         </div>

        ";
        // line 61
        if ($this->getAttribute(($context["child"] ?? null), "children", array(), "any", true, true)) {
            // line 62
            echo "            <ul>
                ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["child"] ?? null), "children", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 64
                echo "                    ";
                $context["child"] = $context["item"];
                // line 65
                echo "                    ";
                $this->displayBlock("choice_tree_item_widget", $context, $blocks);
                echo "
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "</ul>
        ";
        }
        // line 69
        echo "    </li>";
    }

    // line 72
    public function block_content($context, array $blocks = array())
    {
        // line 73
        echo "
  <div class=\"products-catalog\">

    ";
        // line 76
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("legacy_block_kpi", array("kpi_controller" => "AdminProductsController"));
        echo "

    <div class=\"content container-fluid\">

      ";
        // line 80
        if (twig_length_filter($this->env, ($context["permission_error"] ?? null))) {
            // line 81
            echo "      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-danger\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            <i class=\"material-icons\">error_outline</i>
            <p>
              ";
            // line 87
            echo twig_escape_filter($this->env, ($context["permission_error"] ?? null), "html", null, true);
            echo "
            </p>
          </div>
        </div>
      </div>
      ";
        }
        // line 93
        echo "
      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"pull-right\">
            <a id=\"desc-product-export\" class=\"list-toolbar-btn\" href=\"";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_export_action");
        echo "\">
              ";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export", array(), "Admin.Actions"), 1 => "cloud_upload"), "method"), "html", null, true);
        echo "
            </a>
            <a id=\"desc-product-import\" class=\"list-toolbar-btn\" href=\"";
        // line 100
        echo twig_escape_filter($this->env, ($context["import_link"] ?? null), "html", null, true);
        echo "\">
              ";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import", array(), "Admin.Actions"), 1 => "cloud_download"), "method"), "html", null, true);
        echo "
            </a>
            <a id=\"desc-product-show-sql\" class=\"list-toolbar-btn\" href=\"javascript:void(0);\" onclick=\"showLastSqlQuery();\">
              ";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show SQL query", array(), "Admin.Actions"), 1 => "code"), "method"), "html", null, true);
        echo "
            </a>
            <a id=\"desc-product-sql-manager\" class=\"list-toolbar-btn\" href=\"javascript:void(0);\" onclick=\"sendLastSqlQuery(createSqlQueryName());\">
              ";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export to SQL Manager", array(), "Admin.Actions"), 1 => "storage"), "method"), "html", null, true);
        echo "
            </a>
          </div>
        </div>
      </div>

      <div class=\"row\">
        <div class=\"col-md-1\">
          <div class=\"checkbox\">
            <label>
              <input
                type=\"checkbox\"
                id=\"bulk_action_select_all\"
                onclick=\"\$('#product_catalog_list').find('table td.checkbox-column input:checkbox').prop('checked', \$(this).prop('checked')); updateBulkMenu();\"
              />
              ";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select all", array(), "Admin.Actions"), "html", null, true);
        echo "
            </label>
          </div>
        </div>

        <div
          class=\"col-md-2\"
          bulkurl=\"";
        // line 129
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_bulk_action", array("action" => "activate_all"));
        echo "\"
          massediturl=\"";
        // line 130
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_mass_edit_action", array("action" => "sort"));
        echo "\"
          redirecturl=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "offset" => ($context["offset"] ?? null), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null))), "html", null, true);
        echo "\"
          redirecturlnextpage=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "offset" => (($context["offset"] ?? null) + ($context["limit"] ?? null)), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null))), "html", null, true);
        echo "\"
        >
          ";
        // line 134
        $context["buttons_action"] = array(0 => array("onclick" => "bulkProductAction(this, 'activate_all');", "icon" => "radio_button_checked", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activate selection", array(), "Admin.Actions")), 1 => array("onclick" => "bulkProductAction(this, 'deactivate_all');", "icon" => "radio_button_unchecked", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivate selection", array(), "Admin.Actions")));
        // line 146
        echo "
          ";
        // line 148
        echo "          ";
        if (($context["is_shop_context"] ?? null)) {
            // line 149
            echo "            ";
            $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), array(0 => array("divider" => true), 1 => array("onclick" => "bulkProductAction(this, 'duplicate_all');", "icon" => "content_copy", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicate selection", array(), "Admin.Actions"))));
            // line 159
            echo "          ";
        }
        // line 160
        echo "
          ";
        // line 161
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), array(0 => array("divider" => true), 1 => array("onclick" => "bulkProductAction(this, 'delete_all');", "icon" => "delete", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete selection", array(), "Admin.Actions"))));
        // line 171
        echo "
          ";
        // line 172
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:dropdown_menu.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 172)->display(array_merge($context, array("div_style" => "btn-group dropup", "button_id" => "product_bulk_menu", "disabled" => true, "menu_label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Bulk actions", array(), "Admin.Global"), "buttonType" => "tertiary-outline", "menu_icon" => "icon-caret-up", "items" =>         // line 179
($context["buttons_action"] ?? null))));
        // line 181
        echo "        </div>
        <div id=\"product_catalog_category_tree_filter\" class=\"pull-right col-md-3\">
          <button
            class=\"btn btn-tertiary-outline\"
            data-toggle=\"collapse\"
            data-target=\"#tree-categories\"
          >
          ";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Filter by categories", array(), "Admin.Actions"), "html", null, true);
        echo "
          <i class=\"material-icons\">expand_more</i>
          </button>
          <div id=\"tree-categories\" class=\"collapse p-t-1\">
            <a
              class=\"categories-tree-actions\"
              href=\"#\"
              name=\"product_catalog_category_tree_filter_expand\"
              onclick=\"productCategoryFilterExpand(\$('div#product_catalog_category_tree_filter'), this);\"
              id=\"product_catalog_category_tree_filter_expand\"
            >
              <i class=\"material-icons\">expand_more</i>
              ";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Expand", array(), "Admin.Actions"), "html", null, true);
        echo "
            </a>
            <a
            class=\"categories-tree-actions\"
              href=\"#\"
              name=\"product_catalog_category_tree_filter_collapse\"
              onclick=\"productCategoryFilterCollapse(\$('div#product_catalog_category_tree_filter'), this);\"
              id=\"product_catalog_category_tree_filter_collapse\"
            >
              <i class=\"material-icons\">expand_less</i>
              ";
        // line 210
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Collapse", array(), "Admin.Actions"), "html", null, true);
        echo "
            </a>
            <a
              class=\"categories-tree-actions\"
              href=\"#\"
              name=\"product_catalog_category_tree_filter_reset\"
              onclick=\"productCategoryFilterReset(\$('div#product_catalog_category_tree_filter'));\"
              id=\"product_catalog_category_tree_filter_reset\"
            >
              <i class=\"material-icons\">radio_button_unchecked</i>
              ";
        // line 220
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unselect", array(), "Admin.Actions"), "html", null, true);
        echo "
            </a>
            <hr>
            ";
        // line 223
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["categories"] ?? null), 'widget');
        echo "
          </div>
        </div>
      </div>

      <form
        name=\"product_catalog_list\"
        id=\"product_catalog_list\"
        method=\"post\"
        action=\"";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null))), "html", null, true);
        echo "\"
        orderingurl=\"";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "orderBy" => "name", "sortOrder" => "asc")), "html", null, true);
        echo "\"
        newproducturl=\"";
        // line 234
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_new");
        echo "\"
      >
        <div class=\"row\">
          <div class=\"col-md-12\">
            <input type=\"hidden\" name=\"filter_category\" value=\"";
        // line 238
        echo twig_escape_filter($this->env, ((array_key_exists("filter_category", $context)) ? (_twig_default_filter(($context["filter_category"] ?? null), "")) : ("")), "html", null, true);
        echo "\" />
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-md-12\">
            <table
              class=\"table table-condensed table-striped product m-t-1\"
              redirecturl=\"";
        // line 246
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" =>         // line 247
($context["limit"] ?? null), "offset" =>         // line 248
($context["offset"] ?? null), "orderBy" =>         // line 249
($context["orderBy"] ?? null), "sortOrder" =>         // line 250
($context["sortOrder"] ?? null))), "html", null, true);
        // line 251
        echo "\"
            >
              <thead>
                <tr class=\"column-headers\">
                  <th style=\"width: 8%\">
                    ";
        // line 256
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("ID", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 257
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 257)->display(array_merge($context, array("column" => "id_product")));
        // line 260
        echo "                  </th>
                  <th>
                    ";
        // line 262
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Image", array(), "Admin.Global"), "html", null, true);
        echo "
                  </th>
                  <th>
                    ";
        // line 265
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 266
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 266)->display(array_merge($context, array("column" => "name")));
        // line 269
        echo "                  </th>
                  <th style=\"width: 9%\">
                    ";
        // line 271
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reference", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 272
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 272)->display(array_merge($context, array("column" => "reference")));
        // line 275
        echo "                  </th>
                  <th>
                    ";
        // line 277
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Category", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                    ";
        // line 278
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 278)->display(array_merge($context, array("column" => "name_category")));
        // line 281
        echo "                  </th>
                  <th style=\"width: 9%\">
                    ";
        // line 283
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Price (tax excl.)", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                    ";
        // line 284
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 284)->display(array_merge($context, array("column" => "price")));
        // line 287
        echo "                  </th>

                  ";
        // line 289
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 290
            echo "                  <th style=\"width: 9%\">
                    ";
            // line 291
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantity", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                    ";
            // line 292
            $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 292)->display(array_merge($context, array("column" => "sav_quantity")));
            // line 295
            echo "                  </th>
                  ";
        } else {
            // line 297
            echo "                    <th></th>
                  ";
        }
        // line 299
        echo "
                  <th>
                    ";
        // line 301
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Status", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 302
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 302)->display(array_merge($context, array("column" => "active")));
        // line 305
        echo "                  </th>
                  ";
        // line 306
        if ((($context["has_category_filter"] ?? null) == true)) {
            // line 307
            echo "                    <th>
                      ";
            // line 308
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Position", array(), "Admin.Global"), "html", null, true);
            echo "
                      ";
            // line 309
            $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 309)->display(array_merge($context, array("column" => "position")));
            // line 312
            echo "                    </th>
                  ";
        }
        // line 314
        echo "                  <th style=\"width: 6%\"></th>
                </tr>
                <tr class=\"column-filters\">
                  <th>
                    ";
        // line 318
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 318)->display(array_merge($context, array("input_name" => "filter_column_id_product", "min" => "0", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>         // line 324
($context["filter_column_id_product"] ?? null))));
        // line 326
        echo "                  </th>
                  <th>&nbsp;</th>
                  <th>
                    <input
                      type=\"text\"
                      class=\"form-control\"
                      placeholder=\"";
        // line 332
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search name", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                      name=\"filter_column_name\"
                      value=\"";
        // line 334
        echo twig_escape_filter($this->env, ($context["filter_column_name"] ?? null), "html", null, true);
        echo "\"
                    />
                  </th>
                  <th>
                    <input
                      type=\"text\"
                      class=\"form-control\"
                      placeholder=\"";
        // line 341
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search ref.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                      name=\"filter_column_reference\"
                      value=\"";
        // line 343
        echo twig_escape_filter($this->env, ($context["filter_column_reference"] ?? null), "html", null, true);
        echo "\"
                    />
                  </th>
                  <th>
                    <input
                      type=\"text\"
                      class=\"form-control\"
                      placeholder=\"";
        // line 350
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search category", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                      name=\"filter_column_name_category\"
                      value=\"";
        // line 352
        echo twig_escape_filter($this->env, ($context["filter_column_name_category"] ?? null), "html", null, true);
        echo "\"
                    />
                  </th>
                  <th>
                    ";
        // line 356
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 356)->display(array_merge($context, array("input_name" => "filter_column_price", "min" => "0", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>         // line 362
($context["filter_column_price"] ?? null))));
        // line 364
        echo "                  </th>

                  ";
        // line 366
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 367
            echo "                  <th>
                    ";
            // line 368
            $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 368)->display(array_merge($context, array("input_name" => "filter_column_sav_quantity", "min" => "-1000000", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>             // line 374
($context["filter_column_sav_quantity"] ?? null))));
            // line 376
            echo "                  </th>
                  ";
        } else {
            // line 378
            echo "                    <th></th>
                  ";
        }
        // line 380
        echo "
                  <th>
                    <select data-toggle=\"select2\" name=\"filter_column_active\">
                      <option value=\"\"></option>
                      <option value=\"1\" ";
        // line 384
        if ((array_key_exists("filter_column_active", $context) && (($context["filter_column_active"] ?? null) == "1"))) {
            echo "selected=\"selected\"";
        }
        echo ">Active</option>
                      <option value=\"0\" ";
        // line 385
        if ((array_key_exists("filter_column_active", $context) && (($context["filter_column_active"] ?? null) == "0"))) {
            echo "selected=\"selected\"";
        }
        echo ">Inactive</option>
                    </select>
                  </th>
                  ";
        // line 388
        if ((($context["has_category_filter"] ?? null) == true)) {
            // line 389
            echo "                    <th>
                      ";
            // line 390
            if ( !($context["activate_drag_and_drop"] ?? null)) {
                // line 391
                echo "                        <input type=\"button\" class=\"btn btn-tertiary-outline\" name=\"products_filter_position_asc\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reorder", array(), "Admin.Actions"), "html", null, true);
                echo "\" onclick=\"productOrderPrioritiesTable();\" />
                        ";
            } else {
                // line 393
                echo "                        <input type=\"button\" id=\"bulk_edition_save_keep\" class=\"btn\" onclick=\"bulkProductAction(this, 'edition');\" value=\"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save & refresh", array(), "Admin.Actions");
                echo "\" />
                    ";
            }
            // line 395
            echo "
                    </th>
                  ";
        }
        // line 398
        echo "                  <th style=\"width: 12%\">
                    <button
                      type=\"submit\"
                      class=\"btn btn-primary\"
                      name=\"products_filter_submit\"
                      title=\"";
        // line 403
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Filter", array(), "Admin.Actions"), "html", null, true);
        echo "\"
                    >
                      <i class=\"material-icons\">search</i>
                      ";
        // line 406
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Apply", array(), "Admin.Actions"), "html", null, true);
        echo "
                    </button>
                    <button
                      type=\"reset\"
                      class=\"btn btn-invisible\"
                      name=\"products_filter_reset\"
                      onclick=\"productColumnFilterReset(\$(this).closest('tr.column-filters'))\"
                      title=\"";
        // line 413
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset", array(), "Admin.Actions"), "html", null, true);
        echo "\"
                    >
                      <i class=\"material-icons\">clear</i>
                      ";
        // line 416
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset", array(), "Admin.Actions"), "html", null, true);
        echo "
                    </button>
                  </th>
                </tr>
              </thead>
              ";
        // line 421
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("PrestaShopBundle\\Controller\\Admin\\ProductController::listAction", array("limit" =>         // line 422
($context["limit"] ?? null), "offset" =>         // line 423
($context["offset"] ?? null), "orderBy" =>         // line 424
($context["orderBy"] ?? null), "sortOrder" =>         // line 425
($context["sortOrder"] ?? null), "products" =>         // line 426
($context["products"] ?? null), "last_sql" =>         // line 427
($context["last_sql"] ?? null))));
        // line 428
        echo "
            </table>
          </div>
        </div>

        ";
        // line 433
        if ((($context["product_count_filtered"] ?? null) > 20)) {
            // line 434
            echo "          <div class=\"row\">
            <div class=\"col-md-12\">
              ";
            // line 436
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("PrestaShopBundle:Admin\\Common:pagination", array("limit" =>             // line 437
($context["limit"] ?? null), "offset" => ($context["offset"] ?? null), "total" => ($context["product_count_filtered"] ?? null), "caller_parameters" => ($context["pagination_parameters"] ?? null), "limit_choices" => ($context["pagination_limit_choices"] ?? null))));
            // line 438
            echo "
            </div>
          </div>
        ";
        }
        // line 442
        echo "
      </form>

    </div>
  </div>

  ";
        // line 449
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 449, "1179766477")->display(array_merge($context, array("id" => "catalog_duplicate_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicating products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_duplicate_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicating...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 468
        echo "

  ";
        // line 471
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 471, "1604794079")->display(array_merge($context, array("id" => "catalog_activate_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activating products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_activate_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activating...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 490
        echo "

  ";
        // line 493
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 493, "1453011705")->display(array_merge($context, array("id" => "catalog_deactivate_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivating products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_deactivate_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivating...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 512
        echo "

  ";
        // line 515
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 515, "1485593761")->display(array_merge($context, array("id" => "catalog_delete_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deleting products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_delete_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deleting...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 534
        echo "

  ";
        // line 537
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 537, "1529885986")->display(array_merge($context, array("id" => "catalog_deletion_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete products?", array(), "Admin.Catalog.Feature"), "closable" => true, "actions" => array(0 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete now", array(), "Admin.Actions"), "value" => "confirm", "class" => "btn btn-primary btn-lg")))));
        // line 554
        echo "
  ";
        // line 555
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 555, "571110565")->display(array_merge($context, array("id" => "catalog_sql_query_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SQL query", array(), "Admin.Global"), "closable" => true, "actions" => array(0 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export to SQL Manager", array(), "Admin.Actions"), "value" => "sql_manager", "class" => "btn btn-primary btn-lg")))));
        // line 575
        echo "
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a_1179766477 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 449
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 449);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 459
    public function block_content($context, array $blocks = array())
    {
        // line 460
        echo "      <div class=\"modal-body\">
        ";
        // line 461
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplication in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_duplicate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 463
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplication failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  844 => 463,  839 => 461,  836 => 460,  833 => 459,  816 => 449,  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a_1604794079 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 471
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 471);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 481
    public function block_content($context, array $blocks = array())
    {
        // line 482
        echo "      <div class=\"modal-body\">
        ";
        // line 483
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activation in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_activate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 485
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activation failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  917 => 485,  912 => 483,  909 => 482,  906 => 481,  889 => 471,  844 => 463,  839 => 461,  836 => 460,  833 => 459,  816 => 449,  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a_1453011705 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 493
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 493);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 503
    public function block_content($context, array $blocks = array())
    {
        // line 504
        echo "      <div class=\"modal-body\">
        ";
        // line 505
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivation in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_deactivate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 507
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivation failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  990 => 507,  985 => 505,  982 => 504,  979 => 503,  962 => 493,  917 => 485,  912 => 483,  909 => 482,  906 => 481,  889 => 471,  844 => 463,  839 => 461,  836 => 460,  833 => 459,  816 => 449,  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a_1485593761 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 515
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 515);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 525
    public function block_content($context, array $blocks = array())
    {
        // line 526
        echo "      <div class=\"modal-body\">
        ";
        // line 527
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deletion in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_delete_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 529
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deletion failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1063 => 529,  1058 => 527,  1055 => 526,  1052 => 525,  1035 => 515,  990 => 507,  985 => 505,  982 => 504,  979 => 503,  962 => 493,  917 => 485,  912 => 483,  909 => 482,  906 => 481,  889 => 471,  844 => 463,  839 => 461,  836 => 460,  833 => 459,  816 => 449,  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a_1529885986 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 537
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 537);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 548
    public function block_content($context, array $blocks = array())
    {
        // line 549
        echo "      <div class=\"modal-body\">
        ";
        // line 550
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("These products will be deleted for good. Please confirm.", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1131 => 550,  1128 => 549,  1125 => 548,  1108 => 537,  1063 => 529,  1058 => 527,  1055 => 526,  1052 => 525,  1035 => 515,  990 => 507,  985 => 505,  982 => 504,  979 => 503,  962 => 493,  917 => 485,  912 => 483,  909 => 482,  906 => 481,  889 => 471,  844 => 463,  839 => 461,  836 => 460,  833 => 459,  816 => 449,  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_72117e2f3aa742e4a13b3cd4079c983c8bcf303af550fd540c68a37f4974309a_571110565 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 555
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 555);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 566
    public function block_content($context, array $blocks = array())
    {
        // line 567
        echo "      <form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["sql_manager_add_link"] ?? null), "html", null, true);
        echo "\" id=\"catalog_sql_query_modal_content\">
        <div class=\"modal-body\">
          <textarea name=\"sql\" rows=\"20\" cols=\"65\"></textarea>
          <input type=\"hidden\" name=\"name\" value=\"\" />
        </div>
      </form>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1195 => 567,  1192 => 566,  1175 => 555,  1131 => 550,  1128 => 549,  1125 => 548,  1108 => 537,  1063 => 529,  1058 => 527,  1055 => 526,  1052 => 525,  1035 => 515,  990 => 507,  985 => 505,  982 => 504,  979 => 503,  962 => 493,  917 => 485,  912 => 483,  909 => 482,  906 => 481,  889 => 471,  844 => 463,  839 => 461,  836 => 460,  833 => 459,  816 => 449,  774 => 575,  772 => 555,  769 => 554,  766 => 537,  762 => 534,  759 => 515,  755 => 512,  752 => 493,  748 => 490,  745 => 471,  741 => 468,  738 => 449,  730 => 442,  724 => 438,  722 => 437,  721 => 436,  717 => 434,  715 => 433,  708 => 428,  706 => 427,  705 => 426,  704 => 425,  703 => 424,  702 => 423,  701 => 422,  700 => 421,  692 => 416,  686 => 413,  676 => 406,  670 => 403,  663 => 398,  658 => 395,  652 => 393,  646 => 391,  644 => 390,  641 => 389,  639 => 388,  631 => 385,  625 => 384,  619 => 380,  615 => 378,  611 => 376,  609 => 374,  608 => 368,  605 => 367,  603 => 366,  599 => 364,  597 => 362,  596 => 356,  589 => 352,  584 => 350,  574 => 343,  569 => 341,  559 => 334,  554 => 332,  546 => 326,  544 => 324,  543 => 318,  537 => 314,  533 => 312,  531 => 309,  527 => 308,  524 => 307,  522 => 306,  519 => 305,  517 => 302,  513 => 301,  509 => 299,  505 => 297,  501 => 295,  499 => 292,  495 => 291,  492 => 290,  490 => 289,  486 => 287,  484 => 284,  480 => 283,  476 => 281,  474 => 278,  470 => 277,  466 => 275,  464 => 272,  460 => 271,  456 => 269,  454 => 266,  450 => 265,  444 => 262,  440 => 260,  438 => 257,  434 => 256,  427 => 251,  425 => 250,  424 => 249,  423 => 248,  422 => 247,  421 => 246,  410 => 238,  403 => 234,  399 => 233,  395 => 232,  383 => 223,  377 => 220,  364 => 210,  351 => 200,  336 => 188,  327 => 181,  325 => 179,  324 => 172,  321 => 171,  319 => 161,  316 => 160,  313 => 159,  310 => 149,  307 => 148,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/home/felipe/vhosts/prestashop/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}
