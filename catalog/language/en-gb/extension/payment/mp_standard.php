<?php


// Text
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$admin = strpos($url, 'admin') !== FALSE ? '' : './admin/';

$_['text_title'] = 'MercadoPago<img src="' . $admin . 'view/image/payment/mp_standard.png" alt="Mercadopago" title="Mercadopago" style="border: 1px solid #EEEEEE;max-width:39px;"> - Standard Checkout';
$_['currency_no_support'] = 'The currency selected is not supported by MercadoPago';
$_['ccnum_placeholder'] = 'Credit Card Number';
$_['expiration_date_placeholder'] = 'Expiration Date';
$_['name_placeholder'] = 'Name';
$_['doctype_placeholder'] = 'Document Type';
$_['docnumber_placeholder'] = 'Document Number';
$_['expiration_month_placeholder'] = 'Expiration Month';
$_['expiration_year_placeholder'] = 'Expiration Year';
$_['error_invalid_payment_type'] = 'Payment type not accepted';
$_['installments_placeholder'] = 'Installments';
$_['issuer_placeholder'] = 'Issuer';
$_['cardType_placeholder'] = 'Payment Type';
$_['payment_processing'] = 'Processing payment';
$_['payment_title'] = 'Payment';
$_['payment_button'] = 'Pay';

// Payment messages
$_['S200'] = 'Payment approved!';
$_['S201'] = 'Payment approved!';
$_['S2000'] = 'Payment not found';
$_['S4'] = 'The caller is not authorized to access this resource';
$_['S2041'] = 'Only admin users can perform the requested action';
$_['S3002'] = 'The caller is not authorized to perform this action';
$_['S1'] = 'Params Error';
$_['S3'] = 'Token must be for test';
$_['S5'] = 'Must provide your access_token to proceed';
$_['S1000'] = 'Number of rows exceeded the limits';
$_['S1001'] = 'Date format must be yyyy-MM-dd\'T\'HH:mm:ss.SSSZ';
$_['S2001'] = 'Already posted the same request in the last minute';
$_['S2004'] = 'POST to Gateway Transactions API fail';
$_['S2002'] = 'Customer not found';
$_['S2006'] = 'Card Token not found';
$_['S2007'] = 'Connection to Card Token API fail';
$_['S2009'] = 'Card token isssuer can\'t be null';
$_['S2010'] = 'Card not found';
$_['S2013'] = 'Invalid profileId';
$_['S2014'] = 'Invalid reference_id';
$_['S2015'] = 'Invalid scope';
$_['S2016'] = 'Invalid status for update';
$_['S2017'] = 'Invalid transaction_amount for update';
$_['S2018'] = 'The action requested is not valid for the current payment state';
$_['S2020'] = 'Customer not allowed to operate';
$_['S2021'] = 'Collector not allowed to operate';
$_['S2022'] = 'You have exceeded the max number of refunds for this payment';
$_['S2024'] = 'Payment too old to be refunded';
$_['S2025'] = 'Operation type not allowed to be refunded';
$_['S2027'] = 'The action requested is not valid for the current payment method type';
$_['S2029'] = 'Payment without movements';
$_['S2030'] = 'Collector hasn\'t enough money';
$_['S2031'] = 'Collector hasn\'t enough available money';
$_['S2034'] = 'Invalid users involved';
$_['S2035'] = 'Invalid params for preference Api';
$_['S2036'] = 'Invalid context';
$_['S2038'] = 'Invalid campaign_id';
$_['S2039'] = 'Invalid coupon_code';
$_['S2040'] = 'User email doesn\'t exist';
$_['S2060'] = 'The customer can\'t be equal to the collector';
$_['S3000'] = 'You must provide your cardholder_name with your card data';
$_['S3001'] = 'You must provide your cardissuer_id with your card data';
$_['S3003'] = 'Invalid card_token_id';
$_['S3004'] = 'Invalid parameter site_id';
$_['S3005'] = 'Not valid action, the resource is in a state that does not allow this operation. For more information see the state that has the resource.';
$_['S3006'] = 'Invalid parameter cardtoken_id';
$_['S3007'] = 'The parameter client_id can not be null or empty';
$_['S3008'] = 'Not found Cardtoken';
$_['S3009'] = 'unauthorized client_id';
$_['S3010'] = 'Not found card on whitelist';
$_['S3011'] = 'Not found payment_method';
$_['S3012'] = 'Invalid parameter security_code_length';
$_['S3013'] = 'The parameter security_code is a required field can not be null or empty';
$_['S3014'] = 'Invalid parameter payment_method';
$_['S3015'] = 'Invalid parameter card_number_length';
$_['S3016'] = 'Invalid parameter card_number';
$_['S3017'] = 'The parameter card_number_id can not be null or empty';
$_['S3018'] = 'The parameter expiration_month can not be null or empty';
$_['S3019'] = 'The parameter expiration_year can not be null or empty';
$_['S3020'] = 'The parameter cardholder.name can not be null or empty';
$_['S3021'] = 'The parameter cardholder.document.number can not be null or empty';
$_['S3022'] = 'The parameter cardholder.document.type can not be null or empty';
$_['S3023'] = 'The parameter cardholder.document.subtype can not be null or empty';
$_['S3024'] = 'Not valid action - partial refund unsupported for this transaction';
$_['S3025'] = 'Invalid Auth Code';
$_['S3026'] = 'Invalid card_id for this payment_method_id';
$_['S3027'] = 'Invalid payment_type_id';
$_['S3028'] = 'Invalid payment_method_id';
$_['S3029'] = 'Invalid card expiration month';
$_['S3030'] = 'Invalid card expiration year';
$_['S4000'] = 'card atributte can\'t be null';
$_['S4001'] = 'payment_method_id atributte can\'t be null';
$_['S4002'] = 'transaction_amount atributte can\'t be null';
$_['S4003'] = 'transaction_amount atributte must be numeric';
$_['S4004'] = 'installments atributte can\'t be null';
$_['S4005'] = 'installments atributte must be numeric';
$_['S4006'] = 'payer atributte is malformed';
$_['S4007'] = 'site_id atributte can\'t be null';
$_['S4012'] = 'payer.id atributte can\'t be null';
$_['S4013'] = 'payer.type atributte can\'t be null';
$_['S4015'] = 'payment_method_reference_id atributte can\'t be null';
$_['S4016'] = 'payment_method_reference_id atributte must be numeric';
$_['S4017'] = 'status atributte can\'t be null';
$_['S4018'] = 'payment_id atributte can\'t be null';
$_['S4019'] = 'payment_id atributte must be numeric';
$_['S4020'] = 'notificaction_url atributte must be url valid';
$_['S4021'] = 'notificaction_url atributte must be shorter than 500 character';
$_['S4022'] = 'metadata atributte must be a valid JSON';
$_['S4023'] = 'transaction_amount atributte can\'t be null';
$_['S4024'] = 'transaction_amount atributte must be numeric';
$_['S4025'] = 'refund_id can\'t be null';
$_['S4026'] = 'Invalid coupon_amount';
$_['S4027'] = 'campaign_id atributte must be numeric';
$_['S4028'] = 'coupon_amount atributte must be numeric';
$_['S4029'] = 'Invalid payer type';
$_['S4037'] = 'Invalid transaction_amount';
$_['S4038'] = 'application_fee cannot be bigger than transaction_amount';
$_['S4039'] = 'application_fee cannot be a negative value';
$_['S4050'] = 'payer.email must be a valid email';
$_['S4051'] = 'payer.email must be shorter than 254 characters';

// Token messages
$_['T310'] = 'Invalid parameter \'internal_client_id\'';
$_['T200'] = 'The parameter \'public_key\' can not be null or empty';
$_['T302'] = 'Invalid parameter \'public_key\'';
$_['T219'] = 'The parameter \'client_id\' can not be null or empty';
$_['T315'] = 'Invalid parameter \'site_id\'';
$_['T222'] = 'The parameter \'site_id\' is a required field (not null or empty)';
$_['T318'] = 'Invalid parameter \'card_number_id\'';
$_['T304'] = 'Invalid parameter \'card_number_length\'';
$_['T703'] = 'Invalid length for field \'card_number_length\'';
$_['T319'] = 'Invalid parameter \'trunc_card_number\'';
$_['T701'] = 'invalid length for field \'trunc_card_number\'';
$_['T321'] = 'Invalid parameter \'security_code_id\'';
$_['T700'] = 'invalid length for field \'security_code_id\'';
$_['T307'] = 'Invalid parameter \'security_code_length\'';
$_['T704'] = 'invalid length for field \'security_code_length\'';
$_['T305'] = 'Invalid cardholder structure';
$_['T210'] = 'The structure \'cardholder\' can not be null';
$_['T316'] = 'Invalid parameter \'cardholder.name\'';
$_['T211'] = 'The structure \'cardholder.identification\' can not be null';
$_['T322'] = 'Invalid parameter \'cardholder.identification.type\'';
$_['T323'] = 'Invalid parameter \'cardholder.identification.subtype\'';
$_['T213'] = 'The parameter \'cardholder.identification.subtype\' can not be null or empty';
$_['T324'] = 'Invalid parameter \'cardholder.identification.number\'';
$_['T325'] = 'Invalid parameter \'expiration_month\'';
$_['T326'] = 'Invalid parameter \'cardExpirationYear\'';
$_['T702'] = 'Invalid parameter \'expiration_year\'';
$_['T301'] = 'Invalid expiration date';
$_['T317'] = 'Invalid parameter \'card_id\'';
$_['T320'] = 'Invalid parameter \'luhn_validation\'';
$_['TE111'] = 'invalid json';
$_['TE114'] = 'parameter cardholderName can not be null/empty';
$_['TE115'] = 'parameter public_key can not be null/empty';
$_['TE202'] = 'invalid parameter cardNumber';
$_['TE203'] = 'invalid parameter securityCode';
$_['TE213'] = 'invalid parameter card_present';
$_['TE301'] = 'invalid length parameter cardNumber';
$_['TE302'] = 'invalid length parameter securityCode';
$_['TE305'] = 'invalid length parameter docType';
$_['TE501'] = 'not found public_key';

$_['T205'] = 'Enter your card number.';
$_['T208'] = 'Select a month.';
$_['T209'] = 'Select a year.';
$_['T212'] = 'Enter your identification type.';
$_['T213'] = 'Enter your identification subtype.';
$_['T214'] = 'Enter your identification number.';
$_['T220'] = 'Enter your issuing bank.';
$_['T221'] = 'Enter your full name.';
$_['T224'] = 'Enter the security code.';
$_['TE301'] = 'There\'s something wrong with that number. Please reenter.';
$_['TE302'] = 'Check the security code.';
$_['T316'] = 'Enter a valid name.';
$_['T322'] = 'Check your identification type.';
$_['T323'] = 'Check your identification type.';
$_['T324'] = 'Check your identification number.';
$_['T325'] = 'Check the date.';
$_['T326'] = 'Check the date.';

$_['S106'] = 'You can not make payments to users in other countries.';
$_['S109'] = 'payment_method_id does not process payments in installments installments. Choose another card or another payment method.';
$_['S126'] = 'We could not process your payment.';
$_['S129'] = 'payment_method_id does not process payments for the selected amount. Choose another card or another payment method.';
$_['S145'] = 'We could not process your payment.';
$_['S150'] = 'You can not make payments.';
$_['S151'] = 'You can not make payments.';
$_['S160'] = 'We could not process your payment.';
$_['S204'] = 'Payment method is not available at this time. Choose another card or another payment method.';
$_['S801'] = 'Try again in a few minutes.';

$_['text_total']	= 'Shipping, Handling, Discounts & Taxes';