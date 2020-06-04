<?php

/* extension/payment/mp_standard.twig */
class __TwigTemplate_a4181bd90e44e391ee726f5f12aba1e1546fe443a3621e98c430fd9d4c2b53ba extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
  
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button id=\"btn_save\" type=\"submit\" form=\"form_mp\" data-toggle=\"tooltip\" class=\"btn btn-primary\">";
        // line 7
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "<i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 8
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\">";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "<i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 9
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 12
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </ul>
    </div>
  </div>

  <div class=\"container-fluid\">

    ";
        // line 20
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 21
            echo "      <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
      </div>
    ";
        }
        // line 25
        echo "
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i>Edit MercadoPago</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 31
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form_mp\" class=\"form-horizontal\">
          ";
        // line 33
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 34
        echo (isset($context["entry_status"]) ? $context["entry_status"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"payment_mp_standard_status\" id=\"input-status\" class=\"form-control\">
                ";
        // line 37
        if ((isset($context["payment_mp_standard_status"]) ? $context["payment_mp_standard_status"] : null)) {
            // line 38
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"0\">";
            // line 39
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        } else {
            // line 41
            echo "                  <option value=\"1\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 42
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        }
        // line 44
        echo "              </select>
            </div>
          </div>
          ";
        // line 48
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_country\">";
        // line 49
        echo (isset($context["entry_country"]) ? $context["entry_country"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"hidden\" value=\"";
        // line 51
        if ((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null)) {
            echo (isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null);
        }
        echo "\" id=\"countryName\" />
              <select class=\"form-control\" name=\"payment_mp_standard_country\" id=\"country\">
                <option id=\"MLA\" ";
        // line 53
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MLA")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MLA\">Argentina</option>
                <option id=\"MLB\" ";
        // line 54
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MLB")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MLB\">Brasil</option>
                <option id=\"MLC\" ";
        // line 55
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MLC")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MLC\">Chile</option>
                <option id=\"MCO\" ";
        // line 56
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MCO")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MCO\">Colombia</option>
                <option id=\"MLM\" ";
        // line 57
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MLM")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MLM\">Mexico</option>
                <option id=\"MPE\" ";
        // line 58
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MPE")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MPE\">Peru</option>
                <option id=\"MLU\" ";
        // line 59
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MLU")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MLU\">Uruguai</option>
                <option id=\"MLV\" ";
        // line 60
        if (((isset($context["payment_mp_standard_country"]) ? $context["payment_mp_standard_country"] : null) == "MLV")) {
            echo "selected=\"selected\"";
        }
        echo " value=\"MLV\">Venezuela</option>
              </select>
            </div>
          </div>
          <div class=\"form-group\"  id=\"div_sponsor\">
           <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_sponsor\">
            <span data-toggle=\"tooltip\" data-trigger=\"click\" title='Sponsor ID'>";
        // line 66
        echo (isset($context["entry_sponsor"]) ? $context["entry_sponsor"] : null);
        echo "</span></label>
            <div class=\"col-sm-10\">
             <input type=\"text\" class=\"form-control\" id=\"payment_mp_standard_sponsor\" name=\"payment_mp_standard_sponsor\" value=\"";
        // line 68
        echo (isset($context["payment_mp_standard_sponsor"]) ? $context["payment_mp_standard_sponsor"] : null);
        echo "\" disabled=\"disabled\" placeholder=\"Em Breve - En Breve - Coming soon\" />
             ";
        // line 69
        if (array_key_exists("error_sponsor_spann", $context)) {
            // line 70
            echo "               <div class=\"text-danger\">";
            echo (isset($context["error_sponsor_spann"]) ? $context["error_sponsor_spann"] : null);
            echo "</div>
             ";
        }
        // line 72
        echo "           </div>
        </div>
          ";
        // line 75
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"entry_type_checkout\">";
        // line 76
        echo (isset($context["entry_type_checkout"]) ? $context["entry_type_checkout"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_type_checkout\" id=\"payment_mp_standard_type_checkout\">
                ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["type_checkout"]) ? $context["type_checkout"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 80
            echo "                  ";
            if (($context["type"] == (isset($context["payment_mp_standard_type_checkout"]) ? $context["payment_mp_standard_type_checkout"] : null))) {
                // line 81
                echo "                    <option value=\"";
                echo $context["type"];
                echo "\" selected=\"selected\" id=\"";
                echo $context["type"];
                echo "\">";
                echo $context["type"];
                echo "</option>
                  ";
            } else {
                // line 83
                echo "                    <option value=\"";
                echo $context["type"];
                echo "\" id=\"";
                echo $context["type"];
                echo "\">";
                echo $context["type"];
                echo "</option>
                  ";
            }
            // line 85
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "              </select>
            </div>
          </div>
          ";
        // line 90
        echo "          <div class=\"form-group required\" id=\"div_client_id\">
            ";
        // line 92
        echo "            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 94
        echo (isset($context["entry_credentials_basic_tooltip"]) ? $context["entry_credentials_basic_tooltip"] : null);
        echo "
            </div>
            ";
        // line 97
        echo "            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_client_id\">";
        echo (isset($context["entry_credentials_client_id"]) ? $context["entry_credentials_client_id"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" class=\"form-control\" id=\"payment_mp_standard_client_id\" name=\"payment_mp_standard_client_id\" value=\"";
        // line 99
        echo (isset($context["payment_mp_standard_client_id"]) ? $context["payment_mp_standard_client_id"] : null);
        echo "\" />
            </div>
            ";
        // line 102
        echo "            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_client_secret\">";
        echo (isset($context["entry_credentials_client_secret"]) ? $context["entry_credentials_client_secret"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" class=\"form-control\" id=\"payment_mp_standard_client_secret\" name=\"payment_mp_standard_client_secret\" value=\"";
        // line 104
        echo (isset($context["payment_mp_standard_client_secret"]) ? $context["payment_mp_standard_client_secret"] : null);
        echo "\" />
            </div>
            ";
        // line 107
        echo "            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 109
        if ((isset($context["error_entry_credentials_basic"]) ? $context["error_entry_credentials_basic"] : null)) {
            // line 110
            echo "                <div class=\"text-danger\">";
            echo (isset($context["error_entry_credentials_basic"]) ? $context["error_entry_credentials_basic"] : null);
            echo "</div>
              ";
        }
        // line 112
        echo "            </div>
          </div>
          ";
        // line 115
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 118
        echo (isset($context["entry_category_tooltip"]) ? $context["entry_category_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_category_id\">";
        // line 120
        echo (isset($context["entry_category"]) ? $context["entry_category"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_category_id\" id=\"payment_mp_standard_category_id\">
                ";
        // line 123
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["category_list"]) ? $context["category_list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 124
            echo "                  ";
            if (($this->getAttribute($context["category"], "id", array()) == (isset($context["payment_mp_standard_category_id"]) ? $context["payment_mp_standard_category_id"] : null))) {
                // line 125
                echo "                    <option value=\"";
                echo $this->getAttribute($context["category"], "id", array());
                echo "\" selected=\"selected\" id=\"";
                echo $this->getAttribute($context["category"], "description", array());
                echo "\">";
                echo $this->getAttribute($context["category"], "description", array());
                echo "</option>
                  ";
            } else {
                // line 127
                echo "                    <option value=\"";
                echo $this->getAttribute($context["category"], "id", array());
                echo "\" id=\"";
                echo $this->getAttribute($context["category"], "description", array());
                echo "\">";
                echo $this->getAttribute($context["category"], "description", array());
                echo "</option>
                  ";
            }
            // line 129
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "              </select>
            </div>
          </div>
          ";
        // line 134
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 137
        echo (isset($context["entry_debug_tooltip"]) ? $context["entry_debug_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_debug\">";
        // line 139
        echo (isset($context["entry_debug"]) ? $context["entry_debug"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_debug\" id=\"payment_mp_standard_debug\">
                ";
        // line 142
        if ((isset($context["payment_mp_standard_debug"]) ? $context["payment_mp_standard_debug"] : null)) {
            // line 143
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"0\">";
            // line 144
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        } else {
            // line 146
            echo "                  <option value=\"1\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 147
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        }
        // line 149
        echo "              </select>
            </div>
          </div>
          ";
        // line 153
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 156
        echo (isset($context["entry_autoreturn_tooltip"]) ? $context["entry_autoreturn_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_enable_return\">";
        // line 158
        echo (isset($context["entry_autoreturn"]) ? $context["entry_autoreturn"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_enable_return\" id=\"payment_mp_standard_enable_return\">
                ";
        // line 161
        if (((isset($context["payment_mp_standard_enable_return"]) ? $context["payment_mp_standard_enable_return"] : null) == "all")) {
            // line 162
            echo "                  <option value=\"all\" selected=\"selected\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"approved\">";
            // line 163
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        } else {
            // line 165
            echo "                  <option value=\"all\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"approved\" selected=\"selected\">";
            // line 166
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        }
        // line 168
        echo "              </select>
            </div>
          </div>
          ";
        // line 172
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 175
        echo (isset($context["entry_sandbox_tooltip"]) ? $context["entry_sandbox_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_sandbox\">";
        // line 177
        echo (isset($context["entry_sandbox"]) ? $context["entry_sandbox"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_sandbox\" id=\"payment_mp_standard_sandbox\">
                ";
        // line 180
        if ((isset($context["payment_mp_standard_sandbox"]) ? $context["payment_mp_standard_sandbox"] : null)) {
            // line 181
            echo "                  <option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"0\">";
            // line 182
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        } else {
            // line 184
            echo "                  <option value=\"1\">";
            echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
            echo "</option>
                  <option value=\"0\" selected=\"selected\">";
            // line 185
            echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
            echo "</option>
                ";
        }
        // line 187
        echo "              </select>
            </div>
          </div>
          ";
        // line 191
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 194
        echo (isset($context["entry_installments_tooltip"]) ? $context["entry_installments_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_installments\">";
        // line 196
        echo (isset($context["entry_installments"]) ? $context["entry_installments"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_installments\" id=\"payment_mp_standard_installments\">
                ";
        // line 199
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["installments"]) ? $context["installments"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["installment"]) {
            // line 200
            echo "                  ";
            if (($this->getAttribute($context["installment"], "id", array()) == (isset($context["payment_mp_standard_installments"]) ? $context["payment_mp_standard_installments"] : null))) {
                // line 201
                echo "                    <option value=\"";
                echo $this->getAttribute($context["installment"], "id", array());
                echo "\" selected=\"selected\" id=\"";
                echo $this->getAttribute($context["installment"], "id", array());
                echo "\">";
                echo $this->getAttribute($context["installment"], "value", array());
                echo "</option>
                  ";
            } else {
                // line 203
                echo "                    <option value=\"";
                echo $this->getAttribute($context["installment"], "id", array());
                echo "\" id=\"";
                echo $this->getAttribute($context["installment"], "id", array());
                echo "\">";
                echo $this->getAttribute($context["installment"], "value", array());
                echo "</option>
                  ";
            }
            // line 205
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['installment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 206
        echo "              </select>
            </div>
          </div>
          ";
        // line 210
        echo "          ";
        if (((isset($context["count_payment_methods"]) ? $context["count_payment_methods"] : null) > 0)) {
            echo "<div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
            // line 213
            echo (isset($context["entry_payments_not_accept_tooltip"]) ? $context["entry_payments_not_accept_tooltip"] : null);
            echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_methods\">";
            // line 215
            echo (isset($context["entry_payments_not_accept"]) ? $context["entry_payments_not_accept"] : null);
            echo "</label>
            <div class=\"col-sm-10\" id=\"div_payments\">
              <div style=\"margin-top:8px;\">
                <input type=\"hidden\" class=\"form-control\" id=\"payment_nro_count_payment_methods\" name=\"payment_nro_count_payment_methods\" value=\"";
            // line 218
            echo (isset($context["count_payment_methods"]) ? $context["count_payment_methods"] : null);
            echo "\" />
                ";
            // line 219
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
                // line 220
                echo "                  <div style=\"";
                echo (isset($context["payment_style"]) ? $context["payment_style"] : null);
                echo "\" id=\"";
                echo $this->getAttribute($context["method"], "name", array());
                echo "\">
                    ";
                // line 221
                if (twig_in_filter($this->getAttribute($context["method"], "id", array()), (isset($context["payment_mp_standard_methods"]) ? $context["payment_mp_standard_methods"] : null))) {
                    // line 222
                    echo "                      <img src=\"";
                    echo $this->getAttribute($context["method"], "secure_thumbnail", array());
                    echo "\" height=\"24\"><br/>
                      <input name=\"payment_mp_standard_methods[]\" type=\"checkbox\" checked=\"yes\" value=\"";
                    // line 223
                    echo $this->getAttribute($context["method"], "id", array());
                    echo "\" style=\"margin-top:25%; margin-top:4px; border:1px solid #888; width:16px; height:16px;\">
                    ";
                } else {
                    // line 225
                    echo "                      <img src=\"";
                    echo $this->getAttribute($context["method"], "secure_thumbnail", array());
                    echo "\" height=\"24\"><br/>
                      <input name=\"payment_mp_standard_methods[]\" type=\"checkbox\" value=\"";
                    // line 226
                    echo $this->getAttribute($context["method"], "id", array());
                    echo "\" style=\"margin-left:25%; margin-top:4px; border:1px solid #888; width:16px; height:16px;\">
                    ";
                }
                // line 228
                echo "                  </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 230
            echo "              </div>
            </div>
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
            // line 234
            if ((isset($context["error_has_no_payments"]) ? $context["error_has_no_payments"] : null)) {
                // line 235
                echo "                <div class=\"text-danger\">";
                echo (isset($context["error_entry_no_payments"]) ? $context["error_entry_no_payments"] : null);
                echo "</div>
              ";
            }
            // line 237
            echo "            </div>
          </div>";
        }
        // line 239
        echo "          ";
        // line 240
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 243
        echo (isset($context["entry_order_status_approved_tooltip"]) ? $context["entry_order_status_approved_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_completed\">";
        // line 245
        echo (isset($context["entry_order_status_approved"]) ? $context["entry_order_status_approved"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_completed\" id=\"payment_mp_standard_order_status_id_completed\">
                ";
        // line 248
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 249
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_completed"]) ? $context["payment_mp_standard_order_status_id_completed"] : null))) {
                // line 250
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 252
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 254
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 255
        echo "              </select>
            </div>
          </div>
          ";
        // line 259
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 262
        echo (isset($context["entry_order_status_pending_tooltip"]) ? $context["entry_order_status_pending_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_pending\">";
        // line 264
        echo (isset($context["entry_order_status_pending"]) ? $context["entry_order_status_pending"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_pending\" id=\"payment_mp_standard_order_status_id_pending\">
                ";
        // line 267
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 268
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_pending"]) ? $context["payment_mp_standard_order_status_id_pending"] : null))) {
                // line 269
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 271
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 273
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 274
        echo "              </select>
            </div>
          </div>
          ";
        // line 278
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 281
        echo (isset($context["entry_order_status_canceled_tooltip"]) ? $context["entry_order_status_canceled_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_canceled\">";
        // line 283
        echo (isset($context["entry_order_status_canceled"]) ? $context["entry_order_status_canceled"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_canceled\" id=\"payment_mp_standard_order_status_id_canceled\">
                ";
        // line 286
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 287
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_canceled"]) ? $context["payment_mp_standard_order_status_id_canceled"] : null))) {
                // line 288
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 290
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 292
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 293
        echo "              </select>
            </div>
          </div>
          ";
        // line 297
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 300
        echo (isset($context["entry_order_status_in_process_tooltip"]) ? $context["entry_order_status_in_process_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_in_process\">";
        // line 302
        echo (isset($context["entry_order_status_in_process"]) ? $context["entry_order_status_in_process"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_in_process\" id=\"payment_mp_standard_order_status_id_in_process\">
                ";
        // line 305
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 306
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_in_process"]) ? $context["payment_mp_standard_order_status_id_in_process"] : null))) {
                // line 307
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 309
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 311
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 312
        echo "              </select>
            </div>
          </div>
          ";
        // line 316
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 319
        echo (isset($context["entry_order_status_rejected_tooltip"]) ? $context["entry_order_status_rejected_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_rejected\">";
        // line 321
        echo (isset($context["entry_order_status_rejected"]) ? $context["entry_order_status_rejected"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_rejected\" id=\"payment_mp_standard_order_status_id_rejected\">
                ";
        // line 324
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 325
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_rejected"]) ? $context["payment_mp_standard_order_status_id_rejected"] : null))) {
                // line 326
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 328
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 330
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 331
        echo "              </select>
            </div>
          </div>
          ";
        // line 335
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 338
        echo (isset($context["entry_order_status_refunded_tooltip"]) ? $context["entry_order_status_refunded_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_refunded\">";
        // line 340
        echo (isset($context["entry_order_status_refunded"]) ? $context["entry_order_status_refunded"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_refunded\" id=\"payment_mp_standard_order_status_id_refunded\">
                ";
        // line 343
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 344
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_refunded"]) ? $context["payment_mp_standard_order_status_id_refunded"] : null))) {
                // line 345
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 347
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 349
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 350
        echo "              </select>
            </div>
          </div>
          ";
        // line 354
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 357
        echo (isset($context["entry_order_status_in_mediation_tooltip"]) ? $context["entry_order_status_in_mediation_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_in_mediation\">";
        // line 359
        echo (isset($context["entry_order_status_in_mediation"]) ? $context["entry_order_status_in_mediation"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_in_mediation\" id=\"payment_mp_standard_order_status_id_in_mediation\">
                ";
        // line 362
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 363
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_in_mediation"]) ? $context["payment_mp_standard_order_status_id_in_mediation"] : null))) {
                // line 364
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 366
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 368
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 369
        echo "              </select>
            </div>
          </div>
          ";
        // line 373
        echo "          <div class=\"form-group\">
            <label class=\"col-sm-2\"></label>
            <div class=\"col-sm-10\">
              ";
        // line 376
        echo (isset($context["entry_order_status_chargeback_tooltip"]) ? $context["entry_order_status_chargeback_tooltip"] : null);
        echo "
            </div>
            <label class=\"col-sm-2 control-label\" for=\"payment_mp_standard_order_status_id_chargeback\">";
        // line 378
        echo (isset($context["entry_order_status_chargeback"]) ? $context["entry_order_status_chargeback"] : null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select class=\"form-control\" name=\"payment_mp_standard_order_status_id_chargeback\" id=\"payment_mp_standard_order_status_id_chargeback\">
                ";
        // line 381
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 382
            echo "                  ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_mp_standard_order_status_id_chargeback"]) ? $context["payment_mp_standard_order_status_id_chargeback"] : null))) {
                // line 383
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            } else {
                // line 385
                echo "                    <option value=\"";
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
                  ";
            }
            // line 387
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 388
        echo "              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\" src=\"./view/javascript/mp/standard/mp_standard.js\"></script>
<script type=\"text/javascript\" src=\"./view/javascript/mp/spinner.min.js\"></script>
";
        // line 398
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/payment/mp_standard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1039 => 398,  1027 => 388,  1021 => 387,  1013 => 385,  1005 => 383,  1002 => 382,  998 => 381,  992 => 378,  987 => 376,  982 => 373,  977 => 369,  971 => 368,  963 => 366,  955 => 364,  952 => 363,  948 => 362,  942 => 359,  937 => 357,  932 => 354,  927 => 350,  921 => 349,  913 => 347,  905 => 345,  902 => 344,  898 => 343,  892 => 340,  887 => 338,  882 => 335,  877 => 331,  871 => 330,  863 => 328,  855 => 326,  852 => 325,  848 => 324,  842 => 321,  837 => 319,  832 => 316,  827 => 312,  821 => 311,  813 => 309,  805 => 307,  802 => 306,  798 => 305,  792 => 302,  787 => 300,  782 => 297,  777 => 293,  771 => 292,  763 => 290,  755 => 288,  752 => 287,  748 => 286,  742 => 283,  737 => 281,  732 => 278,  727 => 274,  721 => 273,  713 => 271,  705 => 269,  702 => 268,  698 => 267,  692 => 264,  687 => 262,  682 => 259,  677 => 255,  671 => 254,  663 => 252,  655 => 250,  652 => 249,  648 => 248,  642 => 245,  637 => 243,  632 => 240,  630 => 239,  626 => 237,  620 => 235,  618 => 234,  612 => 230,  605 => 228,  600 => 226,  595 => 225,  590 => 223,  585 => 222,  583 => 221,  576 => 220,  572 => 219,  568 => 218,  562 => 215,  557 => 213,  550 => 210,  545 => 206,  539 => 205,  529 => 203,  519 => 201,  516 => 200,  512 => 199,  506 => 196,  501 => 194,  496 => 191,  491 => 187,  486 => 185,  481 => 184,  476 => 182,  471 => 181,  469 => 180,  463 => 177,  458 => 175,  453 => 172,  448 => 168,  443 => 166,  438 => 165,  433 => 163,  428 => 162,  426 => 161,  420 => 158,  415 => 156,  410 => 153,  405 => 149,  400 => 147,  395 => 146,  390 => 144,  385 => 143,  383 => 142,  377 => 139,  372 => 137,  367 => 134,  362 => 130,  356 => 129,  346 => 127,  336 => 125,  333 => 124,  329 => 123,  323 => 120,  318 => 118,  313 => 115,  309 => 112,  303 => 110,  301 => 109,  297 => 107,  292 => 104,  286 => 102,  281 => 99,  275 => 97,  270 => 94,  266 => 92,  263 => 90,  258 => 86,  252 => 85,  242 => 83,  232 => 81,  229 => 80,  225 => 79,  219 => 76,  216 => 75,  212 => 72,  206 => 70,  204 => 69,  200 => 68,  195 => 66,  184 => 60,  178 => 59,  172 => 58,  166 => 57,  160 => 56,  154 => 55,  148 => 54,  142 => 53,  135 => 51,  130 => 49,  127 => 48,  122 => 44,  117 => 42,  112 => 41,  107 => 39,  102 => 38,  100 => 37,  94 => 34,  91 => 33,  87 => 31,  79 => 25,  71 => 21,  69 => 20,  61 => 14,  50 => 12,  46 => 11,  41 => 9,  33 => 8,  29 => 7,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   */
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right">*/
/*         <button id="btn_save" type="submit" form="form_mp" data-toggle="tooltip" class="btn btn-primary">{{ button_save }}<i class="fa fa-save"></i></button>*/
/*         <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default">{{ button_cancel }}<i class="fa fa-reply"></i></a></div>*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/* */
/*   <div class="container-fluid">*/
/* */
/*     {% if error_warning %}*/
/*       <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*         <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-pencil"></i>Edit MercadoPago</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form_mp" class="form-horizontal">*/
/*           {# Set module enable/disable option #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2 control-label" for="input-status">{{ entry_status }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select name="payment_mp_standard_status" id="input-status" class="form-control">*/
/*                 {% if payment_mp_standard_status %}*/
/*                   <option value="1" selected="selected">{{ text_enabled }}</option>*/
/*                   <option value="0">{{ text_disabled }}</option>*/
/*                 {% else %}*/
/*                   <option value="1">{{ text_enabled }}</option>*/
/*                   <option value="0" selected="selected">{{ text_disabled }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Set the country that the payment gateway will operate #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_country">{{ entry_country }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="hidden" value="{% if payment_mp_standard_country %}{{ payment_mp_standard_country }}{% endif %}" id="countryName" />*/
/*               <select class="form-control" name="payment_mp_standard_country" id="country">*/
/*                 <option id="MLA" {% if payment_mp_standard_country == "MLA" %}selected="selected"{% endif %} value="MLA">Argentina</option>*/
/*                 <option id="MLB" {% if payment_mp_standard_country == "MLB" %}selected="selected"{% endif %} value="MLB">Brasil</option>*/
/*                 <option id="MLC" {% if payment_mp_standard_country == "MLC" %}selected="selected"{% endif %} value="MLC">Chile</option>*/
/*                 <option id="MCO" {% if payment_mp_standard_country == "MCO" %}selected="selected"{% endif %} value="MCO">Colombia</option>*/
/*                 <option id="MLM" {% if payment_mp_standard_country == "MLM" %}selected="selected"{% endif %} value="MLM">Mexico</option>*/
/*                 <option id="MPE" {% if payment_mp_standard_country == "MPE" %}selected="selected"{% endif %} value="MPE">Peru</option>*/
/*                 <option id="MLU" {% if payment_mp_standard_country == "MLU" %}selected="selected"{% endif %} value="MLU">Uruguai</option>*/
/*                 <option id="MLV" {% if payment_mp_standard_country == "MLV" %}selected="selected"{% endif %} value="MLV">Venezuela</option>*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           <div class="form-group"  id="div_sponsor">*/
/*            <label class="col-sm-2 control-label" for="payment_mp_standard_sponsor">*/
/*             <span data-toggle="tooltip" data-trigger="click" title='Sponsor ID'>{{ entry_sponsor }}</span></label>*/
/*             <div class="col-sm-10">*/
/*              <input type="text" class="form-control" id="payment_mp_standard_sponsor" name="payment_mp_standard_sponsor" value="{{ payment_mp_standard_sponsor }}" disabled="disabled" placeholder="Em Breve - En Breve - Coming soon" />*/
/*              {% if error_sponsor_spann is defined %}*/
/*                <div class="text-danger">{{ error_sponsor_spann }}</div>*/
/*              {% endif %}*/
/*            </div>*/
/*         </div>*/
/*           {# Checkout type #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="entry_type_checkout">{{ entry_type_checkout }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_type_checkout" id="payment_mp_standard_type_checkout">*/
/*                 {% for type in type_checkout %}*/
/*                   {% if ( type == payment_mp_standard_type_checkout ) %}*/
/*                     <option value="{{ type }}" selected="selected" id="{{ type }}">{{ type }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ type }}" id="{{ type }}">{{ type }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Credentials #}*/
/*           <div class="form-group required" id="div_client_id">*/
/*             {# Tooltip #}*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_credentials_basic_tooltip }}*/
/*             </div>*/
/*             {# Client ID #}*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_client_id">{{ entry_credentials_client_id }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" class="form-control" id="payment_mp_standard_client_id" name="payment_mp_standard_client_id" value="{{ payment_mp_standard_client_id }}" />*/
/*             </div>*/
/*             {# Client Secret #}*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_client_secret">{{ entry_credentials_client_secret }}</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" class="form-control" id="payment_mp_standard_client_secret" name="payment_mp_standard_client_secret" value="{{ payment_mp_standard_client_secret }}" />*/
/*             </div>*/
/*             {# Message for absence of credentials #}*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {% if error_entry_credentials_basic %}*/
/*                 <div class="text-danger">{{ error_entry_credentials_basic }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           {# Store Category #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_category_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_category_id">{{ entry_category }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_category_id" id="payment_mp_standard_category_id">*/
/*                 {% for category in category_list %}*/
/*                   {% if category.id == payment_mp_standard_category_id %}*/
/*                     <option value="{{ category.id }}" selected="selected" id="{{ category.description }}">{{ category.description }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ category.id }}" id="{{ category.description }}">{{ category.description }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Debug Mode #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_debug_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_debug">{{ entry_debug }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_debug" id="payment_mp_standard_debug">*/
/*                 {% if payment_mp_standard_debug %}*/
/*                   <option value="1" selected="selected">{{ text_enabled }}</option>*/
/*                   <option value="0">{{ text_disabled }}</option>*/
/*                 {% else %}*/
/*                   <option value="1">{{ text_enabled }}</option>*/
/*                   <option value="0" selected="selected">{{ text_disabled }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Auto Return #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_autoreturn_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_enable_return">{{ entry_autoreturn }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_enable_return" id="payment_mp_standard_enable_return">*/
/*                 {% if payment_mp_standard_enable_return == "all" %}*/
/*                   <option value="all" selected="selected">{{ text_enabled }}</option>*/
/*                   <option value="approved">{{ text_disabled }}</option>*/
/*                 {% else %}*/
/*                   <option value="all">{{ text_enabled }}</option>*/
/*                   <option value="approved" selected="selected">{{ text_disabled }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Sandbox Mode #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_sandbox_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_sandbox">{{ entry_sandbox }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_sandbox" id="payment_mp_standard_sandbox">*/
/*                 {% if payment_mp_standard_sandbox %}*/
/*                   <option value="1" selected="selected">{{ text_enabled }}</option>*/
/*                   <option value="0">{{ text_disabled }}</option>*/
/*                 {% else %}*/
/*                   <option value="1">{{ text_enabled }}</option>*/
/*                   <option value="0" selected="selected">{{ text_disabled }}</option>*/
/*                 {% endif %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Installments #}*/
/*           <div class="form-group required">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_installments_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_installments">{{ entry_installments }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_installments" id="payment_mp_standard_installments">*/
/*                 {% for installment in installments %}*/
/*                   {% if installment.id == payment_mp_standard_installments %}*/
/*                     <option value="{{ installment.id }}" selected="selected" id="{{ installment.id }}">{{ installment.value }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ installment.id }}" id="{{ installment.id }}">{{ installment.value }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Excluded Methods #}*/
/*           {% if count_payment_methods > 0 %}<div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_payments_not_accept_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_methods">{{ entry_payments_not_accept }}</label>*/
/*             <div class="col-sm-10" id="div_payments">*/
/*               <div style="margin-top:8px;">*/
/*                 <input type="hidden" class="form-control" id="payment_nro_count_payment_methods" name="payment_nro_count_payment_methods" value="{{ count_payment_methods }}" />*/
/*                 {% for method in methods %}*/
/*                   <div style="{{ payment_style }}" id="{{ method.name }}">*/
/*                     {% if method.id in payment_mp_standard_methods %}*/
/*                       <img src="{{ method.secure_thumbnail }}" height="24"><br/>*/
/*                       <input name="payment_mp_standard_methods[]" type="checkbox" checked="yes" value="{{ method.id }}" style="margin-top:25%; margin-top:4px; border:1px solid #888; width:16px; height:16px;">*/
/*                     {% else %}*/
/*                       <img src="{{ method.secure_thumbnail }}" height="24"><br/>*/
/*                       <input name="payment_mp_standard_methods[]" type="checkbox" value="{{ method.id }}" style="margin-left:25%; margin-top:4px; border:1px solid #888; width:16px; height:16px;">*/
/*                     {% endif %}*/
/*                   </div>*/
/*                 {% endfor %}*/
/*               </div>*/
/*             </div>*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {% if error_has_no_payments %}*/
/*                 <div class="text-danger">{{ error_entry_no_payments }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>{% endif %}*/
/*           {# Order Approved #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_approved_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_completed">{{ entry_order_status_approved }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_completed" id="payment_mp_standard_order_status_id_completed">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_completed %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order Pending #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_pending_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_pending">{{ entry_order_status_pending }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_pending" id="payment_mp_standard_order_status_id_pending">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_pending %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order Canceled #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_canceled_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_canceled">{{ entry_order_status_canceled }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_canceled" id="payment_mp_standard_order_status_id_canceled">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_canceled %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order In Process #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_in_process_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_in_process">{{ entry_order_status_in_process }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_in_process" id="payment_mp_standard_order_status_id_in_process">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_in_process %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order Rejected #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_rejected_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_rejected">{{ entry_order_status_rejected }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_rejected" id="payment_mp_standard_order_status_id_rejected">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_rejected %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order Refunded #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_refunded_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_refunded">{{ entry_order_status_refunded }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_refunded" id="payment_mp_standard_order_status_id_refunded">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_refunded %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order In Mediation #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_in_mediation_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_in_mediation">{{ entry_order_status_in_mediation }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_in_mediation" id="payment_mp_standard_order_status_id_in_mediation">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_in_mediation %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*           {# Order Chargedback #}*/
/*           <div class="form-group">*/
/*             <label class="col-sm-2"></label>*/
/*             <div class="col-sm-10">*/
/*               {{ entry_order_status_chargeback_tooltip }}*/
/*             </div>*/
/*             <label class="col-sm-2 control-label" for="payment_mp_standard_order_status_id_chargeback">{{ entry_order_status_chargeback }}</label>*/
/*             <div class="col-sm-10">*/
/*               <select class="form-control" name="payment_mp_standard_order_status_id_chargeback" id="payment_mp_standard_order_status_id_chargeback">*/
/*                 {% for order_status in order_statuses %}*/
/*                   {% if order_status.order_status_id == payment_mp_standard_order_status_id_chargeback %}*/
/*                     <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*                   {% else %}*/
/*                     <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </select>*/
/*             </div>*/
/*           </div>*/
/*         </form>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* <script type="text/javascript" src="./view/javascript/mp/standard/mp_standard.js"></script>*/
/* <script type="text/javascript" src="./view/javascript/mp/spinner.min.js"></script>*/
/* {{ footer }}*/
/* */
