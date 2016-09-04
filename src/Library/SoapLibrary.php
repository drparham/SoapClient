<?php namespace Drparham\SoapClient\Library;

use SoapClient;

class SoapLibrary
{
    private $wsdl;
    private $auth;
    private $user;
    private $pass;
    private $options;
    private $client;

    public function __construct()
    {
        $config = \Config::get('soap');
        $this->wsdl = $config['wsdl'];
        $this->auth = $config['auth'];
        $this->options = $config['options'];
        if($this->auth){
            $this->user = $config['user'];
            $this->pass = $config['pass'];
        }else {
            $this->user = null;
            $this->pass = null;
        }
        $this->client = new SoapClient($this->wsdl, $this->options);
    }

    public function request($method, $request)
    {
        try {
            $data = $this->client->__soapCall($method,[$request]);
        }
        catch(Exception $e) {
            die($e->getMessage());
        }
        $data = simplexml_load_string($data->{$method.'Result'}->any);
//        $data = json_encode($data);
//        $data = json_decode($data,TRUE);
        return $data;
    }


}