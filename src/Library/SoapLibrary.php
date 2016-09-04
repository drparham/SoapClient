<?php namespace Drparham\SoapClient\Library;

use SoapClient;

class SoapLibrary
{
    private $wsdl;
    private $auth;
    private $user;
    private $pass;

    public function __construct()
    {
        $config = \Config::get('soap');
        $this->wsdl = $config['wsdl'];
        $this->auth = $config['auth'];
        if($this->auth){
            $this->user = $config['user'];
            $this->pass = $config['pass'];
        }else {
            $this->user = null;
            $this->pass = null;
        }
    }

    public function request($request)
    {
        return new SoapClient($this->wsdl, $request);
    }


}