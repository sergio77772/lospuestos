<?php

/* default/template/extension/payment/mp_standard.twig */
class __TwigTemplate_262decf73cc53473258641f153d4ccac2e181c54b05f4d6b32717325f2c1cad5 extends Twig_Template
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
        echo "<style>
\t.mp-standard-banner {
\t\twidth: 320px;
\t\tdisplay: inline;
\t\tmargin-top: 10px;
\t\tmargin-left: 50px;
\t\tmargin-bottom: 10px;
\t}
\t.mp-form {
\t\tborder: 1px solid #d6d4d4;
\t\tborder-radius: 4px;
\t\tpadding: 10px;
\t\twidth: 570px;
\t\tbackground: white;
\t\tmargin-bottom: 20px;
\t}
\t.hover:hover {
\t\tbackground: 60% no-repeat whitesmoke;
\t}
\t.payment-label {
\t\tfont: bolder 20px/24px \"Open Sans\", sans-serif;
\t\tcolor: #333333;
\t\tmargin-left: 28px;
\t}
\t.standard {
\t\tfont: 600 13px/15px \"Open Sans\", sans-serif;
\t\tmargin-left: 174px;
\t\tdisplay: block;
\t}
</style>

";
        // line 32
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 33
            echo "\t<div class=\"warning\">
\t\t";
            // line 34
            if ((isset($context["debug"]) ? $context["debug"] : null)) {
                // line 35
                echo "\t\t\t";
                echo "<strong>Mercado Pago failed to connect, and debug mode is on. Check the errors below and, for security reasons, turn it off after problem is solved:</strong><br/>";
                echo "
\t\t";
                // line 36
                echo "<pre>";
                echo "
\t\t\t";
                // line 37
                echo (isset($context["error"]) ? $context["error"] : null);
                echo "
\t\t\t";
                // line 38
                echo "</pre><br/>";
                echo "
\t\t";
            } else {
                // line 40
                echo "\t\t\t";
                echo "<strong>Sorry, Mercado Pago failed to connect.<br/>If you are the store admin, turn on debug mode to get more details about the reasons of this error.</strong><br/>";
                echo "
\t\t";
            }
            // line 42
            echo "\t</div>
";
        } else {
            // line 44
            echo "\t";
            if (((isset($context["type_checkout"]) ? $context["type_checkout"] : null) == "Redirect")) {
                // line 45
                echo "\t\t<div class=\"row\"><div class=\"col-xs-12 col-md-6\">
\t\t\t<a href=\"";
                // line 46
                echo (isset($context["redirect_link"]) ? $context["redirect_link"] : null);
                echo "\" id=\"id-standard\" mp-mode=\"redirect\" name=\"MP-Checkout\">
\t\t\t\t<div class=\"mp-form hover\"><div class=\"row\"><div class=\"col\">
\t\t\t\t\t<img style=\"margin-left: 20px;\" src=\"admin/view/image/payment/mp_standard.png\" id=\"id-standard-logo\">
\t\t\t\t\t<img src=\"admin/view/image/payment/";
                // line 49
                echo (isset($context["action"]) ? $context["action"] : null);
                echo "/banner_all_methods.png\" class=\"mp-standard-banner\" />
\t\t\t\t\t<span class=\"payment-label standard\">";
                // line 50
                echo "Pay with Mercado Pago, up to 24x installments.";
                echo "</span>
\t\t\t\t</div></div></div>
\t\t\t</a>
\t\t</div></div>
\t";
            } elseif ((            // line 54
(isset($context["type_checkout"]) ? $context["type_checkout"] : null) == "Iframe")) {
                // line 55
                echo "\t\t<iframe src=\"";
                echo (isset($context["redirect_link"]) ? $context["redirect_link"] : null);
                echo "\" name=\"MP-Checkout\" width=\"740\" height=\"600\" frameborder=\"0\"></iframe>
\t\t<script type=\"text/javascript\">
\t\t\t(function(){function \$MPBR_load(){console.log('iframe checkout');window.\$MPBR_loaded !== true && (function(){var s = document.createElement(\"script\");s.type = \"text/javascript\";s.async = true;
\t\t\ts.src = (\"https:\"==document.location.protocol?\"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/\":\"http://mp-tools.mlstatic.com/buttons/\")+\"render.js\";
\t\t\tvar x = document.getElementsByTagName(\"script\")[0];x.parentNode.insertBefore(s, x);window.\$MPBR_loaded = true;})();}
\t\t\twindow.\$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent(\"onload\", \$MPBR_load) : window.addEventListener(\"load\", \$MPBR_load, false)) : null;})();
\t\t</script>
\t
\t";
            } elseif ((            // line 63
(isset($context["type_checkout"]) ? $context["type_checkout"] : null) == "Lightbox")) {
                // line 64
                echo "\t\t<div>
\t\t\t";
                // line 65
                echo "<script type='text/javascript' src='./catalog/view/javascript/mp/render.js'></script>";
                echo "
\t\t\t";
                // line 66
                echo "<script type='text/javascript'>";
                echo "
\t\t\t";
                // line 67
                echo (("(function() { \$MPC.openCheckout({ url: '" . (isset($context["redirect_link"]) ? $context["redirect_link"] : null)) . "', mode: 'modal' }); })();");
                echo "
\t\t\t";
                // line 68
                echo "</script>";
                echo "
\t\t\t";
                // line 69
                echo (((("<figure style='text-align:center'><img src='admin/view/image/payment/" . (isset($context["action"]) ? $context["action"] : null)) . "/banner_all_methods.png' class='mp-standard-banner' /><figcaption><b><a id='submit-payment' href='") . (isset($context["redirect_link"]) ? $context["redirect_link"] : null)) . "' name='MP-Checkout' mp-mode='modal'>Pague con/com  Mercado Pago</a></b></figcaption></figure>");
                echo "
\t\t</div>
\t";
            } else {
                // line 72
                echo "\t\t<div class=\"row\"><div class=\"col-xs-12 col-md-6\">
\t\t\t<a href=\"";
                // line 73
                echo (isset($context["redirect_link"]) ? $context["redirect_link"] : null);
                echo "\" id=\"id-standard\" mp-mode=\"redirect\" name=\"MP-Checkout\">
\t\t\t\t<div class=\"mp-form hover\"><div class=\"row\"><div class=\"col\">
\t\t\t\t\t<img style=\"margin-left: 20px;\" src=\"admin/view/image/payment/mp_standard.png\" id=\"id-standard-logo\">
\t\t\t\t\t<img src=\"admin/view/image/payment/";
                // line 76
                echo (isset($context["action"]) ? $context["action"] : null);
                echo "/banner_all_methods.png\" class=\"mp-standard-banner\" />
\t\t\t\t\t<span class=\"payment-label standard\">";
                // line 77
                echo "Pay with Mercado Pago, up to 24x installments.";
                echo "</span>
\t\t\t\t</div></div></div>
\t\t\t</a>
\t\t</div></div>
\t";
            }
        }
        // line 83
        echo "
<script type=\"text/javascript\">
\t\$.getScript(\"https://secure.mlstatic.com/modules/javascript/analytics.js\", function(){
\t\tModuleAnalytics.setToken(\"";
        // line 86
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "token", array(), "array");
        echo "\");
\t\tModuleAnalytics.setPlatform(\"";
        // line 87
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "platform", array(), "array");
        echo "\");
\t\tModuleAnalytics.setPlatformVersion(\"";
        // line 88
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "platformVersion", array(), "array");
        echo "\");
\t\tModuleAnalytics.setModuleVersion(\"";
        // line 89
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "moduleVersion", array(), "array");
        echo "\");
\t\tModuleAnalytics.setPayerEmail(\"";
        // line 90
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "payerEmail", array(), "array");
        echo "\");
\t\tModuleAnalytics.setUserLogged(parseInt(\"";
        // line 91
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "userLogged", array(), "array");
        echo "\"));
\t\tModuleAnalytics.setInstalledModules(\"";
        // line 92
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "installedModules", array(), "array");
        echo "\");
\t\tModuleAnalytics.setAdditionalInfo(\"";
        // line 93
        echo $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : null), "additionalInfo", array(), "array");
        echo "\");
\t\tModuleAnalytics.post();
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/mp_standard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 93,  202 => 92,  198 => 91,  194 => 90,  190 => 89,  186 => 88,  182 => 87,  178 => 86,  173 => 83,  164 => 77,  160 => 76,  154 => 73,  151 => 72,  145 => 69,  141 => 68,  137 => 67,  133 => 66,  129 => 65,  126 => 64,  124 => 63,  112 => 55,  110 => 54,  103 => 50,  99 => 49,  93 => 46,  90 => 45,  87 => 44,  83 => 42,  77 => 40,  72 => 38,  68 => 37,  64 => 36,  59 => 35,  57 => 34,  54 => 33,  52 => 32,  19 => 1,);
    }
}
/* <style>*/
/* 	.mp-standard-banner {*/
/* 		width: 320px;*/
/* 		display: inline;*/
/* 		margin-top: 10px;*/
/* 		margin-left: 50px;*/
/* 		margin-bottom: 10px;*/
/* 	}*/
/* 	.mp-form {*/
/* 		border: 1px solid #d6d4d4;*/
/* 		border-radius: 4px;*/
/* 		padding: 10px;*/
/* 		width: 570px;*/
/* 		background: white;*/
/* 		margin-bottom: 20px;*/
/* 	}*/
/* 	.hover:hover {*/
/* 		background: 60% no-repeat whitesmoke;*/
/* 	}*/
/* 	.payment-label {*/
/* 		font: bolder 20px/24px "Open Sans", sans-serif;*/
/* 		color: #333333;*/
/* 		margin-left: 28px;*/
/* 	}*/
/* 	.standard {*/
/* 		font: 600 13px/15px "Open Sans", sans-serif;*/
/* 		margin-left: 174px;*/
/* 		display: block;*/
/* 	}*/
/* </style>*/
/* */
/* {% if error %}*/
/* 	<div class="warning">*/
/* 		{% if debug %}*/
/* 			{{ "<strong>Mercado Pago failed to connect, and debug mode is on. Check the errors below and, for security reasons, turn it off after problem is solved:</strong><br/>" }}*/
/* 		{{ "<pre>" }}*/
/* 			{{ error }}*/
/* 			{{ "</pre><br/>" }}*/
/* 		{% else %}*/
/* 			{{ "<strong>Sorry, Mercado Pago failed to connect.<br/>If you are the store admin, turn on debug mode to get more details about the reasons of this error.</strong><br/>" }}*/
/* 		{% endif %}*/
/* 	</div>*/
/* {% else %}*/
/* 	{% if type_checkout == "Redirect" %}*/
/* 		<div class="row"><div class="col-xs-12 col-md-6">*/
/* 			<a href="{{ redirect_link }}" id="id-standard" mp-mode="redirect" name="MP-Checkout">*/
/* 				<div class="mp-form hover"><div class="row"><div class="col">*/
/* 					<img style="margin-left: 20px;" src="admin/view/image/payment/mp_standard.png" id="id-standard-logo">*/
/* 					<img src="admin/view/image/payment/{{ action }}/banner_all_methods.png" class="mp-standard-banner" />*/
/* 					<span class="payment-label standard">{{ "Pay with Mercado Pago, up to 24x installments." }}</span>*/
/* 				</div></div></div>*/
/* 			</a>*/
/* 		</div></div>*/
/* 	{% elseif type_checkout == "Iframe" %}*/
/* 		<iframe src="{{ redirect_link }}" name="MP-Checkout" width="740" height="600" frameborder="0"></iframe>*/
/* 		<script type="text/javascript">*/
/* 			(function(){function $MPBR_load(){console.log('iframe checkout');window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;*/
/* 			s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";*/
/* 			var x = document.getElementsByTagName("script")[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;})();}*/
/* 			window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent("onload", $MPBR_load) : window.addEventListener("load", $MPBR_load, false)) : null;})();*/
/* 		</script>*/
/* 	*/
/* 	{% elseif type_checkout == "Lightbox" %}*/
/* 		<div>*/
/* 			{{ "<script type='text/javascript' src='./catalog/view/javascript/mp/render.js'></script>" }}*/
/* 			{{ "<script type='text/javascript'>" }}*/
/* 			{{ "(function() { $MPC.openCheckout({ url: '#{ redirect_link }', mode: 'modal' }); })();" }}*/
/* 			{{ "</script>" }}*/
/* 			{{ "<figure style='text-align:center'><img src='admin/view/image/payment/#{ action }/banner_all_methods.png' class='mp-standard-banner' /><figcaption><b><a id='submit-payment' href='#{ redirect_link }' name='MP-Checkout' mp-mode='modal'>Pague con/com  Mercado Pago</a></b></figcaption></figure>" }}*/
/* 		</div>*/
/* 	{% else %}*/
/* 		<div class="row"><div class="col-xs-12 col-md-6">*/
/* 			<a href="{{ redirect_link }}" id="id-standard" mp-mode="redirect" name="MP-Checkout">*/
/* 				<div class="mp-form hover"><div class="row"><div class="col">*/
/* 					<img style="margin-left: 20px;" src="admin/view/image/payment/mp_standard.png" id="id-standard-logo">*/
/* 					<img src="admin/view/image/payment/{{ action }}/banner_all_methods.png" class="mp-standard-banner" />*/
/* 					<span class="payment-label standard">{{ "Pay with Mercado Pago, up to 24x installments." }}</span>*/
/* 				</div></div></div>*/
/* 			</a>*/
/* 		</div></div>*/
/* 	{% endif %}*/
/* {% endif %}*/
/* */
/* <script type="text/javascript">*/
/* 	$.getScript("https://secure.mlstatic.com/modules/javascript/analytics.js", function(){*/
/* 		ModuleAnalytics.setToken("{{ analytics['token'] }}");*/
/* 		ModuleAnalytics.setPlatform("{{ analytics['platform'] }}");*/
/* 		ModuleAnalytics.setPlatformVersion("{{ analytics['platformVersion'] }}");*/
/* 		ModuleAnalytics.setModuleVersion("{{ analytics['moduleVersion'] }}");*/
/* 		ModuleAnalytics.setPayerEmail("{{ analytics['payerEmail'] }}");*/
/* 		ModuleAnalytics.setUserLogged(parseInt("{{ analytics['userLogged'] }}"));*/
/* 		ModuleAnalytics.setInstalledModules("{{ analytics['installedModules'] }}");*/
/* 		ModuleAnalytics.setAdditionalInfo("{{ analytics['additionalInfo'] }}");*/
/* 		ModuleAnalytics.post();*/
/* 	});*/
/* </script>*/
/* */
