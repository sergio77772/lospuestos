<?php

/* extension/payment/todopago.twig */
class __TwigTemplate_0081de09b1bea7a06400cdae564b0e46ab6ce1d0c1f9d7d069845ae528929671 extends Twig_Template
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
        echo "
";
        // line 2
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <h1>Todo Pago (";
        // line 6
        echo (isset($context["payment_todopago_version"]) ? $context["payment_todopago_version"] : null);
        echo ")</h1>
            <div class=\"pull-right\">
                <a onclick=\"\$('#form').submit();\" class=\"btn btn-primary\" data-toggle=\"tooltip\"
                   title=\"";
        // line 9
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\"><i class=\"fa ";
        echo (isset($context["button_save_class"]) ? $context["button_save_class"] : null);
        echo "\"></i></a>
                <a href=\"";
        // line 10
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"Cancelar\"><i
                            class=\"fa fa-reply\"></i></a>
            </div>
            <ul class=\"breadcrumb\">
                ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 15
            echo "                    <li>
                        <a href=\"";
            // line 16
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">
                            ";
            // line 17
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "
                        </a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "            </ul>
        </div>
    </div>
    <div class=\"container-fluid\">
        ";
        // line 25
        if (((isset($context["need_upgrade"]) ? $context["need_upgrade"] : null) == true)) {
            // line 26
            echo "            <div class=\"alert alert-warning\"><i class=\"fa fa-exclamation-circle\"></i>
                Usted ha subido una nueva versión del módulo, para su correcto funcionamiento debe actualizarlo
                haciendo click en el botón \"Upgrade\" indicado con el &iacute;cono <i
                        class=\"fa ";
            // line 29
            echo (isset($context["button_save_class"]) ? $context["button_save_class"] : null);
            echo "\"></i>
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        }
        // line 33
        echo "        ";
        if (((isset($context["need_update"]) ? $context["need_update"] : null) == true)) {
            // line 34
            echo "            <div class=\"alert alert-warning\"><i class=\"fa fa-exclamation-circle\"></i>
                Se encuentra disponible una versión más reciente del plugin de Todo Pago, puede consultarla desde <a
                        href=\"https://github.com/TodoPago/Plugin-OpenCart3\" target=\"_blank\"><i
                            class=\"fa fa-github\"></i>aquí</a>
            </div>
        ";
        }
        // line 40
        echo "        ";
        if ( !(null === $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "error_warning", array()))) {
            // line 41
            echo "            <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i>
                ";
            // line 42
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "error_warning", array());
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"fa fa-close\"></i></button>
            </div>
        ";
        }
        // line 46
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i>Configuración de Todo Pago</h3>
            </div>
            <div class=\"panel-body\">

                <form action=\"";
        // line 52
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form\"
                      class=\"form-horizontal\">
                    <ul class=\"nav nav-tabs\">
                        <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">GENERAL</a>
                        </li>
                        <li><a href=\"#tab-billetera\" data-toggle=\"tab\">BILLETERA VIRTUAL</a></li>
                        <li><a href=\"#tab-test\" data-toggle=\"tab\">AMBIENTE TEST</a>
                        </li>
                        <li><a href=\"#tab-produccion\" data-toggle=\"tab\">AMBIENTE PRODUCCION</a>
                        </li>
                        <li><a href=\"#tab-estadosdelpedido\" data-toggle=\"tab\">ESTADOS DEL PEDIDO</a>
                        </li>
                        <li><a href=\"#tab-status\" data-toggle=\"tab\">STATUS DE LAS OPERACIONES</a>
                        </li>
                    </ul>
                    <div class=\"tab-content\">
                        <!-- TAB GENERAL -->
                        <div class=\"tab-pane active\" id=\"tab-general\">
                            <input type=\"hidden\" name=\"upgrade\" value=\"";
        // line 70
        echo (isset($context["need_upgrade"]) ? $context["need_upgrade"] : null);
        echo " ?\">
                            <input type=\"hidden\" name=\"payment_todopago_version\" value=\"";
        // line 71
        echo (isset($context["payment_todopago_version"]) ? $context["payment_todopago_version"] : null);
        echo "\">
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_status\">Activar</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_status\"
                                            id=\"payment_todopago_status\">
                                        <option value=\"1\" ";
        // line 77
        if ((isset($context["payment_todopago_status"]) ? $context["payment_todopago_status"] : null)) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            ";
        // line 78
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "
                                        </option>
                                        <option value=\"0\" ";
        // line 80
        if (((isset($context["payment_todopago_status"]) ? $context["payment_todopago_status"] : null) == 0)) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            ";
        // line 81
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "
                                        </option>
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\">
                                    <div class=\"info-field col-sm-5\"><em>Activa y desactiva el módulo de pago</em>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\" style=\"opacity: 0; height: 0; margin: 0; padding: 0\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopagobilletera_status\">Activar</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopagobilletera_status\"
                                            id=\"payment_todopagobilletera_status\">
                                        <option value=\"1\" ";
        // line 95
        if ((isset($context["payment_todopago_status"]) ? $context["payment_todopago_status"] : null)) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            ";
        // line 96
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "
                                        </option>
                                        <option value=\"0\" ";
        // line 98
        if (((isset($context["payment_todopago_status"]) ? $context["payment_todopago_status"] : null) == 0)) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            ";
        // line 99
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "
                                        </option>
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\">
                                    <div class=\"info-field col-sm-5\"><em>Activa y desactiva el módulo de pago</em>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_segmentodelcomercio\">Segmento
                                    del
                                    Comercio</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_segmentodelcomercio\"
                                            id=\"payment_todopago_segmentodelcomercio\">
                                        <option value=\"Retail\" ";
        // line 115
        if (((isset($context["payment_todopago_segmentodelcomercio"]) ? $context["payment_todopago_segmentodelcomercio"] : null) == "retail")) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            Retail
                                        </option>
                                        <!--<option value=\"Ticketing\" <?php if (\$todopago_segmentodelcomercio==\"Ticketing\" ) echo selected?> >Ticketing</option>
                                        <option value=\"Services\" <?php if (\$todopago_segmentodelcomercio==\"Services\" ) echo selected?> >Service</option>
                                        <option value=\"Digital Goods\" <?php if (\$todopago_segmentodelcomercio==\"Digital Goods\" ) echo selected?> >Digital Goods</option>-->
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>La elección del segmento determina los tipos de
                                        datos a enviar</em>
                                </div>
                            </div>
                            <!--<div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"todopago_canaldeingresodelpedido\">Canal de Ingreso del Pedido</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"todopago_canaldeingresodelpedido\" id=\"todopago_canaldeingresodelpedido\">
                                        <option value=\"Web\" <?php if (\$todopago_canaldeingresodelpedido==\"Web\" ) echo selected ?>>Web</option>
                                        <option value=\"Mobile\" <?php if (\$todopago_canaldeingresodelpedido==\"Mobile\" ) echo selected ?>>Mobile</option>
                                        <option value=\"Telefonica\" <?php if (\$todopago_canaldeingresodelpedido==\"Telefonica\" ) echo selected ?>>Telefonica</option>
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\"><em></em>
                                </div>
                            </div>-->
                            <div class=\"form-group\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_deadline\">Dead Line</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"number\" min=\"0\" class=\"form-control\" name=\"payment_todopago_deadline\"
                                           id=\"payment_todopago_deadline\" value=\"";
        // line 143
        echo (isset($context["payment_todopago_deadline"]) ? $context["payment_todopago_deadline"] : null);
        echo "\"/>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Días máximos para la entrega</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_modotestproduccion\">Modo
                                    test o
                                    Producción</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_modotestproduccion\"
                                            id=\"payment_todopago_modotestproduccion\">
                                        <option value=\"test\" ";
        // line 155
        if (((isset($context["payment_todopago_modotestproduccion"]) ? $context["payment_todopago_modotestproduccion"] : null) == "test")) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            Test
                                        </option>
                                        <option value=\"prod\" ";
        // line 158
        if (((isset($context["payment_todopago_modotestproduccion"]) ? $context["payment_todopago_modotestproduccion"] : null) == "prod")) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            Producción
                                        </option>
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Debe ser configurado en CONFIGURACION - AMBIENTE
                                        TEST / PRODUCCION</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_formulario\">Tipo de
                                    formulario que
                                    desea utilizar</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_formulario\"
                                            id=\"payment_todopago_formulario\">
                                        <option value=\"redirec\" ";
        // line 174
        if (((isset($context["payment_todopago_formulario"]) ? $context["payment_todopago_formulario"] : null) == "redirec")) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            Redirección
                                        </option>
                                        <option value=\"hibrid\" ";
        // line 177
        if (((isset($context["payment_todopago_formulario"]) ? $context["payment_todopago_formulario"] : null) == "hibrid")) {
            echo " ";
            echo "selected";
            echo " ";
        }
        echo ">
                                            Híbrido
                                        </option>
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Puede usar un formulario integrado al comercio o
                                        redireccionar al formulario externo</em>
                                </div>
                            </div>


                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_maxinstallments\">Máximo de
                                    cuotas</label>
                                <div class=\"field col-sm-1\">
                                    <div class=\"checkbox\">
                                        <label><input type=\"checkbox\" id=\"habilitar\"
                                                      value=\"\" ";
        // line 194
        if ( !(null === (isset($context["payment_todopago_maxinstallments"]) ? $context["payment_todopago_maxinstallments"] : null))) {
            echo " ";
            echo "checked";
            echo " ";
        }
        echo ">
                                            Habilitar</label>
                                    </div>
                                </div>
                                <div class=\"field col-sm-4\">
                                    <select class=\"form-control\" name=\"payment_todopago_maxinstallments\"
                                            id=\"payment_todopago_maxinstallments\" disabled>
                                        ";
        // line 201
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 202
            echo "                                            *
                                            <option value=\"";
            // line 203
            echo $context["i"];
            echo "\">";
            echo $context["i"];
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 205
        echo "                                        ";
        echo "<script> \$(\"select option[value=";
        echo " ";
        echo (isset($context["payment_todopago_maxinstallments"]) ? $context["payment_todopago_maxinstallments"] : null);
        echo " ";
        echo "]\").attr(selected, selected); </script>";
        echo "
                                    </select>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>* Seleccione la cantidad máxima de cuotas</em>
                                </div>
                            </div>

                            <!-- TIEMPO DE VIDA DEL FORMULARIO-->
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_timeout_form_enabled\">Habilitar
                                    Tiempo de vida para el formulario de pago</label>
                                <div class=\"field col-sm-1\">
                                    <div class=\"checkbox\">
                                        <label><input type=\"checkbox\" id=\"payment_todopago_timeout_form_enabled\"
                                                      name=\"payment_todopago_timeout_form_enabled\"
                                                      value=\"\"";
        // line 220
        if ((isset($context["payment_todopago_timeout_form"]) ? $context["payment_todopago_timeout_form"] : null)) {
            echo "checked";
        }
        echo ">
                                            Habilitar</label>
                                    </div>
                                </div>
                                <div class=\"field col-sm-4\">
                                    <input type=\"number\" min=\"300000\" max=\"21600000\" class=\"form-control\"
                                           name=\"payment_todopago_timeout_form\" id=\"payment_todopago_timeout_form\"
                                           value=\"";
        // line 227
        if ((isset($context["payment_todopago_timeout_form"]) ? $context["payment_todopago_timeout_form"] : null)) {
            echo (isset($context["payment_todopago_timeout_form"]) ? $context["payment_todopago_timeout_form"] : null);
        } else {
            echo "1800000";
        }
        echo "\"
                                           disabled/>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>* ingrese el tiempo de vida del formulario en ms
                                        (por defecto tiene el valor 1800000 Valor minimo: 300000 (5 minutos)
                                        Valor maximo: 21600000 (6hs))</em>
                                </div>
                            </div>

                            <!-- Vaciar carrito de compras -->
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_cart\">¿Desea vaciar el
                                    carrito de
                                    compras luego de una operación fallida?</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_cart\"
                                            id=\"payment_todopago_cart\">
                                        <option value=\"1\" ";
        // line 244
        if ((isset($context["payment_todopago_cart"]) ? $context["payment_todopago_cart"] : null)) {
            echo "selected";
        }
        echo ">
                                            ";
        // line 245
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "
                                        </option>
                                        <option value=\"0\" ";
        // line 247
        if (((isset($context["payment_todopago_cart"]) ? $context["payment_todopago_cart"] : null) == 0)) {
            echo "selected";
        }
        echo ">
                                            ";
        // line 248
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Validar dirección con gmaps -->
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_gmaps_validacion\">¿Desea
                                    validar la
                                    dirección de compra con Google Maps?</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_gmaps_validacion\"
                                            id=\"payment_todopago_gmaps_validacion\">
                                        <option value=\"1\" ";
        // line 262
        if ((isset($context["payment_todopago_gmaps_validacion"]) ? $context["payment_todopago_gmaps_validacion"] : null)) {
            echo "selected";
        }
        echo ">
                                            ";
        // line 263
        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
        echo "
                                        </option>
                                        <option value=\"0\" ";
        // line 265
        if (((isset($context["payment_todopago_gmaps_validacion"]) ? $context["payment_todopago_gmaps_validacion"] : null) == 0)) {
            echo " ";
            echo "selected";
        }
        echo ">
                                            ";
        // line 266
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- END TAB GENERAL-->

                        <!-- TAB AMBIENTE TEST -->
                        <div class=\"tab-pane\" id=\"tab-test\">
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_authorizationHTTPtest\">Authorization
                                    HTTP</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"text\" name=\"payment_todopago_authorizationHTTPtest\"
                                           value=\"";
        // line 282
        echo (isset($context["payment_todopago_authorizationHTTPtest"]) ? $context["payment_todopago_authorizationHTTPtest"] : null);
        echo "\"
                                           placeholder=\"Authorization\" id=\"payment_todopago_authorizationHTTPtest\"
                                           class=\"form-control\"/>
                                </div>
                                <div class=\"input-field col-sm-5\"><em>ejemplo: PRISMA
                                        912EC803B2CE4xxxx541068D495AB570</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_idsitetest\">Id Site Todo
                                    Pago</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"text\" class=\"form-control\" name=\"payment_todopago_idsitetest\"
                                           id=\"payment_todopago_idsitetest\" value=\"";
        // line 295
        echo (isset($context["payment_todopago_idsitetest"]) ? $context["payment_todopago_idsitetest"] : null);
        echo "\"/>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Número de Comercio provisto por Todo Pago</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_securitytest\">Security
                                    code</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"text\" class=\"form-control\" name=\"payment_todopago_securitytest\"
                                           id=\"payment_todopago_securitytest\"
                                           value=\"";
        // line 306
        echo (isset($context["payment_todopago_securitytest"]) ? $context["payment_todopago_securitytest"] : null);
        echo "\"/>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Código provisto por Todo Pago</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <div class=\"col-sm-2\"></div>
                                <div class=\"field col-sm-4\">
                                    <button type=\"button\" id=\"open\" class=\"btn btn-primary\">Requerir datos</button>
                                    <button type=\"button\" id=\"borrar\" class=\"btn btn-primary\">Borrar</button>
                                </div>
                            </div>
                        </div>

                        <div id=\"popup\" style=\"display: none;\">
                            <div class=\"content-popup\">

                                <div>
                                    <h2>Obtener credenciales <img
                                                src=\"http://www.todopago.com.ar/sites/todopago.com.ar/files/logo.png\">
                                    </h2>

                                    <br/>
                                    <label class=\"control-label\">E-mail</label>
                                    <input id=\"mail\" class=\"form-control\" name=\"mail\" type=\"email\" value=\"\"
                                           placeholder=\"E-mail\"/>
                                    <label class=\"control-label\">Contraseña</label>
                                    <input id=\"pass\" class=\"form-control\" name=\"pass\" type=\"password\" value=\"\"
                                           placeholder=\"Contraseña\"/>
                                    <button id=\"confirm_test\" style=\"margin:20%;\"
                                            class=\"btn-config-credentials btn btn-primary\">Acceder
                                    </button>
                                    <button id=\"cancel\" style=\"margin:20%;\"
                                            class=\"btn-config-credentials btn btn-danger\">Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB AMBIENTE TEST -->

                        <!-- TAB AMBIENTE PRODUCCION -->
                        <div class=\"tab-pane\" id=\"tab-produccion\">
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\"
                                       for=\"payment_todopago_authorizationHTTPproduccion\">Authorization
                                    HTTP</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"text\" name=\"payment_todopago_authorizationHTTPproduccion\"
                                           value=\"";
        // line 354
        echo (isset($context["payment_todopago_authorizationHTTPproduccion"]) ? $context["payment_todopago_authorizationHTTPproduccion"] : null);
        echo "\"
                                           placeholder=\"Authorization\" id=\"payment_todopago_authorizationHTTPproduccion\"
                                           class=\"form-control\"/>
                                </div>
                                <div class=\"input-field col-sm-5\"><em>Se deben pasar los datos en formato json. ejemplo:
                                        { \"Authorization\":\"PRISMA 912EC803B2CE49E4A541068D495AB570\"}</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_idsiteproduccion\">Id Site
                                    Todo
                                    Pago</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"text\" class=\"form-control\" name=\"payment_todopago_idsiteproduccion\"
                                           id=\"payment_todopago_idsiteproduccion\"
                                           value=\"";
        // line 369
        echo (isset($context["payment_todopago_idsiteproduccion"]) ? $context["payment_todopago_idsiteproduccion"] : null);
        echo "\"/>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Número de Comercio provisto por Todo Pago</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_securityproduccion\">Security
                                    code</label>
                                <div class=\"field col-sm-5\">
                                    <input type=\"text\" class=\"form-control\" name=\"payment_todopago_securityproduccion\"
                                           id=\"payment_todopago_securityproduccion\"
                                           value=\"";
        // line 380
        echo (isset($context["payment_todopago_securityproduccion"]) ? $context["payment_todopago_securityproduccion"] : null);
        echo "\"/>
                                </div>
                                <div class=\"info-field col-sm-5\"><em>Código provisto por Todo Pago</em>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <div class=\"col-sm-2\"></div>
                                <div class=\"field col-sm-4\">
                                    <button type=\"button\" id=\"open_prod\" class=\"btn btn-primary\">Requerir datos</button>
                                    <button type=\"button\" id=\"borrar_prod\" class=\"btn btn-primary\">Borrar</button>
                                </div>
                            </div>
                        </div>

                        <div id=\"popup_prod\" style=\"display: none;\">
                            <div class=\"content-popup\">
                                <div>
                                    <h2>Obtener credenciales <img
                                                src=\"http://www.todopago.com.ar/sites/todopago.com.ar/files/logo.png\">
                                    </h2>

                                    <br/>
                                    <label class=\"control-label\">E-mail</label>
                                    <input id=\"mail_prod\" class=\"form-control\" name=\"mail\" type=\"email\" value=\"\"
                                           placeholder=\"E-mail\"/>
                                    <label class=\"control-label\">Contrase&ntilde;a</label>
                                    <input id=\"pass_prod\" class=\"form-control\" name=\"pass\" type=\"password\" value=\"\"
                                           placeholder=\"Contraseña\"/>
                                    <button id=\"confirm_prod\" style=\"margin:20%;\"
                                            class=\"btn-config-credentials btn btn-primary\">Acceder
                                    </button>
                                    <button id=\"cancel_prod\" style=\"margin:20%;\"
                                            class=\"btn-config-credentials btn btn-danger\">Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB AMBIENTE PRODUCCION -->

                        <!-- TAB BILLETERA -->

                        <div class=\"tab-pane\" id=\"tab-billetera\">
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopagobilletera_banner\">
                                    Banner para Billetera Virtual
                                </label>
                                <div class=\"field col-sm-5\">
                                    ";
        // line 427
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["billetera_banners"]) ? $context["billetera_banners"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 428
            echo "                                        <input ";
            if ((((isset($context["payment_todopagobilletera_banner"]) ? $context["payment_todopagobilletera_banner"] : null) == "") && ($this->getAttribute($context["loop"], "index", array()) == 1))) {
                echo " checked=\"checked\" ";
            }
            echo " type=\"radio\" class=\"form-control\" name=\"payment_todopagobilletera_banner\" value=\"";
            echo $this->getAttribute($context["banner"], "value", array(), "array");
            echo "\" ";
            if (($this->getAttribute($context["banner"], "value", array(), "array") == (isset($context["payment_todopagobilletera_banner"]) ? $context["payment_todopagobilletera_banner"] : null))) {
                echo " checked=\"checked\" ";
            }
            echo " }>
                                        <img src=\"";
            // line 429
            echo $this->getAttribute($context["banner"], "img", array(), "array");
            echo "\"  style=\"margin-left: 40px; transform: translateY(-50%);\">
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 431
        echo "                                </div>
                            </div>
                        </div>


                        <!-- END TAB BILLETERA -->

                        <!-- TAB ESTADO DEL PEDIDO -->
                        <div class=\"tab-pane\" id=\"tab-estadosdelpedido\">
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_order_status_id_pro\">Estado
                                      cuando
                                    la transaccion ha sido iniciada</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_order_status_id_pro\"
                                            id=\"payment_todopago_order_status_id_pro\">
                                        ";
        // line 447
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 448
            echo "                                            <option value=\"";
            echo $this->getAttribute($context["order_status"], "order_status_id", array());
            echo "\"
                                                    ";
            // line 449
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_todopago_order_status_id_pro"]) ? $context["payment_todopago_order_status_id_pro"] : null))) {
                echo " ";
                echo "selected";
            }
            echo ">
                                                ";
            // line 450
            echo $this->getAttribute($context["order_status"], "name", array());
            echo "
                                            </option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 453
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_order_status_id_aprov\">Estado
                                    cuando
                                    la transaccion ha sido aprobada</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_order_status_id_aprov\"
                                            id=\"payment_todopago_order_status_id_aprov\">
                                        ";
        // line 463
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 464
            echo "                                            <option value=\"";
            echo $this->getAttribute($context["order_status"], "order_status_id", array());
            echo "\"
                                                    ";
            // line 465
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_todopago_order_status_id_aprov"]) ? $context["payment_todopago_order_status_id_aprov"] : null))) {
                echo "selected";
            }
            echo ">
                                                ";
            // line 466
            echo $this->getAttribute($context["order_status"], "name", array());
            echo "
                                            </option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 469
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_order_status_id_rech\">Estado
                                    cuando la transaccion ha sido Rechazada</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_order_status_id_rech\"
                                            id=\"payment_todopago_order_status_id_rech\">
                                        ";
        // line 478
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 479
            echo "                                            <option value=\"";
            echo $this->getAttribute($context["order_status"], "order_status_id", array());
            echo "\"
                                                    ";
            // line 480
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_todopago_order_status_id_rech"]) ? $context["payment_todopago_order_status_id_rech"] : null))) {
                echo "selected";
            }
            echo ">
                                                ";
            // line 481
            echo $this->getAttribute($context["order_status"], "name", array());
            echo "
                                            </option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 484
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"form-group required\">
                                <label class=\"col-sm-2 control-label\" for=\"payment_todopago_order_status_id_off\">Estado
                                    cuando
                                    la transaccion ha sido Offline</label>
                                <div class=\"field col-sm-5\">
                                    <select class=\"form-control\" name=\"payment_todopago_order_status_id_off\"
                                            id=\"payment_todopago_order_status_id_off\">
                                        ";
        // line 494
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 495
            echo "                                            <option value=\"";
            echo $this->getAttribute($context["order_status"], "order_status_id", array());
            echo "\"
                                                    ";
            // line 496
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["payment_todopago_order_status_id_off"]) ? $context["payment_todopago_order_status_id_off"] : null))) {
                echo "selected";
            }
            echo ">
                                                ";
            // line 497
            echo $this->getAttribute($context["order_status"], "name", array());
            echo "
                                            </option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 500
        echo "                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- END TAB ESTADO DEL PEDIDO -->

                        <!-- TAB STATUS-->
                        <div class=\"tab-pane\" id=\"tab-status\">
                            <table class=\"form\" border=\"1\">
                                <script type=\"text/javascript\">
                                    \$(document).ready(function () {
                                        var valores = '";
        // line 512
        echo (isset($context["orders_array"]) ? $context["orders_array"] : null);
        echo "';
                                        var tabla_db = '';
                                        valores_json = JSON.parse(valores);
                                        valores_json.forEach(function (value, key) {
                                            tabla_db += \"<tr>\";
                                            tabla_db += \"<th><a onclick='verstatus(\" + value.order_id + \")' style='cursor:pointer'>\" + value.order_id + \"</a></th>\";
                                            tabla_db += \"<th>\" + value.date_added + \"</th>\";
                                            tabla_db += \"<th>\" + value.firstname + \"</th>\";
                                            tabla_db += \"<th>\" + value.lastname + \"</th>\";
                                            tabla_db += \"<th>\" + value.store_name + \"</th>\";
                                            tabla_db += \"<th>\$\" + value.total + \"</th>\";
                                            tabla_db += \"<th><a onclick='devolver(\" + value.order_id + \")' style='cursor:pointer'>Devolver</a></th>\";
                                            tabla_db += \"</tr>\";
                                        });
                                        \$(\"#tabla_db\").prepend(tabla_db);
                                        \$('#tabla').dataTable();
                                    });

                                    function verstatus(order) {
                                        \$('#content').css('cursor', 'progress');
                                        var url_get_status = '";
        // line 532
        echo (isset($context["url_get_status"]) ? $context["url_get_status"] : null);
        echo "';
                                        \$.get(url_get_status, {
                                            order_id: order
                                        }, llegadaDatos);
                                        return false;
                                    }

                                    function llegadaDatos(datos) {
                                        \$('#content').css('cursor', 'auto');
                                        var modal = new tingle.modal({
                                            footer: true,
                                            stickyFooter: false,
                                            closeMethods: ['overlay', 'button', 'escape'],
                                            closeLabel: \"Close\"
                                        });
                                        modal.setContent(datos);
                                        modal.open();
                                    }
                                </script>
                                <link rel=\"stylesheet\"
                                      href=\"http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css\">
                                <table id=\"tabla\" class=\"display\" cellspacing=\"0\" width=\"100%\">

                                    <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Tienda</th>
                                        <th>Total</th>
                                        <th>devolucion</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Tienda</th>
                                        <th>Total</th>
                                        <th>devolucion</th>
                                    </tr>
                                    </tfoot>

                                    <tbody id=\"tabla_db\">
                                    </tbody>
                                </table>
                            </table>
                        </div>
                        <!-- END TAB STATUS-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
";
        // line 591
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "


<!--Devoluciones-->
<script type=\"text/javascript\">
    function devolver(order_id) {
        var monto = prompt(\"Monto parcial a devolver (valor real del producto, sin el costo adicional) o vacío para devolución total (ej: 1.23): \", \"\");
        if (monto !== null) {
            \$('#content').css('cursor', 'progress');
            var url_devolver = '";
        // line 600
        echo (isset($context["url_devolver"]) ? $context["url_devolver"] : null);
        echo "';
            \$.post(url_devolver, {order_id: order_id, monto: monto}, llegadaDatosDevolucion);
        }
        return false;
    }

    function llegadaDatosDevolucion(datos) {
        \$('#content').css('cursor', 'auto');
        alert(datos);
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "extension/payment/todopago.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  982 => 600,  970 => 591,  908 => 532,  885 => 512,  871 => 500,  862 => 497,  856 => 496,  851 => 495,  847 => 494,  835 => 484,  826 => 481,  820 => 480,  815 => 479,  811 => 478,  800 => 469,  791 => 466,  785 => 465,  780 => 464,  776 => 463,  764 => 453,  755 => 450,  748 => 449,  743 => 448,  739 => 447,  721 => 431,  705 => 429,  692 => 428,  675 => 427,  625 => 380,  611 => 369,  593 => 354,  542 => 306,  528 => 295,  512 => 282,  493 => 266,  486 => 265,  481 => 263,  475 => 262,  458 => 248,  452 => 247,  447 => 245,  441 => 244,  417 => 227,  405 => 220,  382 => 205,  372 => 203,  369 => 202,  365 => 201,  351 => 194,  327 => 177,  317 => 174,  294 => 158,  284 => 155,  269 => 143,  234 => 115,  215 => 99,  207 => 98,  202 => 96,  194 => 95,  177 => 81,  169 => 80,  164 => 78,  156 => 77,  147 => 71,  143 => 70,  122 => 52,  114 => 46,  107 => 42,  104 => 41,  101 => 40,  93 => 34,  90 => 33,  83 => 29,  78 => 26,  76 => 25,  70 => 21,  60 => 17,  56 => 16,  53 => 15,  49 => 14,  42 => 10,  36 => 9,  30 => 6,  23 => 2,  19 => 1,);
    }
}
/* {{ header }}*/
/* {{ column_left }}*/
/* <div id="content">*/
/*     <div class="page-header">*/
/*         <div class="container-fluid">*/
/*             <h1>Todo Pago ({{ payment_todopago_version }})</h1>*/
/*             <div class="pull-right">*/
/*                 <a onclick="$('#form').submit();" class="btn btn-primary" data-toggle="tooltip"*/
/*                    title="{{ button_save }}"><i class="fa {{ button_save_class }}"></i></a>*/
/*                 <a href="{{ cancel }}" class="btn btn-default" data-toggle="tooltip" title="Cancelar"><i*/
/*                             class="fa fa-reply"></i></a>*/
/*             </div>*/
/*             <ul class="breadcrumb">*/
/*                 {% for breadcrumb in breadcrumbs %}*/
/*                     <li>*/
/*                         <a href="{{ breadcrumb.href }}">*/
/*                             {{ breadcrumb.text }}*/
/*                         </a>*/
/*                     </li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/*     <div class="container-fluid">*/
/*         {% if need_upgrade == true %}*/
/*             <div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i>*/
/*                 Usted ha subido una nueva versión del módulo, para su correcto funcionamiento debe actualizarlo*/
/*                 haciendo click en el botón "Upgrade" indicado con el &iacute;cono <i*/
/*                         class="fa {{ button_save_class }}"></i>*/
/*                 <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*             </div>*/
/*         {% endif %}*/
/*         {% if need_update == true %}*/
/*             <div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i>*/
/*                 Se encuentra disponible una versión más reciente del plugin de Todo Pago, puede consultarla desde <a*/
/*                         href="https://github.com/TodoPago/Plugin-OpenCart3" target="_blank"><i*/
/*                             class="fa fa-github"></i>aquí</a>*/
/*             </div>*/
/*         {% endif %}*/
/*         {% if error.error_warning is not null %}*/
/*             <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>*/
/*                 {{ error.error_warning }}*/
/*                 <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/*         {% endif %}*/
/*         <div class="panel panel-default">*/
/*             <div class="panel-heading">*/
/*                 <h3 class="panel-title"><i class="fa fa-pencil"></i>Configuración de Todo Pago</h3>*/
/*             </div>*/
/*             <div class="panel-body">*/
/* */
/*                 <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form"*/
/*                       class="form-horizontal">*/
/*                     <ul class="nav nav-tabs">*/
/*                         <li class="active"><a href="#tab-general" data-toggle="tab">GENERAL</a>*/
/*                         </li>*/
/*                         <li><a href="#tab-billetera" data-toggle="tab">BILLETERA VIRTUAL</a></li>*/
/*                         <li><a href="#tab-test" data-toggle="tab">AMBIENTE TEST</a>*/
/*                         </li>*/
/*                         <li><a href="#tab-produccion" data-toggle="tab">AMBIENTE PRODUCCION</a>*/
/*                         </li>*/
/*                         <li><a href="#tab-estadosdelpedido" data-toggle="tab">ESTADOS DEL PEDIDO</a>*/
/*                         </li>*/
/*                         <li><a href="#tab-status" data-toggle="tab">STATUS DE LAS OPERACIONES</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                     <div class="tab-content">*/
/*                         <!-- TAB GENERAL -->*/
/*                         <div class="tab-pane active" id="tab-general">*/
/*                             <input type="hidden" name="upgrade" value="{{ need_upgrade }} ?">*/
/*                             <input type="hidden" name="payment_todopago_version" value="{{ payment_todopago_version }}">*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_status">Activar</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_status"*/
/*                                             id="payment_todopago_status">*/
/*                                         <option value="1" {% if payment_todopago_status %} {{ 'selected' }} {% endif %}>*/
/*                                             {{ text_enabled }}*/
/*                                         </option>*/
/*                                         <option value="0" {% if payment_todopago_status == 0 %} {{ 'selected' }} {% endif %}>*/
/*                                             {{ text_disabled }}*/
/*                                         </option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5">*/
/*                                     <div class="info-field col-sm-5"><em>Activa y desactiva el módulo de pago</em>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group" style="opacity: 0; height: 0; margin: 0; padding: 0">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopagobilletera_status">Activar</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopagobilletera_status"*/
/*                                             id="payment_todopagobilletera_status">*/
/*                                         <option value="1" {% if payment_todopago_status %} {{ 'selected' }} {% endif %}>*/
/*                                             {{ text_enabled }}*/
/*                                         </option>*/
/*                                         <option value="0" {% if payment_todopago_status == 0 %} {{ 'selected' }} {% endif %}>*/
/*                                             {{ text_disabled }}*/
/*                                         </option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5">*/
/*                                     <div class="info-field col-sm-5"><em>Activa y desactiva el módulo de pago</em>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_segmentodelcomercio">Segmento*/
/*                                     del*/
/*                                     Comercio</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_segmentodelcomercio"*/
/*                                             id="payment_todopago_segmentodelcomercio">*/
/*                                         <option value="Retail" {% if payment_todopago_segmentodelcomercio == 'retail' %} {{ 'selected' }} {% endif %}>*/
/*                                             Retail*/
/*                                         </option>*/
/*                                         <!--<option value="Ticketing" <?php if ($todopago_segmentodelcomercio=="Ticketing" ) echo selected?> >Ticketing</option>*/
/*                                         <option value="Services" <?php if ($todopago_segmentodelcomercio=="Services" ) echo selected?> >Service</option>*/
/*                                         <option value="Digital Goods" <?php if ($todopago_segmentodelcomercio=="Digital Goods" ) echo selected?> >Digital Goods</option>-->*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>La elección del segmento determina los tipos de*/
/*                                         datos a enviar</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <!--<div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="todopago_canaldeingresodelpedido">Canal de Ingreso del Pedido</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="todopago_canaldeingresodelpedido" id="todopago_canaldeingresodelpedido">*/
/*                                         <option value="Web" <?php if ($todopago_canaldeingresodelpedido=="Web" ) echo selected ?>>Web</option>*/
/*                                         <option value="Mobile" <?php if ($todopago_canaldeingresodelpedido=="Mobile" ) echo selected ?>>Mobile</option>*/
/*                                         <option value="Telefonica" <?php if ($todopago_canaldeingresodelpedido=="Telefonica" ) echo selected ?>>Telefonica</option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em></em>*/
/*                                 </div>*/
/*                             </div>-->*/
/*                             <div class="form-group">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_deadline">Dead Line</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="number" min="0" class="form-control" name="payment_todopago_deadline"*/
/*                                            id="payment_todopago_deadline" value="{{ payment_todopago_deadline }}"/>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Días máximos para la entrega</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_modotestproduccion">Modo*/
/*                                     test o*/
/*                                     Producción</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_modotestproduccion"*/
/*                                             id="payment_todopago_modotestproduccion">*/
/*                                         <option value="test" {% if payment_todopago_modotestproduccion == 'test' %} {{ 'selected' }} {% endif %}>*/
/*                                             Test*/
/*                                         </option>*/
/*                                         <option value="prod" {% if payment_todopago_modotestproduccion == 'prod' %} {{ 'selected' }} {% endif %}>*/
/*                                             Producción*/
/*                                         </option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Debe ser configurado en CONFIGURACION - AMBIENTE*/
/*                                         TEST / PRODUCCION</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_formulario">Tipo de*/
/*                                     formulario que*/
/*                                     desea utilizar</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_formulario"*/
/*                                             id="payment_todopago_formulario">*/
/*                                         <option value="redirec" {% if payment_todopago_formulario == 'redirec' %} {{ 'selected' }} {% endif %}>*/
/*                                             Redirección*/
/*                                         </option>*/
/*                                         <option value="hibrid" {% if payment_todopago_formulario == 'hibrid' %} {{ 'selected' }} {% endif %}>*/
/*                                             Híbrido*/
/*                                         </option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Puede usar un formulario integrado al comercio o*/
/*                                         redireccionar al formulario externo</em>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/* */
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_maxinstallments">Máximo de*/
/*                                     cuotas</label>*/
/*                                 <div class="field col-sm-1">*/
/*                                     <div class="checkbox">*/
/*                                         <label><input type="checkbox" id="habilitar"*/
/*                                                       value="" {% if payment_todopago_maxinstallments is not null %} {{ 'checked' }} {% endif %}>*/
/*                                             Habilitar</label>*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="field col-sm-4">*/
/*                                     <select class="form-control" name="payment_todopago_maxinstallments"*/
/*                                             id="payment_todopago_maxinstallments" disabled>*/
/*                                         {% for i in 0..12 %}*/
/*                                             **/
/*                                             <option value="{{ i }}">{{ i }}</option>*/
/*                                         {% endfor %}*/
/*                                         {{ '<script> $("select option[value=' }} {{ payment_todopago_maxinstallments }} {{ ']").attr(selected, selected); </script>' }}*/
/*                                     </select>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>* Seleccione la cantidad máxima de cuotas</em>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                             <!-- TIEMPO DE VIDA DEL FORMULARIO-->*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_timeout_form_enabled">Habilitar*/
/*                                     Tiempo de vida para el formulario de pago</label>*/
/*                                 <div class="field col-sm-1">*/
/*                                     <div class="checkbox">*/
/*                                         <label><input type="checkbox" id="payment_todopago_timeout_form_enabled"*/
/*                                                       name="payment_todopago_timeout_form_enabled"*/
/*                                                       value=""{% if payment_todopago_timeout_form %}{{ 'checked' }}{% endif %}>*/
/*                                             Habilitar</label>*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="field col-sm-4">*/
/*                                     <input type="number" min="300000" max="21600000" class="form-control"*/
/*                                            name="payment_todopago_timeout_form" id="payment_todopago_timeout_form"*/
/*                                            value="{% if payment_todopago_timeout_form %}{{ payment_todopago_timeout_form }}{% else %}{{ '1800000' }}{% endif %}"*/
/*                                            disabled/>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>* ingrese el tiempo de vida del formulario en ms*/
/*                                         (por defecto tiene el valor 1800000 Valor minimo: 300000 (5 minutos)*/
/*                                         Valor maximo: 21600000 (6hs))</em>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                             <!-- Vaciar carrito de compras -->*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_cart">¿Desea vaciar el*/
/*                                     carrito de*/
/*                                     compras luego de una operación fallida?</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_cart"*/
/*                                             id="payment_todopago_cart">*/
/*                                         <option value="1" {% if payment_todopago_cart %}{{ 'selected' }}{% endif %}>*/
/*                                             {{ text_enabled }}*/
/*                                         </option>*/
/*                                         <option value="0" {% if payment_todopago_cart == 0 %}{{ 'selected' }}{% endif %}>*/
/*                                             {{ text_disabled }}*/
/*                                         </option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                             <!-- Validar dirección con gmaps -->*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_gmaps_validacion">¿Desea*/
/*                                     validar la*/
/*                                     dirección de compra con Google Maps?</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_gmaps_validacion"*/
/*                                             id="payment_todopago_gmaps_validacion">*/
/*                                         <option value="1" {% if payment_todopago_gmaps_validacion %}{{ 'selected' }}{% endif %}>*/
/*                                             {{ text_enabled }}*/
/*                                         </option>*/
/*                                         <option value="0" {% if payment_todopago_gmaps_validacion == 0 %} {{ 'selected' }}{% endif %}>*/
/*                                             {{ text_disabled }}*/
/*                                         </option>*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                         </div>*/
/*                         <!-- END TAB GENERAL-->*/
/* */
/*                         <!-- TAB AMBIENTE TEST -->*/
/*                         <div class="tab-pane" id="tab-test">*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_authorizationHTTPtest">Authorization*/
/*                                     HTTP</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="text" name="payment_todopago_authorizationHTTPtest"*/
/*                                            value="{{ payment_todopago_authorizationHTTPtest }}"*/
/*                                            placeholder="Authorization" id="payment_todopago_authorizationHTTPtest"*/
/*                                            class="form-control"/>*/
/*                                 </div>*/
/*                                 <div class="input-field col-sm-5"><em>ejemplo: PRISMA*/
/*                                         912EC803B2CE4xxxx541068D495AB570</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_idsitetest">Id Site Todo*/
/*                                     Pago</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="text" class="form-control" name="payment_todopago_idsitetest"*/
/*                                            id="payment_todopago_idsitetest" value="{{ payment_todopago_idsitetest }}"/>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Número de Comercio provisto por Todo Pago</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_securitytest">Security*/
/*                                     code</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="text" class="form-control" name="payment_todopago_securitytest"*/
/*                                            id="payment_todopago_securitytest"*/
/*                                            value="{{ payment_todopago_securitytest }}"/>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Código provisto por Todo Pago</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <div class="col-sm-2"></div>*/
/*                                 <div class="field col-sm-4">*/
/*                                     <button type="button" id="open" class="btn btn-primary">Requerir datos</button>*/
/*                                     <button type="button" id="borrar" class="btn btn-primary">Borrar</button>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/* */
/*                         <div id="popup" style="display: none;">*/
/*                             <div class="content-popup">*/
/* */
/*                                 <div>*/
/*                                     <h2>Obtener credenciales <img*/
/*                                                 src="http://www.todopago.com.ar/sites/todopago.com.ar/files/logo.png">*/
/*                                     </h2>*/
/* */
/*                                     <br/>*/
/*                                     <label class="control-label">E-mail</label>*/
/*                                     <input id="mail" class="form-control" name="mail" type="email" value=""*/
/*                                            placeholder="E-mail"/>*/
/*                                     <label class="control-label">Contraseña</label>*/
/*                                     <input id="pass" class="form-control" name="pass" type="password" value=""*/
/*                                            placeholder="Contraseña"/>*/
/*                                     <button id="confirm_test" style="margin:20%;"*/
/*                                             class="btn-config-credentials btn btn-primary">Acceder*/
/*                                     </button>*/
/*                                     <button id="cancel" style="margin:20%;"*/
/*                                             class="btn-config-credentials btn btn-danger">Cancelar*/
/*                                     </button>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                         <!-- END TAB AMBIENTE TEST -->*/
/* */
/*                         <!-- TAB AMBIENTE PRODUCCION -->*/
/*                         <div class="tab-pane" id="tab-produccion">*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label"*/
/*                                        for="payment_todopago_authorizationHTTPproduccion">Authorization*/
/*                                     HTTP</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="text" name="payment_todopago_authorizationHTTPproduccion"*/
/*                                            value="{{ payment_todopago_authorizationHTTPproduccion }}"*/
/*                                            placeholder="Authorization" id="payment_todopago_authorizationHTTPproduccion"*/
/*                                            class="form-control"/>*/
/*                                 </div>*/
/*                                 <div class="input-field col-sm-5"><em>Se deben pasar los datos en formato json. ejemplo:*/
/*                                         { "Authorization":"PRISMA 912EC803B2CE49E4A541068D495AB570"}</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_idsiteproduccion">Id Site*/
/*                                     Todo*/
/*                                     Pago</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="text" class="form-control" name="payment_todopago_idsiteproduccion"*/
/*                                            id="payment_todopago_idsiteproduccion"*/
/*                                            value="{{ payment_todopago_idsiteproduccion }}"/>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Número de Comercio provisto por Todo Pago</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_securityproduccion">Security*/
/*                                     code</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <input type="text" class="form-control" name="payment_todopago_securityproduccion"*/
/*                                            id="payment_todopago_securityproduccion"*/
/*                                            value="{{ payment_todopago_securityproduccion }}"/>*/
/*                                 </div>*/
/*                                 <div class="info-field col-sm-5"><em>Código provisto por Todo Pago</em>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <div class="col-sm-2"></div>*/
/*                                 <div class="field col-sm-4">*/
/*                                     <button type="button" id="open_prod" class="btn btn-primary">Requerir datos</button>*/
/*                                     <button type="button" id="borrar_prod" class="btn btn-primary">Borrar</button>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/* */
/*                         <div id="popup_prod" style="display: none;">*/
/*                             <div class="content-popup">*/
/*                                 <div>*/
/*                                     <h2>Obtener credenciales <img*/
/*                                                 src="http://www.todopago.com.ar/sites/todopago.com.ar/files/logo.png">*/
/*                                     </h2>*/
/* */
/*                                     <br/>*/
/*                                     <label class="control-label">E-mail</label>*/
/*                                     <input id="mail_prod" class="form-control" name="mail" type="email" value=""*/
/*                                            placeholder="E-mail"/>*/
/*                                     <label class="control-label">Contrase&ntilde;a</label>*/
/*                                     <input id="pass_prod" class="form-control" name="pass" type="password" value=""*/
/*                                            placeholder="Contraseña"/>*/
/*                                     <button id="confirm_prod" style="margin:20%;"*/
/*                                             class="btn-config-credentials btn btn-primary">Acceder*/
/*                                     </button>*/
/*                                     <button id="cancel_prod" style="margin:20%;"*/
/*                                             class="btn-config-credentials btn btn-danger">Cancelar*/
/*                                     </button>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                         <!-- END TAB AMBIENTE PRODUCCION -->*/
/* */
/*                         <!-- TAB BILLETERA -->*/
/* */
/*                         <div class="tab-pane" id="tab-billetera">*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopagobilletera_banner">*/
/*                                     Banner para Billetera Virtual*/
/*                                 </label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     {%  for banner in billetera_banners %}*/
/*                                         <input {% if payment_todopagobilletera_banner == '' and loop.index == 1  %} checked="checked" {% endif %} type="radio" class="form-control" name="payment_todopagobilletera_banner" value="{{ banner["value"] }}" {% if banner["value"] == payment_todopagobilletera_banner %} checked="checked" {% endif %} }>*/
/*                                         <img src="{{ banner["img"] }}"  style="margin-left: 40px; transform: translateY(-50%);">*/
/*                                     {% endfor %}*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/* */
/* */
/*                         <!-- END TAB BILLETERA -->*/
/* */
/*                         <!-- TAB ESTADO DEL PEDIDO -->*/
/*                         <div class="tab-pane" id="tab-estadosdelpedido">*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_order_status_id_pro">Estado*/
/*                                       cuando*/
/*                                     la transaccion ha sido iniciada</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_order_status_id_pro"*/
/*                                             id="payment_todopago_order_status_id_pro">*/
/*                                         {% for order_status in order_statuses %}*/
/*                                             <option value="{{ order_status.order_status_id }}"*/
/*                                                     {% if order_status.order_status_id == payment_todopago_order_status_id_pro %} {{ "selected" }}{% endif %}>*/
/*                                                 {{ order_status.name }}*/
/*                                             </option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_order_status_id_aprov">Estado*/
/*                                     cuando*/
/*                                     la transaccion ha sido aprobada</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_order_status_id_aprov"*/
/*                                             id="payment_todopago_order_status_id_aprov">*/
/*                                         {% for order_status in order_statuses %}*/
/*                                             <option value="{{ order_status.order_status_id }}"*/
/*                                                     {% if order_status.order_status_id == payment_todopago_order_status_id_aprov %}{{ 'selected' }}{% endif %}>*/
/*                                                 {{ order_status.name }}*/
/*                                             </option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_order_status_id_rech">Estado*/
/*                                     cuando la transaccion ha sido Rechazada</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_order_status_id_rech"*/
/*                                             id="payment_todopago_order_status_id_rech">*/
/*                                         {% for order_status in order_statuses %}*/
/*                                             <option value="{{ order_status.order_status_id }}"*/
/*                                                     {% if order_status.order_status_id == payment_todopago_order_status_id_rech %}{{ 'selected' }}{% endif %}>*/
/*                                                 {{ order_status.name }}*/
/*                                             </option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group required">*/
/*                                 <label class="col-sm-2 control-label" for="payment_todopago_order_status_id_off">Estado*/
/*                                     cuando*/
/*                                     la transaccion ha sido Offline</label>*/
/*                                 <div class="field col-sm-5">*/
/*                                     <select class="form-control" name="payment_todopago_order_status_id_off"*/
/*                                             id="payment_todopago_order_status_id_off">*/
/*                                         {% for order_status in order_statuses %}*/
/*                                             <option value="{{ order_status.order_status_id }}"*/
/*                                                     {% if order_status.order_status_id == payment_todopago_order_status_id_off %}{{ 'selected' }}{% endif %}>*/
/*                                                 {{ order_status.name }}*/
/*                                             </option>*/
/*                                         {% endfor %}*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/* */
/*                         </div>*/
/*                         <!-- END TAB ESTADO DEL PEDIDO -->*/
/* */
/*                         <!-- TAB STATUS-->*/
/*                         <div class="tab-pane" id="tab-status">*/
/*                             <table class="form" border="1">*/
/*                                 <script type="text/javascript">*/
/*                                     $(document).ready(function () {*/
/*                                         var valores = '{{ orders_array }}';*/
/*                                         var tabla_db = '';*/
/*                                         valores_json = JSON.parse(valores);*/
/*                                         valores_json.forEach(function (value, key) {*/
/*                                             tabla_db += "<tr>";*/
/*                                             tabla_db += "<th><a onclick='verstatus(" + value.order_id + ")' style='cursor:pointer'>" + value.order_id + "</a></th>";*/
/*                                             tabla_db += "<th>" + value.date_added + "</th>";*/
/*                                             tabla_db += "<th>" + value.firstname + "</th>";*/
/*                                             tabla_db += "<th>" + value.lastname + "</th>";*/
/*                                             tabla_db += "<th>" + value.store_name + "</th>";*/
/*                                             tabla_db += "<th>$" + value.total + "</th>";*/
/*                                             tabla_db += "<th><a onclick='devolver(" + value.order_id + ")' style='cursor:pointer'>Devolver</a></th>";*/
/*                                             tabla_db += "</tr>";*/
/*                                         });*/
/*                                         $("#tabla_db").prepend(tabla_db);*/
/*                                         $('#tabla').dataTable();*/
/*                                     });*/
/* */
/*                                     function verstatus(order) {*/
/*                                         $('#content').css('cursor', 'progress');*/
/*                                         var url_get_status = '{{ url_get_status }}';*/
/*                                         $.get(url_get_status, {*/
/*                                             order_id: order*/
/*                                         }, llegadaDatos);*/
/*                                         return false;*/
/*                                     }*/
/* */
/*                                     function llegadaDatos(datos) {*/
/*                                         $('#content').css('cursor', 'auto');*/
/*                                         var modal = new tingle.modal({*/
/*                                             footer: true,*/
/*                                             stickyFooter: false,*/
/*                                             closeMethods: ['overlay', 'button', 'escape'],*/
/*                                             closeLabel: "Close"*/
/*                                         });*/
/*                                         modal.setContent(datos);*/
/*                                         modal.open();*/
/*                                     }*/
/*                                 </script>*/
/*                                 <link rel="stylesheet"*/
/*                                       href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">*/
/*                                 <table id="tabla" class="display" cellspacing="0" width="100%">*/
/* */
/*                                     <thead>*/
/*                                     <tr>*/
/*                                         <th>Nro</th>*/
/*                                         <th>Fecha</th>*/
/*                                         <th>Nombre</th>*/
/*                                         <th>Apellido</th>*/
/*                                         <th>Tienda</th>*/
/*                                         <th>Total</th>*/
/*                                         <th>devolucion</th>*/
/*                                     </tr>*/
/*                                     </thead>*/
/* */
/*                                     <tfoot>*/
/*                                     <tr>*/
/*                                         <th>Nro</th>*/
/*                                         <th>Fecha</th>*/
/*                                         <th>Nombre</th>*/
/*                                         <th>Apellido</th>*/
/*                                         <th>Tienda</th>*/
/*                                         <th>Total</th>*/
/*                                         <th>devolucion</th>*/
/*                                     </tr>*/
/*                                     </tfoot>*/
/* */
/*                                     <tbody id="tabla_db">*/
/*                                     </tbody>*/
/*                                 </table>*/
/*                             </table>*/
/*                         </div>*/
/*                         <!-- END TAB STATUS-->*/
/*                     </div>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {{ footer }}*/
/* */
/* */
/* <!--Devoluciones-->*/
/* <script type="text/javascript">*/
/*     function devolver(order_id) {*/
/*         var monto = prompt("Monto parcial a devolver (valor real del producto, sin el costo adicional) o vacío para devolución total (ej: 1.23): ", "");*/
/*         if (monto !== null) {*/
/*             $('#content').css('cursor', 'progress');*/
/*             var url_devolver = '{{ url_devolver }}';*/
/*             $.post(url_devolver, {order_id: order_id, monto: monto}, llegadaDatosDevolucion);*/
/*         }*/
/*         return false;*/
/*     }*/
/* */
/*     function llegadaDatosDevolucion(datos) {*/
/*         $('#content').css('cursor', 'auto');*/
/*         alert(datos);*/
/*     }*/
/* </script>*/
/* */
