<?php

/* default/template/extension/payment/mp_standard_success.twig */
class __TwigTemplate_1d3f593f2176db3689722ce77f9b4bbe8f231276ec6df6428ba01136111344ed extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" dir=\"";
        // line 3
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["language"]) ? $context["language"] : null);
        echo "\" xml:lang=\"";
        echo (isset($context["language"]) ? $context["language"] : null);
        echo "\">
\t<head>
\t\t<title>";
        // line 5
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
\t\t<base href=\"";
        // line 6
        echo (isset($context["base"]) ? $context["base"] : null);
        echo "\" />
\t</head>
\t<body>
\t\t<div class=\"div-ajax-carregamento-pagina\"></div>
\t\t<div>";
        // line 10
        echo "Aguarde...";
        echo "</div>
\t\t<script type=\"text/javascript\"  src=\"https://secure.mlstatic.com/modules/javascript/analytics.js\">

\t\t</script>

\t\t<script type=\"text/javascript\">
\t\t    ModuleAnalytics.setToken(\"";
        // line 16
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "\");
\t\t\tModuleAnalytics.setPaymentId(\"";
        // line 17
        echo (isset($context["paymentId"]) ? $context["paymentId"] : null);
        echo "\");
\t\t\tModuleAnalytics.setPaymentType(\"";
        // line 18
        echo (isset($context["paymentType"]) ? $context["paymentType"] : null);
        echo "\");
\t\t\tModuleAnalytics.setCheckoutType(\"";
        // line 19
        echo (isset($context["checkoutType"]) ? $context["checkoutType"] : null);
        echo "\");
\t\t\tModuleAnalytics.put(retorno());
\t\t\tfunction retorno() {
\t\t\t\tsetTimeout('location = \\'";
        // line 22
        echo (isset($context["continue"]) ? $context["continue"] : null);
        echo "\\';', 1);
\t\t\t}
\t\t</script>
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/mp_standard_success.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 22,  64 => 19,  60 => 18,  56 => 17,  52 => 16,  43 => 10,  36 => 6,  32 => 5,  23 => 3,  19 => 1,);
    }
}
/* <?xml version="1.0" encoding="UTF-8"?>*/
/* <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">*/
/* <html xmlns="http://www.w3.org/1999/xhtml" dir="{{ direction }}" lang="{{ language }}" xml:lang="{{ language }}">*/
/* 	<head>*/
/* 		<title>{{ title }}</title>*/
/* 		<base href="{{ base }}" />*/
/* 	</head>*/
/* 	<body>*/
/* 		<div class="div-ajax-carregamento-pagina"></div>*/
/* 		<div>{{ "Aguarde..." }}</div>*/
/* 		<script type="text/javascript"  src="https://secure.mlstatic.com/modules/javascript/analytics.js">*/
/* */
/* 		</script>*/
/* */
/* 		<script type="text/javascript">*/
/* 		    ModuleAnalytics.setToken("{{ token }}");*/
/* 			ModuleAnalytics.setPaymentId("{{ paymentId }}");*/
/* 			ModuleAnalytics.setPaymentType("{{ paymentType }}");*/
/* 			ModuleAnalytics.setCheckoutType("{{ checkoutType }}");*/
/* 			ModuleAnalytics.put(retorno());*/
/* 			function retorno() {*/
/* 				setTimeout('location = \'{{ continue }}\';', 1);*/
/* 			}*/
/* 		</script>*/
/* 	</body>*/
/* </html>*/
/* */
