<?php

return [
    'wsdl' => 'http://www.webservicex.net/uszip.asmx?WSDL',
    'auth' => false,
    'user' => '',
    'pass' => '',
    'options' => [
            'uri'=>'http://schemas.xmlsoap.org/soap/envelope/',
            'style'=>SOAP_RPC,
            'use'=>SOAP_ENCODED,
            'soap_version'=>SOAP_1_1,
            'cache_wsdl'=>WSDL_CACHE_NONE,
            'connection_timeout'=>15,
            'trace'=>true,
            'encoding'=>'UTF-8',
            'exceptions'=>true,
    ],
];