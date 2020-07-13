<?php
// Text
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$admin = strpos($url, 'admin') !== FALSE ? '' : './admin/';

$_['text_title'] = 'Credito o Debito En el Local <img src="../image/credito.png" alt="debito" title="debito" style="max-width:39px;"> ';
