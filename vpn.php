#!/usr/bin/env php
<?php



class Vpn
{
    private array $imputComands = [
        'list' => 'cyberghostvpn --traffic --country-code',
        'on' => 'sudo cyberghostvpn --traffic --country-code %s --connect',
        'status' => 'cyberghostvpn --status'
    ];

    public function __construct(int $countImputParameters, array $imputsParameters)
    {
        if ($countImputParameters == 1)
            return $this->promptShel();
        else
            return $this->validateComand($imputsParameters);
    }

    public function executeComand(array $imputsParameters)
    {   
        echo shell_exec(
            sprintf($this->imputComands[$imputsParameters[1]], $imputsParameters[2] ?? '')
        );
    }

    private function validateComand(array $imputsParameters)
    {
        if (array_key_exists($imputsParameters[1], $this->imputComands)) {
            return $this->executeComand($imputsParameters);
        } else {
            return $this->promptShel();
        }
    }

    private function promptShel(): void
    {
        echo <<<EOT

            VPN - 1.0.0 - layer for you vpn provider

            Available arguments:

            list           :    List all available server 
            on [server]    :    connect with server  
            status         :    Status about you connection
EOT;
    }
}



//---------------------------------------------------------------------------------------------
$vpn = new Vpn($argc, $argv);
//--------------------------------------------------------------------------------------------

?>