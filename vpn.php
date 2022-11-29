#!/usr/bin/env php
<?php



class Vpn
{
    /**
     * @var array <Tkey, Vvalue>
     * @todo Se quiser adicionar mais comandos, a esta classe, use este array
     */
    private array $imputComands = [
        'list' => 'cyberghostvpn --traffic --country-code',
        'on' => 'sudo cyberghostvpn --traffic --country-code %s --connect',
        'status' => 'cyberghostvpn --status',
        'stop' => 'sudo cyberghostvpn --stop'
    ];
   
    public function __construct(int $countImputParameters, array $imputsParameters)
    {
        if ($countImputParameters == 1)
            return $this->promptShel();
        else
            return $this->validateComand($imputsParameters);
    }
    /**
     * @param array $imputsParameters
     */
    private function validateComand(array $imputsParameters)
    {
        if (array_key_exists($imputsParameters[1], $this->imputComands)) {
            return $this->executeComand($imputsParameters);
        } else {
            return $this->promptShel();
        }
    }
    /**
     * @param array imputsParameters
     */
    public function executeComand(array $imputsParameters) /*: string|false|null*/
    {
        echo shell_exec(
            sprintf($this->imputComands[$imputsParameters[1]], $imputsParameters[2] ?? '')
        );
    }
    /**
     * @return void
     */
    private function promptShel(): void
    {
        echo <<<EOT

            VPN - 1.0.0 - layer for you vpn provider

            Available arguments:

            list            :    List all available server 
            on [country]    :    connect with server  
            status          :    Status about you connection
            stop            :    Stop connection with server
EOT;
    }
}

//---------------------------------------------------------------------------------------------
$vpn = new Vpn($argc, $argv);
//--------------------------------------------------------------------------------------------

?>