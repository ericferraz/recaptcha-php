<?php

//incluir o arquivo aqui require/include ou autoload
//https://www.google.com/recaptcha/admin
$reCaptcha = new ReCaptcha();
$reCaptcha->setConfig($suaChavePrivadaGoogle);

$populateForm = array('type' => 'error', 'message' => 'Dados não informados');
$captcha = $_POST['g-recaptcha-response'];

if (empty($captcha)) {
    $populateForm = array('type' => 'error', 'message' => 'É obrigatório informar o captcha, para evitar fraudes no site');
    echo json_encode($populateForm);
    die;
}
$responseCaptcha = $reCaptcha->verifyResponse($prospect->getIP(), $captcha);
if ($responseCaptcha == null || !$responseCaptcha->success) {
    $populateForm = array('type' => 'error', 'message' => 'É obrigatório validar o captcha, para evitar fraudes no site');
    echo json_encode($populateForm);
    die;
}

//daqui para baixa, é por quê passou na validação
