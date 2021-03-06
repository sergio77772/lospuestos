<?php

/* default/template/extension/payment/todopago_form.twig */
class __TwigTemplate_d4fa14b3a6f71af8519388b5a7edb66453aeb4b243ba620b74711f65f806b16b extends Twig_Template
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
        echo "<link href=\"catalog/view/theme/default/stylesheet/flexbox.css\" rel=\"stylesheet\">
<link href=\"catalog/view/theme/default/stylesheet/todopago_form.css\" rel=\"stylesheet\">
<link href=\"catalog/view/theme/default/stylesheet/queries.css\" rel=\"stylesheet\">

<!-- inicio formulario -->


<div class=\"tp-row\">
    <div class=\"pull-right button tp-padding\">
        <button id=\"comenzar-pago-btn\" onclick=\"initForm()\" class=\"tp-btn\" value=\"Comenzar Pago\">
            Confirmar Orden
        </button>
    </div>
</div>

<script type=\"text/javascript\">
    let action = '";
        // line 17
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "';
    let orderId = '";
        // line 18
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "';

    /************* FIRST STEP *********************/

    function parseAnswerSAR(data) {
        let response;
        try {
            response = JSON.parse(data);
        } catch (e) {
            console.log(\"ERROR:\" + e);
            response = false;
        }
        return response;
    }

    function sliceAnswerSAR(data) {
        let pos = data.indexOf('{');
        let response = data.slice(pos);
        response = parseAnswerSAR(response);
        if (response === false) {
            failed(504);
        } else {
            return response;
        }
    }


    function initForm() {
        console.log(\"init form\");
        \$(\"#comenzar-pago-btn\").text(\"Loading...\").prop('disabled', true);
        \$.post(action, {order_id: orderId})
            .done(function (data) {
                console.log(\"Datos obtenidos\", data);
                loadScript('";
        // line 51
        echo (isset($context["validacionJS"]) ? $context["validacionJS"] : null);
        echo "', function () {
                    let response = parseAnswerSAR(data);
                    if (response === false) {
                        response = sliceAnswerSAR(data);
                    }
                    if (response.StatusCode === 702) {
                        failed(503, response.StatusMessage);
                    }
                    let publicRequestKey = response.PublicRequestKey;
                    let errorPageHybrid = response.URL_ErrorPageHybrid;
                    if (publicRequestKey) {
                        \$(\"#contenedor-formulario\").show('slow');
                        \$(\"#tp-form\").fadeIn('fast');
                        loader(publicRequestKey);
                        \$(\"#comenzar-pago-btn\").hide();
                    } else if (errorPageHybrid) {
                        console.log(\"Error\", answer);
                        failed(500, answer, errorPageHybrid);
                    }
                });
            })
            .fail(function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                failed(503, error);
            });
    }

    function failed(statusCode, message, url) {
        let tpForm = \$('#tp-form');
        switch (statusCode) {
            case 504:
                tpForm.css(\"opacity\", 0);
                console.log(\"Error al realizar el SAR\");
                window.location.href = \"";
        // line 86
        echo (isset($context["todopagoFail"]) ? $context["todopagoFail"] : null);
        echo "\" + \"&Message=\" + \"Error, intente nuevamente.\";
                break;
            case 503:
                tpForm.css(\"opacity\", 0);
                console.log(\"Error al llamar al first step\");
                window.location.href = \"";
        // line 91
        echo (isset($context["todopagoFail"]) ? $context["todopagoFail"] : null);
        echo "\" + \"&Message=\" + \"Error al Ingresar al formulario.\" + message;
                break;
            case 500:
                tpForm.css(\"opacity\", 0);
                console.log(\"Error en el request: \" + message);
                window.location.href = url;
                break;
            default:
                tpForm.css(\"opacity\", 0);
                console.log(\"Error\");
                window.location.href = \"";
        // line 101
        echo (isset($context["todopagoFail"]) ? $context["todopagoFail"] : null);
        echo "\" + \"&Message=\" + \"Error al Ingresar al formulario.\";
                break;
        }
    }

</script>

<div class=\"progress\">
    <div class=\"progress-bar progress-bar-striped active\" id=\"loading-hibrid\" role=\"progressbar\"
         aria-valuemin=\"0\"
         aria-valuemax=\"100\">
    </div>
</div>

<div class=\"tp_wrapper\" id=\"tpForm\">


    <section class=\"tp-total tp-flex\">
        <div>
            <strong id=\"tp-ammount\">Total a pagar \$";
        // line 120
        echo (isset($context["amount"]) ? $context["amount"] : null);
        echo "</strong>
        </div>
        <div>
            Elegí tu forma de pago
        </div>
    </section>

    <section class=\"billetera_virtual_tp tp-flex tp-flex-responsible\">
        <div class=\"tp-flex-grow-1 tp-bloque-span texto_billetera_virtual text_size_billetera\" style=\"text-align:  center;\">
            <p>Pagá con tu <strong>Billetera Virtual Todo Pago</strong></p>
            <p>y evitá cargar los datos de tu tarjeta</p>
        </div>
        <div class=\"tp-flex-grow-1 tp-bloque-span\">
            <button id=\"MY_btnPagarConBilletera\" title=\"Pagar con Billetera\" class=\"tp_btn tp_btn_sm\">Pagar
            </button>
        </div>
    </section>

    <section class=\"billeterafm_tp\">
        <div class=\"field field-payment-method\">
            <label for=\"formaPagoCbx\" class=\"text_small\">Forma de Pago</label>
            <div class=\"input-box\">
                <select id=\"formaPagoCbx\" class=\"tp_form_control\"></select>
                <span class=\"error\" id=\"formaPagoCbxError\"></span>
            </div>
        </div>
    </section>

    <section class=\"todopago\" id=\"todopago-section\">
        <div class=\"tp-row\">
            <h3>
                Con tu tarjeta de crédito o débito
            </h3>
        </div>
        <!-- Número de tarjeta y banco -->
        <div class=\"tp-bloque-full tp-flex tp-flex-responsible tp-main-col\">
            <!-- tarjeta -->
            <div class=\"tp-flex-grow-1\" style=\"width: 100%;\">
                <label for=\"numeroTarjetaTxt\" class=\"text_small\">Número de Tarjeta</label>
                <input id=\"numeroTarjetaTxt\" class=\"tp_form_control\" maxlength=\"19\" title=\"Número de Tarjeta\"
                       min-length=\"14\" autocomplete=\"off\">
                <img src=\"catalog/view/theme/default/todopago/image/empty.png\" id=\"tp-tarjeta-logo\"
                     alt=\"\"/>
                <label id=\"numeroTarjetaLbl\" class=\"tp-error\"></label>
            </div>
            <!-- Banco -->
            <div class=\"tp-flex-grow-1\">
                <label for=\"bancoCbx\" class=\"text_small\">Banco</label>
                <select id=\"bancoCbx\" class=\"tp_form_control\" placeholder=\"Selecciona banco\"></select>
                <span class=\"tp-error\" id=\"bancoCbxError\"></span>
            </div>

            <div class=\"tp_oculto tp_row\">
                <div class=\"tp_col tp_span_1_of_2 payment-method\">
                    <label for=\"medioPagoCbx\" class=\"text_small\">Medio de Pago</label>
                    <select id=\"medioPagoCbx\" class=\"tp_form_control\" placeholder=\"Mediopago\"></select>
                    <span class=\"error\" id=\"medioPagoCbxError\"></span>
                </div>
            </div>

        </div>

        <!-- PEI box -->
        <div class=\"tp-bloque-full tp-flex tp-flex-responsible\">
            <div class=\"section-fantasma\"></div>
            <section class=\"\" id=\"row-pei\">
                <label id=\"peiLbl\" for=\"peiCbx\" class=\"text_small right\">Pago con PEI</label>
                <label class=\"switch\" id=\"switch-pei\">
                    <input type=\"checkbox\" id=\"peiCbx\">
                    <span class=\"slider round\"></span>
                    <span id=\"slider-text\"></span>
                </label>
            </section>
            <div class=\"section-fantasma\"></div>
        </div>
        <!-- Vencimiento + DNI-->
        <div class=\"tp-bloque-full tp-flex tp-flex-row tp-flex-responsible tp-flex-space-between tp-main-col\">
            <!-- vencimiento -->
            <div class=\"tp-flex-grow-1 tp-flex tp-flex-col\">
                <!-- títulos -->
                <div class=\"tp-row tp-flex tp-flex-space-between tp-title\">
                    <div class=\"tp-flex-grow-1\">
                        <label for=\"mesCbx\" class=\"text_small\">Vencimiento</label>
                    </div>
                    <div class=\"tp-flex-grow-1\"></div>
                    <div class=\"tp-flex-grow-1\" id=\"codigoSeguridadTitulo\">
                        <label for=\"codigoSeguridadTxt\" class=\"text_small\">Código de Seguridad</label>
                    </div>
                </div>
                <!-- inputs -->
                <div class=\"tp-row tp-flex tp-flex-space-between tp-input-row\">
                    <div class=\"tp-flex-grow-1\">
                        <select id=\"mesCbx\" maxlength=\"2\" class=\"tp_form_control\" placeholder=\"Mes\"></select>
                    </div>
                    <div class=\"tp-flex-grow-1\">
                        <select id=\"anioCbx\" maxlength=\"2\" class=\"tp_form_control\"></select>
                    </div>
                    <div class=\"tp-flex-grow-1\">
                        <input id=\"codigoSeguridadTxt\" class=\"tp_form_control\" maxlength=\"4\"
                               autocomplete=\"off\"/>
                    </div>
                    <div class=\"tp-cvv-helper-container\">
                        <div class=\"clave-ico\" id=\"tp-cvv-caller\"></div>
                        <div id=\"tp-cvv-helper\">
                            <p>
                                Para Visa, Master, Cabal y Diners, los 3 dígitos se encuentran en el
                                <strong>dorso</strong>
                                de
                                tu tarjeta. (izq)
                            </p>
                            <p>
                                Para Amex, los 4 dígitos se encuentran en el frente de tu tarjeta. (der)
                            </p>
                            <img id=\"tp-cvv-helper-img\" alt=\"ilustración tarjetas\"
                                 src=\"./catalog/view/theme/default/template/extension/todopago/clave-ej.png\">
                        </div>
                    </div>
                </div>
                <!-- warnings -->
                <div class=\"tp-row tp-flex tp-error-title\">
                    <label id=\"fechaLbl\" class=\"left tp-error\"></label>
                    <label class=\"tp-error\"></label>
                    <label id=\"codigoSeguridadLbl\" class=\"left tp-label spacer tp-error\"></label>
                </div>
            </div>
            <!-- DNI -->
            <div class=\"tp-flex-grow-1 tp-flex tp-flex-col\">
                <!-- títulos -->
                <div class=\"tp-row tp-flex tp-title\">
                    <div class=\"tp-flex-1\">
                        <label for=\"tipoDocCbx\" class=\"text_small\">Tipo</label>
                    </div>
                    <div class=\"tp-flex-3\">
                        <label for=\"NumeroDocCbx\" class=\"text_small\">Número</label>
                    </div>
                </div>
                <!-- inputs -->
                <div class=\"tp-row tp-flex tp-input-row\">
                    <div class=\"tp-flex-1\">
                        <select id=\"tipoDocCbx\" class=\"tp_form_control\"></select>
                    </div>
                    <div class=\"tp-flex-3\" id=\"tp-dni-numero\">
                        <input id=\"nroDocTxt\" maxlength=\"10\" type=\"text\" class=\"tp_form_control\" placeholder=\"Número\"
                               autocomplete=\"off\"/>
                    </div>
                </div>
                <!-- warnings -->
                <div class=\"tp-row tp-flex tp-error-title\">
                    <label class=\"tp-flex-1\"></label>
                    <label class=\"tp-flex-3 tp-error\" id=\"nroDocLbl\"></label>
                </div>

            </div>
        </div>

        <!-- Nombre y apellido, y mail -->
        <div class=\"tp-bloque-full tp-flex tp-flex-responsible tp-main-col\">
            <div class=\"tp-flex-grow-1\">
                <label for=\"nombreTxt\" class=\"text_small\">Nombre y apellido</label>
                <input id=\"nombreTxt\" class=\"tp_form_control\" autocomplete=\"off\" placeholder=\"\" maxlength=\"50\">
                <span class=\"tp-error\" id=\"nombreLbl\"></span>
            </div>

            <div class=\"tp-flex-grow-1\">
                <label for=\"emailTxt\" class=\"text_small\">Email</label>
                <input id=\"emailTxt\" type=\"email\" class=\"tp_form_control\" placeholder=\"nombre@mail.com\" data-mail=\"\"
                       autocomplete=\"off\"/><br/>
                <span id=\"emailLbl\" class=\"left tp-label spacer tp-error\"></span>
            </div>
        </div>

        <!-- Cantidad de cuotas y CFT -->
        <div class=\"tp-bloque-full tp-flex tp-main-col\">
            <div class=\"tp-flex-grow-1\">
                <label for=\"promosCbx\" class=\"text_small\">Cantidad de cuotas</label>
                <select id=\"promosCbx\" class=\"tp_form_control\"></select>
                <span class=\"tp-error\" id=\"promosCbxError\"></span>
            </div>
            <div class=\"tp-flex-grow-1\">
                <label id=\"promosLbl\" class=\"left\"></label>
            </div>
        </div>
        <!-- TOKEN PEI -->
        <div class=\"tp_row\">
            <div class=\"tp_col tp_span_2_of_2 tp-flex tp-main-col\" id=\"pei-container\">
                <label id=\"tokenPeiLbl\" for=\"tokenPeiTxt\"></label>
                <input id=\"tokenPeiTxt\" class=\"tp_form_control\"/>
                <span class=\"tp-error\" id=\"peiTokenTxtError\"></span>
            </div>
        </div>
        <!-- Pagar -->
        <div class=\"tp_row\">
            <div class=\"tp_col tp_span_2_of_2\">
                <button id=\"MY_btnConfirmarPago\" class=\"tp_btn\" title=\"Pagar\" class=\"button\"><span>Pagar</span>
                </button>
            </div>
            <div class=\"tp_col tp_span_2_of_2\">
                <div class=\"text_centered\">
                    Al confirmar el pago acepto los <a
                            href=\"https://www.todopago.com.ar/terminos-y-condiciones-comprador\"
                            target=\"_blank\"
                            title=\"Términos y Condiciones\" id=\"tycId\"
                            class=\"tp_color_text\">Términos y Condiciones</a> de Todo
                    Pago.
                </div>
            </div>
        </div>

    </section>

    <div class=\"tp_row\">
        <div id=\"tp-powered\">
            Powered by <img id=\"tp-powered-img\" src=\"catalog/view/theme/default/image/todopago/tp_logo_prod.png\"/>
        </div>
    </div>
</div>

<script type=\"text/javascript\">

    let medioDePago = document.getElementById('medioPagoCbx');
    let tarjetaLogo = document.getElementById('tp-tarjeta-logo');
    let poweredLogo = document.getElementById('tp-powered-img');
    let todopagoSection = document.getElementById('todopago-section');
    let numeroTarjetaTxt = document.getElementById('numeroTarjetaTxt');
    let poweredLogoUrl = \"catalog/view/theme/default/image/todopago/\";
    let emptyImg = \"catalog/view/theme/default/image/todopago/empty.png\";
    let btnBilletera = document.getElementById('MY_btnPagarConBilletera');
    let peiCbx = \$(\"#peiCbx\");
    let switchPei = \$(\"#switch-pei\");
    let sliderText = \$(\"#slider-text\");
    let helperCaller = \$(\"#tp-cvv-caller\");
    let helperPopup = \$(\"#tp-cvv-helper\");
    let idTarjetas = {
        42: 'VISA',
        43: 'VISAD',
        1: 'AMEX',
        2: 'DINERS',
        6: 'CABAL',
        7: 'CABALD',
        14: 'MC',
        15: 'MCD'
    };
    let tipo = '";
        // line 362
        echo (isset($context["tipo"]) ? $context["tipo"] : null);
        echo "';

    let diccionarioTarjetas = {
        'VISA': 'VISA',
        'VISA DEBITO': 'VISAD',
        'AMEX': 'AMEX',
        'DINERS': 'DINERS',
        'CABAL': 'CABAL',
        'CABAL DEBITO': 'CABALD',
        'MASTER CARD': 'MC',
        'MASTER CARD DEBITO': 'MCD',
        'NARANJA': 'NARANJA'
    };

    helperCaller.click(function () {
            helperPopup.toggle(500);
        }
    );
    helperPopup.click(function () {
        helperPopup.toggle(500);
    });

    /************* HELPERS *************/

    numeroTarjetaTxt.onblur = clearImage;

    function clearImage() {
        tarjetaLogo.src = emptyImg;
    }

    function cardImage(select) {
        let tarjeta = idTarjetas[select.value];
        if (tarjeta === undefined) {
            tarjeta = diccionarioTarjetas[select.textContent];
        }
        if (tarjeta !== undefined) {
            tarjetaLogo.src = 'https://forms.todopago.com.ar/formulario/resources/images/' + tarjeta + '.png';
            tarjetaLogo.style.display = 'block';
        }
    }

    /************* CONFIGURACION DEL API *********************/

    function hideForm() {
        btnBilletera.innerText = \"Iniciar Sesión\";
        if (tipo === 'billetera') {
            todopagoSection.style.opacity = '0';
            todopagoSection.style.height = '0px';
        }
    }

    function openBilletera() {
        if (tipo === 'billetera') {
            btnBilletera.click();
        }
    }

    function loadScript(url, callback) {
        let entorno = (url.indexOf('developers') === -1) ? 'prod' : 'developers';
        let script = document.createElement(\"script\");
        poweredLogo.src = poweredLogoUrl + 'tp_logo_' + entorno + '.png';
        script.type = \"text/javascript\";
        if (script.readyState) {  //IE
            script.onreadystatechange = function () {
                if (script.readyState === \"loaded\" || script.readyState === \"complete\") {
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else {  //et al.
            script.onload = function () {
                callback();
            };
            script.onerror = function () {
                window.location.href = \"";
        // line 436
        echo (isset($context["url_second_step"]) ? $context["url_second_step"] : null);
        echo "&Order=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&ResultMessage=\" + \"Falló la carga del formulario\";
            }
        }
        script.src = url;
        document.getElementsByTagName(\"head\")[0].appendChild(script);
    }

    let formaDePago = document.getElementById(\"formaPagoCbx\");
    formaDePago.addEventListener(\"click\", function () {
        if (formaDePago.value === \"1\") {
            \$(\".loaded-form\").show('fast');
        } else {
            \$(\".loaded-form\").hide('fast');
            \$(\"#switch-pei\").css(\"display\", \"none\");
        }
    });

    function initialFormaDePago() {
        if (formaDePago.value === \"1\") {
            \$(\".loaded-form\").show('fast');
        }
    }

    let peiChk = \$(\"#peiCbx\");


    function getInitialPEIState() {
        return (peiChk.is(\":disabled\"));
    }

    function loader(publicRequestKey) {
        \$(\"#loading-hibrid\").css(\"width\", \"50%\");
        setTimeout(function () {
            ignite(publicRequestKey);
        }, 100);
        setTimeout(function () {
            \$(\"#loading-hibrid\").css(\"width\", \"100%\");
        }, 2000);
        setTimeout(function () {
            \$(\".progress\").hide('fast');
            initialFormaDePago();
        }, 2500);
        setTimeout(function () {
            \$(\"#tpForm\").fadeTo('fast', 1);
            openBilletera();
        }, 2700);
    }

    function activateSwitch(soloPEI) {
        readPeiCbx();
        if (!soloPEI) {
            switchPei.click(function () {
                console.log(\"CHECKED\", peiCbx.prop(\"checked\"));
                if (peiCbx.prop(\"checked\")) {
                    switchPei.prop(\"checked\", true);
                    peiCbx.prop(\"checked\", true);
                    sliderText.text(\"SÍ\");
                    sliderText.css('transform', 'translateX(0)');
                } else {
                    switchPei.prop(\"checked\", false);
                    peiCbx.prop(\"checked\", false);
                    sliderText.text(\"NO\");
                    sliderText.css('transform', 'translateX(26px)');
                }
            });
        }
    }

    function readPeiCbx() {
        if (peiCbx.prop(\"checked\", true)) {
            switchPei.prop(\"checked\", true);
            sliderText.text(\"SÍ\");
            sliderText.css('transform', 'translateX(0)');
        } else {
            switchPei.prop(\"checked\", true);
            sliderText.text(\"NO\");
            sliderText.css('transform', 'translateX(26px)');
        }
    }

    function ignite(publicRequestKey) {
        window.TPFORMAPI.hybridForm.initForm({
            callbackValidationErrorFunction: 'validationCollector',
            callbackBilleteraFunction: 'billeteraPaymentResponse',
            callbackCustomSuccessFunction: 'customPaymentSuccessResponse',
            callbackCustomErrorFunction: 'customPaymentErrorResponse',
            botonPagarId: 'MY_btnConfirmarPago',
            botonPagarConBilleteraId: 'MY_btnPagarConBilletera',
            modalCssClass: 'modal-class',
            modalContentCssClass: 'modal-content',
            beforeRequest: 'initLoading',
            afterRequest: 'stopLoading'
        });
        /************* SETEO UN ITEM PARA COMPRAR ******************/
        window.TPFORMAPI.hybridForm.setItem({
            publicKey: publicRequestKey,
            defaultNombreApellido: '";
        // line 532
        echo (isset($context["completeName"]) ? $context["completeName"] : null);
        echo "',
            defaultNumeroDoc: '',
            defaultMail: '";
        // line 534
        echo (isset($context["mail"]) ? $context["mail"] : null);
        echo "',
            defaultTipoDoc: 'DNI'
        });
        hideForm();
    }

    /************ FUNCIONES CALLBACKS ************/

    function validationCollector(parametros) {
        console.log(\"Validando los datos\");
        console.log(parametros.field + \" -> \" + parametros.error);
        let input = parametros.field;

        if (input === 'numeroTarjetaTxt')
            \$(\"#row-pei\").css(\"display\", \"none\");

        if (input.search(\"Txt\") !== -1) {
            label = input.replace(\"Txt\", \"Lbl\");
        } else {
            label = input.replace(\"Cbx\", \"Lbl\");
        }
        if (document.getElementById(label) !== null)
            document.getElementById(label).innerHTML = parametros.error;
    }

    function billeteraPaymentResponse(response) {
        console.log(\"Iniciando billetera\");
        console.log(response.ResultCode + \" -> \" + response.ResultMessage);
        if (response.AuthorizationKey) {
            window.location.href = \"";
        // line 563
        echo (isset($context["url_second_step"]) ? $context["url_second_step"] : null);
        echo "&Order=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&Answer=\" + response.AuthorizationKey;
        } else {
            window.location.href = \"";
        // line 565
        echo (isset($context["url_second_step"]) ? $context["url_second_step"] : null);
        echo "&Order=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&ResultMessage=\" + response.ResultMessage;
        }
    }

    function customPaymentSuccessResponse(response) {
        console.log(\"Success\");
        console.log(response.ResultCode + \" -> \" + response.ResultMessage);
        window.location.href = \"";
        // line 572
        echo (isset($context["url_second_step"]) ? $context["url_second_step"] : null);
        echo "&Order=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&Answer=\" + response.AuthorizationKey;
    }

    function customPaymentErrorResponse(response) {
        console.log(\"Error al pagar.\");
        console.log(response.ResultCode + \" -> \" + response.ResultMessage);
        if (response.AuthorizationKey) {
            window.location.href = \"";
        // line 579
        echo (isset($context["url_second_step"]) ? $context["url_second_step"] : null);
        echo "&Order=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&Answer=\" + response.AuthorizationKey;
        } else {
            window.location.href = \"";
        // line 581
        echo (isset($context["url_second_step"]) ? $context["url_second_step"] : null);
        echo "&Order=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&ResultMessage=\" + response.ResultMessage;
        }
    }

    function initLoading() {
        console.log('Loading...');
        cardImage(medioDePago);
    }

    function stopLoading() {
        console.log('Stop loading...');
        let peiCbx = \$(\"#peiCbx\");
        let peiRow = \$(\"#row-pei\");
        let tokenPeiRow = \$(\"#tokenpei-row\");
        let tokenPeiTxt = \$(\"#tokenPeiTxt\");
        let tokenPeiBloque = \$(\"#tokenpei-bloque\");

        if (peiCbx.css('display') !== 'none') {
            peiRow.css('display', 'flex');
            switchPei = \$(\"#switch-pei\");
            switchPei.css(\"display\", \"block\");
            activateSwitch(getInitialPEIState());
        } else {
            peiRow.hide('fast');
            peiRow.css(\"display\", \"none\");
        }
        if (tokenPeiTxt.css('display') !== 'none') {
            tokenPeiBloque.css('height', \"%100\");
            tokenPeiRow.css('height', \"%100\");
        } else {
            tokenPeiBloque.css('height', \"%0\");
            tokenPeiRow.css('height', \"%0\");
        }
    }

    function levantarFormulario() {
        \$('#contenedorFormulario').show('fast');
    }

</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/todopago_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  656 => 581,  649 => 579,  637 => 572,  625 => 565,  618 => 563,  586 => 534,  581 => 532,  480 => 436,  403 => 362,  158 => 120,  136 => 101,  123 => 91,  115 => 86,  77 => 51,  41 => 18,  37 => 17,  19 => 1,);
    }
}
/* <link href="catalog/view/theme/default/stylesheet/flexbox.css" rel="stylesheet">*/
/* <link href="catalog/view/theme/default/stylesheet/todopago_form.css" rel="stylesheet">*/
/* <link href="catalog/view/theme/default/stylesheet/queries.css" rel="stylesheet">*/
/* */
/* <!-- inicio formulario -->*/
/* */
/* */
/* <div class="tp-row">*/
/*     <div class="pull-right button tp-padding">*/
/*         <button id="comenzar-pago-btn" onclick="initForm()" class="tp-btn" value="Comenzar Pago">*/
/*             Confirmar Orden*/
/*         </button>*/
/*     </div>*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/*     let action = '{{ action }}';*/
/*     let orderId = '{{ order_id }}';*/
/* */
/*     /************* FIRST STEP *********************//* */
/* */
/*     function parseAnswerSAR(data) {*/
/*         let response;*/
/*         try {*/
/*             response = JSON.parse(data);*/
/*         } catch (e) {*/
/*             console.log("ERROR:" + e);*/
/*             response = false;*/
/*         }*/
/*         return response;*/
/*     }*/
/* */
/*     function sliceAnswerSAR(data) {*/
/*         let pos = data.indexOf('{');*/
/*         let response = data.slice(pos);*/
/*         response = parseAnswerSAR(response);*/
/*         if (response === false) {*/
/*             failed(504);*/
/*         } else {*/
/*             return response;*/
/*         }*/
/*     }*/
/* */
/* */
/*     function initForm() {*/
/*         console.log("init form");*/
/*         $("#comenzar-pago-btn").text("Loading...").prop('disabled', true);*/
/*         $.post(action, {order_id: orderId})*/
/*             .done(function (data) {*/
/*                 console.log("Datos obtenidos", data);*/
/*                 loadScript('{{ validacionJS }}', function () {*/
/*                     let response = parseAnswerSAR(data);*/
/*                     if (response === false) {*/
/*                         response = sliceAnswerSAR(data);*/
/*                     }*/
/*                     if (response.StatusCode === 702) {*/
/*                         failed(503, response.StatusMessage);*/
/*                     }*/
/*                     let publicRequestKey = response.PublicRequestKey;*/
/*                     let errorPageHybrid = response.URL_ErrorPageHybrid;*/
/*                     if (publicRequestKey) {*/
/*                         $("#contenedor-formulario").show('slow');*/
/*                         $("#tp-form").fadeIn('fast');*/
/*                         loader(publicRequestKey);*/
/*                         $("#comenzar-pago-btn").hide();*/
/*                     } else if (errorPageHybrid) {*/
/*                         console.log("Error", answer);*/
/*                         failed(500, answer, errorPageHybrid);*/
/*                     }*/
/*                 });*/
/*             })*/
/*             .fail(function (xhr, status, error) {*/
/*                 console.log(xhr);*/
/*                 console.log(status);*/
/*                 console.log(error);*/
/*                 failed(503, error);*/
/*             });*/
/*     }*/
/* */
/*     function failed(statusCode, message, url) {*/
/*         let tpForm = $('#tp-form');*/
/*         switch (statusCode) {*/
/*             case 504:*/
/*                 tpForm.css("opacity", 0);*/
/*                 console.log("Error al realizar el SAR");*/
/*                 window.location.href = "{{ todopagoFail }}" + "&Message=" + "Error, intente nuevamente.";*/
/*                 break;*/
/*             case 503:*/
/*                 tpForm.css("opacity", 0);*/
/*                 console.log("Error al llamar al first step");*/
/*                 window.location.href = "{{ todopagoFail }}" + "&Message=" + "Error al Ingresar al formulario." + message;*/
/*                 break;*/
/*             case 500:*/
/*                 tpForm.css("opacity", 0);*/
/*                 console.log("Error en el request: " + message);*/
/*                 window.location.href = url;*/
/*                 break;*/
/*             default:*/
/*                 tpForm.css("opacity", 0);*/
/*                 console.log("Error");*/
/*                 window.location.href = "{{ todopagoFail }}" + "&Message=" + "Error al Ingresar al formulario.";*/
/*                 break;*/
/*         }*/
/*     }*/
/* */
/* </script>*/
/* */
/* <div class="progress">*/
/*     <div class="progress-bar progress-bar-striped active" id="loading-hibrid" role="progressbar"*/
/*          aria-valuemin="0"*/
/*          aria-valuemax="100">*/
/*     </div>*/
/* </div>*/
/* */
/* <div class="tp_wrapper" id="tpForm">*/
/* */
/* */
/*     <section class="tp-total tp-flex">*/
/*         <div>*/
/*             <strong id="tp-ammount">Total a pagar ${{ amount }}</strong>*/
/*         </div>*/
/*         <div>*/
/*             Elegí tu forma de pago*/
/*         </div>*/
/*     </section>*/
/* */
/*     <section class="billetera_virtual_tp tp-flex tp-flex-responsible">*/
/*         <div class="tp-flex-grow-1 tp-bloque-span texto_billetera_virtual text_size_billetera" style="text-align:  center;">*/
/*             <p>Pagá con tu <strong>Billetera Virtual Todo Pago</strong></p>*/
/*             <p>y evitá cargar los datos de tu tarjeta</p>*/
/*         </div>*/
/*         <div class="tp-flex-grow-1 tp-bloque-span">*/
/*             <button id="MY_btnPagarConBilletera" title="Pagar con Billetera" class="tp_btn tp_btn_sm">Pagar*/
/*             </button>*/
/*         </div>*/
/*     </section>*/
/* */
/*     <section class="billeterafm_tp">*/
/*         <div class="field field-payment-method">*/
/*             <label for="formaPagoCbx" class="text_small">Forma de Pago</label>*/
/*             <div class="input-box">*/
/*                 <select id="formaPagoCbx" class="tp_form_control"></select>*/
/*                 <span class="error" id="formaPagoCbxError"></span>*/
/*             </div>*/
/*         </div>*/
/*     </section>*/
/* */
/*     <section class="todopago" id="todopago-section">*/
/*         <div class="tp-row">*/
/*             <h3>*/
/*                 Con tu tarjeta de crédito o débito*/
/*             </h3>*/
/*         </div>*/
/*         <!-- Número de tarjeta y banco -->*/
/*         <div class="tp-bloque-full tp-flex tp-flex-responsible tp-main-col">*/
/*             <!-- tarjeta -->*/
/*             <div class="tp-flex-grow-1" style="width: 100%;">*/
/*                 <label for="numeroTarjetaTxt" class="text_small">Número de Tarjeta</label>*/
/*                 <input id="numeroTarjetaTxt" class="tp_form_control" maxlength="19" title="Número de Tarjeta"*/
/*                        min-length="14" autocomplete="off">*/
/*                 <img src="catalog/view/theme/default/todopago/image/empty.png" id="tp-tarjeta-logo"*/
/*                      alt=""/>*/
/*                 <label id="numeroTarjetaLbl" class="tp-error"></label>*/
/*             </div>*/
/*             <!-- Banco -->*/
/*             <div class="tp-flex-grow-1">*/
/*                 <label for="bancoCbx" class="text_small">Banco</label>*/
/*                 <select id="bancoCbx" class="tp_form_control" placeholder="Selecciona banco"></select>*/
/*                 <span class="tp-error" id="bancoCbxError"></span>*/
/*             </div>*/
/* */
/*             <div class="tp_oculto tp_row">*/
/*                 <div class="tp_col tp_span_1_of_2 payment-method">*/
/*                     <label for="medioPagoCbx" class="text_small">Medio de Pago</label>*/
/*                     <select id="medioPagoCbx" class="tp_form_control" placeholder="Mediopago"></select>*/
/*                     <span class="error" id="medioPagoCbxError"></span>*/
/*                 </div>*/
/*             </div>*/
/* */
/*         </div>*/
/* */
/*         <!-- PEI box -->*/
/*         <div class="tp-bloque-full tp-flex tp-flex-responsible">*/
/*             <div class="section-fantasma"></div>*/
/*             <section class="" id="row-pei">*/
/*                 <label id="peiLbl" for="peiCbx" class="text_small right">Pago con PEI</label>*/
/*                 <label class="switch" id="switch-pei">*/
/*                     <input type="checkbox" id="peiCbx">*/
/*                     <span class="slider round"></span>*/
/*                     <span id="slider-text"></span>*/
/*                 </label>*/
/*             </section>*/
/*             <div class="section-fantasma"></div>*/
/*         </div>*/
/*         <!-- Vencimiento + DNI-->*/
/*         <div class="tp-bloque-full tp-flex tp-flex-row tp-flex-responsible tp-flex-space-between tp-main-col">*/
/*             <!-- vencimiento -->*/
/*             <div class="tp-flex-grow-1 tp-flex tp-flex-col">*/
/*                 <!-- títulos -->*/
/*                 <div class="tp-row tp-flex tp-flex-space-between tp-title">*/
/*                     <div class="tp-flex-grow-1">*/
/*                         <label for="mesCbx" class="text_small">Vencimiento</label>*/
/*                     </div>*/
/*                     <div class="tp-flex-grow-1"></div>*/
/*                     <div class="tp-flex-grow-1" id="codigoSeguridadTitulo">*/
/*                         <label for="codigoSeguridadTxt" class="text_small">Código de Seguridad</label>*/
/*                     </div>*/
/*                 </div>*/
/*                 <!-- inputs -->*/
/*                 <div class="tp-row tp-flex tp-flex-space-between tp-input-row">*/
/*                     <div class="tp-flex-grow-1">*/
/*                         <select id="mesCbx" maxlength="2" class="tp_form_control" placeholder="Mes"></select>*/
/*                     </div>*/
/*                     <div class="tp-flex-grow-1">*/
/*                         <select id="anioCbx" maxlength="2" class="tp_form_control"></select>*/
/*                     </div>*/
/*                     <div class="tp-flex-grow-1">*/
/*                         <input id="codigoSeguridadTxt" class="tp_form_control" maxlength="4"*/
/*                                autocomplete="off"/>*/
/*                     </div>*/
/*                     <div class="tp-cvv-helper-container">*/
/*                         <div class="clave-ico" id="tp-cvv-caller"></div>*/
/*                         <div id="tp-cvv-helper">*/
/*                             <p>*/
/*                                 Para Visa, Master, Cabal y Diners, los 3 dígitos se encuentran en el*/
/*                                 <strong>dorso</strong>*/
/*                                 de*/
/*                                 tu tarjeta. (izq)*/
/*                             </p>*/
/*                             <p>*/
/*                                 Para Amex, los 4 dígitos se encuentran en el frente de tu tarjeta. (der)*/
/*                             </p>*/
/*                             <img id="tp-cvv-helper-img" alt="ilustración tarjetas"*/
/*                                  src="./catalog/view/theme/default/template/extension/todopago/clave-ej.png">*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <!-- warnings -->*/
/*                 <div class="tp-row tp-flex tp-error-title">*/
/*                     <label id="fechaLbl" class="left tp-error"></label>*/
/*                     <label class="tp-error"></label>*/
/*                     <label id="codigoSeguridadLbl" class="left tp-label spacer tp-error"></label>*/
/*                 </div>*/
/*             </div>*/
/*             <!-- DNI -->*/
/*             <div class="tp-flex-grow-1 tp-flex tp-flex-col">*/
/*                 <!-- títulos -->*/
/*                 <div class="tp-row tp-flex tp-title">*/
/*                     <div class="tp-flex-1">*/
/*                         <label for="tipoDocCbx" class="text_small">Tipo</label>*/
/*                     </div>*/
/*                     <div class="tp-flex-3">*/
/*                         <label for="NumeroDocCbx" class="text_small">Número</label>*/
/*                     </div>*/
/*                 </div>*/
/*                 <!-- inputs -->*/
/*                 <div class="tp-row tp-flex tp-input-row">*/
/*                     <div class="tp-flex-1">*/
/*                         <select id="tipoDocCbx" class="tp_form_control"></select>*/
/*                     </div>*/
/*                     <div class="tp-flex-3" id="tp-dni-numero">*/
/*                         <input id="nroDocTxt" maxlength="10" type="text" class="tp_form_control" placeholder="Número"*/
/*                                autocomplete="off"/>*/
/*                     </div>*/
/*                 </div>*/
/*                 <!-- warnings -->*/
/*                 <div class="tp-row tp-flex tp-error-title">*/
/*                     <label class="tp-flex-1"></label>*/
/*                     <label class="tp-flex-3 tp-error" id="nroDocLbl"></label>*/
/*                 </div>*/
/* */
/*             </div>*/
/*         </div>*/
/* */
/*         <!-- Nombre y apellido, y mail -->*/
/*         <div class="tp-bloque-full tp-flex tp-flex-responsible tp-main-col">*/
/*             <div class="tp-flex-grow-1">*/
/*                 <label for="nombreTxt" class="text_small">Nombre y apellido</label>*/
/*                 <input id="nombreTxt" class="tp_form_control" autocomplete="off" placeholder="" maxlength="50">*/
/*                 <span class="tp-error" id="nombreLbl"></span>*/
/*             </div>*/
/* */
/*             <div class="tp-flex-grow-1">*/
/*                 <label for="emailTxt" class="text_small">Email</label>*/
/*                 <input id="emailTxt" type="email" class="tp_form_control" placeholder="nombre@mail.com" data-mail=""*/
/*                        autocomplete="off"/><br/>*/
/*                 <span id="emailLbl" class="left tp-label spacer tp-error"></span>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <!-- Cantidad de cuotas y CFT -->*/
/*         <div class="tp-bloque-full tp-flex tp-main-col">*/
/*             <div class="tp-flex-grow-1">*/
/*                 <label for="promosCbx" class="text_small">Cantidad de cuotas</label>*/
/*                 <select id="promosCbx" class="tp_form_control"></select>*/
/*                 <span class="tp-error" id="promosCbxError"></span>*/
/*             </div>*/
/*             <div class="tp-flex-grow-1">*/
/*                 <label id="promosLbl" class="left"></label>*/
/*             </div>*/
/*         </div>*/
/*         <!-- TOKEN PEI -->*/
/*         <div class="tp_row">*/
/*             <div class="tp_col tp_span_2_of_2 tp-flex tp-main-col" id="pei-container">*/
/*                 <label id="tokenPeiLbl" for="tokenPeiTxt"></label>*/
/*                 <input id="tokenPeiTxt" class="tp_form_control"/>*/
/*                 <span class="tp-error" id="peiTokenTxtError"></span>*/
/*             </div>*/
/*         </div>*/
/*         <!-- Pagar -->*/
/*         <div class="tp_row">*/
/*             <div class="tp_col tp_span_2_of_2">*/
/*                 <button id="MY_btnConfirmarPago" class="tp_btn" title="Pagar" class="button"><span>Pagar</span>*/
/*                 </button>*/
/*             </div>*/
/*             <div class="tp_col tp_span_2_of_2">*/
/*                 <div class="text_centered">*/
/*                     Al confirmar el pago acepto los <a*/
/*                             href="https://www.todopago.com.ar/terminos-y-condiciones-comprador"*/
/*                             target="_blank"*/
/*                             title="Términos y Condiciones" id="tycId"*/
/*                             class="tp_color_text">Términos y Condiciones</a> de Todo*/
/*                     Pago.*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*     </section>*/
/* */
/*     <div class="tp_row">*/
/*         <div id="tp-powered">*/
/*             Powered by <img id="tp-powered-img" src="catalog/view/theme/default/image/todopago/tp_logo_prod.png"/>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/* */
/*     let medioDePago = document.getElementById('medioPagoCbx');*/
/*     let tarjetaLogo = document.getElementById('tp-tarjeta-logo');*/
/*     let poweredLogo = document.getElementById('tp-powered-img');*/
/*     let todopagoSection = document.getElementById('todopago-section');*/
/*     let numeroTarjetaTxt = document.getElementById('numeroTarjetaTxt');*/
/*     let poweredLogoUrl = "catalog/view/theme/default/image/todopago/";*/
/*     let emptyImg = "catalog/view/theme/default/image/todopago/empty.png";*/
/*     let btnBilletera = document.getElementById('MY_btnPagarConBilletera');*/
/*     let peiCbx = $("#peiCbx");*/
/*     let switchPei = $("#switch-pei");*/
/*     let sliderText = $("#slider-text");*/
/*     let helperCaller = $("#tp-cvv-caller");*/
/*     let helperPopup = $("#tp-cvv-helper");*/
/*     let idTarjetas = {*/
/*         42: 'VISA',*/
/*         43: 'VISAD',*/
/*         1: 'AMEX',*/
/*         2: 'DINERS',*/
/*         6: 'CABAL',*/
/*         7: 'CABALD',*/
/*         14: 'MC',*/
/*         15: 'MCD'*/
/*     };*/
/*     let tipo = '{{ tipo }}';*/
/* */
/*     let diccionarioTarjetas = {*/
/*         'VISA': 'VISA',*/
/*         'VISA DEBITO': 'VISAD',*/
/*         'AMEX': 'AMEX',*/
/*         'DINERS': 'DINERS',*/
/*         'CABAL': 'CABAL',*/
/*         'CABAL DEBITO': 'CABALD',*/
/*         'MASTER CARD': 'MC',*/
/*         'MASTER CARD DEBITO': 'MCD',*/
/*         'NARANJA': 'NARANJA'*/
/*     };*/
/* */
/*     helperCaller.click(function () {*/
/*             helperPopup.toggle(500);*/
/*         }*/
/*     );*/
/*     helperPopup.click(function () {*/
/*         helperPopup.toggle(500);*/
/*     });*/
/* */
/*     /************* HELPERS *************//* */
/* */
/*     numeroTarjetaTxt.onblur = clearImage;*/
/* */
/*     function clearImage() {*/
/*         tarjetaLogo.src = emptyImg;*/
/*     }*/
/* */
/*     function cardImage(select) {*/
/*         let tarjeta = idTarjetas[select.value];*/
/*         if (tarjeta === undefined) {*/
/*             tarjeta = diccionarioTarjetas[select.textContent];*/
/*         }*/
/*         if (tarjeta !== undefined) {*/
/*             tarjetaLogo.src = 'https://forms.todopago.com.ar/formulario/resources/images/' + tarjeta + '.png';*/
/*             tarjetaLogo.style.display = 'block';*/
/*         }*/
/*     }*/
/* */
/*     /************* CONFIGURACION DEL API *********************//* */
/* */
/*     function hideForm() {*/
/*         btnBilletera.innerText = "Iniciar Sesión";*/
/*         if (tipo === 'billetera') {*/
/*             todopagoSection.style.opacity = '0';*/
/*             todopagoSection.style.height = '0px';*/
/*         }*/
/*     }*/
/* */
/*     function openBilletera() {*/
/*         if (tipo === 'billetera') {*/
/*             btnBilletera.click();*/
/*         }*/
/*     }*/
/* */
/*     function loadScript(url, callback) {*/
/*         let entorno = (url.indexOf('developers') === -1) ? 'prod' : 'developers';*/
/*         let script = document.createElement("script");*/
/*         poweredLogo.src = poweredLogoUrl + 'tp_logo_' + entorno + '.png';*/
/*         script.type = "text/javascript";*/
/*         if (script.readyState) {  //IE*/
/*             script.onreadystatechange = function () {*/
/*                 if (script.readyState === "loaded" || script.readyState === "complete") {*/
/*                     script.onreadystatechange = null;*/
/*                     callback();*/
/*                 }*/
/*             };*/
/*         } else {  //et al.*/
/*             script.onload = function () {*/
/*                 callback();*/
/*             };*/
/*             script.onerror = function () {*/
/*                 window.location.href = "{{ url_second_step }}&Order={{ order_id }}&ResultMessage=" + "Falló la carga del formulario";*/
/*             }*/
/*         }*/
/*         script.src = url;*/
/*         document.getElementsByTagName("head")[0].appendChild(script);*/
/*     }*/
/* */
/*     let formaDePago = document.getElementById("formaPagoCbx");*/
/*     formaDePago.addEventListener("click", function () {*/
/*         if (formaDePago.value === "1") {*/
/*             $(".loaded-form").show('fast');*/
/*         } else {*/
/*             $(".loaded-form").hide('fast');*/
/*             $("#switch-pei").css("display", "none");*/
/*         }*/
/*     });*/
/* */
/*     function initialFormaDePago() {*/
/*         if (formaDePago.value === "1") {*/
/*             $(".loaded-form").show('fast');*/
/*         }*/
/*     }*/
/* */
/*     let peiChk = $("#peiCbx");*/
/* */
/* */
/*     function getInitialPEIState() {*/
/*         return (peiChk.is(":disabled"));*/
/*     }*/
/* */
/*     function loader(publicRequestKey) {*/
/*         $("#loading-hibrid").css("width", "50%");*/
/*         setTimeout(function () {*/
/*             ignite(publicRequestKey);*/
/*         }, 100);*/
/*         setTimeout(function () {*/
/*             $("#loading-hibrid").css("width", "100%");*/
/*         }, 2000);*/
/*         setTimeout(function () {*/
/*             $(".progress").hide('fast');*/
/*             initialFormaDePago();*/
/*         }, 2500);*/
/*         setTimeout(function () {*/
/*             $("#tpForm").fadeTo('fast', 1);*/
/*             openBilletera();*/
/*         }, 2700);*/
/*     }*/
/* */
/*     function activateSwitch(soloPEI) {*/
/*         readPeiCbx();*/
/*         if (!soloPEI) {*/
/*             switchPei.click(function () {*/
/*                 console.log("CHECKED", peiCbx.prop("checked"));*/
/*                 if (peiCbx.prop("checked")) {*/
/*                     switchPei.prop("checked", true);*/
/*                     peiCbx.prop("checked", true);*/
/*                     sliderText.text("SÍ");*/
/*                     sliderText.css('transform', 'translateX(0)');*/
/*                 } else {*/
/*                     switchPei.prop("checked", false);*/
/*                     peiCbx.prop("checked", false);*/
/*                     sliderText.text("NO");*/
/*                     sliderText.css('transform', 'translateX(26px)');*/
/*                 }*/
/*             });*/
/*         }*/
/*     }*/
/* */
/*     function readPeiCbx() {*/
/*         if (peiCbx.prop("checked", true)) {*/
/*             switchPei.prop("checked", true);*/
/*             sliderText.text("SÍ");*/
/*             sliderText.css('transform', 'translateX(0)');*/
/*         } else {*/
/*             switchPei.prop("checked", true);*/
/*             sliderText.text("NO");*/
/*             sliderText.css('transform', 'translateX(26px)');*/
/*         }*/
/*     }*/
/* */
/*     function ignite(publicRequestKey) {*/
/*         window.TPFORMAPI.hybridForm.initForm({*/
/*             callbackValidationErrorFunction: 'validationCollector',*/
/*             callbackBilleteraFunction: 'billeteraPaymentResponse',*/
/*             callbackCustomSuccessFunction: 'customPaymentSuccessResponse',*/
/*             callbackCustomErrorFunction: 'customPaymentErrorResponse',*/
/*             botonPagarId: 'MY_btnConfirmarPago',*/
/*             botonPagarConBilleteraId: 'MY_btnPagarConBilletera',*/
/*             modalCssClass: 'modal-class',*/
/*             modalContentCssClass: 'modal-content',*/
/*             beforeRequest: 'initLoading',*/
/*             afterRequest: 'stopLoading'*/
/*         });*/
/*         /************* SETEO UN ITEM PARA COMPRAR ******************//* */
/*         window.TPFORMAPI.hybridForm.setItem({*/
/*             publicKey: publicRequestKey,*/
/*             defaultNombreApellido: '{{ completeName }}',*/
/*             defaultNumeroDoc: '',*/
/*             defaultMail: '{{ mail }}',*/
/*             defaultTipoDoc: 'DNI'*/
/*         });*/
/*         hideForm();*/
/*     }*/
/* */
/*     /************ FUNCIONES CALLBACKS ************//* */
/* */
/*     function validationCollector(parametros) {*/
/*         console.log("Validando los datos");*/
/*         console.log(parametros.field + " -> " + parametros.error);*/
/*         let input = parametros.field;*/
/* */
/*         if (input === 'numeroTarjetaTxt')*/
/*             $("#row-pei").css("display", "none");*/
/* */
/*         if (input.search("Txt") !== -1) {*/
/*             label = input.replace("Txt", "Lbl");*/
/*         } else {*/
/*             label = input.replace("Cbx", "Lbl");*/
/*         }*/
/*         if (document.getElementById(label) !== null)*/
/*             document.getElementById(label).innerHTML = parametros.error;*/
/*     }*/
/* */
/*     function billeteraPaymentResponse(response) {*/
/*         console.log("Iniciando billetera");*/
/*         console.log(response.ResultCode + " -> " + response.ResultMessage);*/
/*         if (response.AuthorizationKey) {*/
/*             window.location.href = "{{ url_second_step }}&Order={{ order_id }}&Answer=" + response.AuthorizationKey;*/
/*         } else {*/
/*             window.location.href = "{{ url_second_step }}&Order={{ order_id }}&ResultMessage=" + response.ResultMessage;*/
/*         }*/
/*     }*/
/* */
/*     function customPaymentSuccessResponse(response) {*/
/*         console.log("Success");*/
/*         console.log(response.ResultCode + " -> " + response.ResultMessage);*/
/*         window.location.href = "{{ url_second_step }}&Order={{ order_id }}&Answer=" + response.AuthorizationKey;*/
/*     }*/
/* */
/*     function customPaymentErrorResponse(response) {*/
/*         console.log("Error al pagar.");*/
/*         console.log(response.ResultCode + " -> " + response.ResultMessage);*/
/*         if (response.AuthorizationKey) {*/
/*             window.location.href = "{{ url_second_step }}&Order={{ order_id }}&Answer=" + response.AuthorizationKey;*/
/*         } else {*/
/*             window.location.href = "{{ url_second_step }}&Order={{ order_id }}&ResultMessage=" + response.ResultMessage;*/
/*         }*/
/*     }*/
/* */
/*     function initLoading() {*/
/*         console.log('Loading...');*/
/*         cardImage(medioDePago);*/
/*     }*/
/* */
/*     function stopLoading() {*/
/*         console.log('Stop loading...');*/
/*         let peiCbx = $("#peiCbx");*/
/*         let peiRow = $("#row-pei");*/
/*         let tokenPeiRow = $("#tokenpei-row");*/
/*         let tokenPeiTxt = $("#tokenPeiTxt");*/
/*         let tokenPeiBloque = $("#tokenpei-bloque");*/
/* */
/*         if (peiCbx.css('display') !== 'none') {*/
/*             peiRow.css('display', 'flex');*/
/*             switchPei = $("#switch-pei");*/
/*             switchPei.css("display", "block");*/
/*             activateSwitch(getInitialPEIState());*/
/*         } else {*/
/*             peiRow.hide('fast');*/
/*             peiRow.css("display", "none");*/
/*         }*/
/*         if (tokenPeiTxt.css('display') !== 'none') {*/
/*             tokenPeiBloque.css('height', "%100");*/
/*             tokenPeiRow.css('height', "%100");*/
/*         } else {*/
/*             tokenPeiBloque.css('height', "%0");*/
/*             tokenPeiRow.css('height', "%0");*/
/*         }*/
/*     }*/
/* */
/*     function levantarFormulario() {*/
/*         $('#contenedorFormulario').show('fast');*/
/*     }*/
/* */
/* </script>*/
/* */
