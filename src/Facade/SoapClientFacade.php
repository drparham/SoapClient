<?php namespace Drparham\SoapClient\Facade;

use Illuminate\Support\Facades\Facade;

class SoapClientFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Drparham\SoapClient\Library\SoapLibrary'; }
}