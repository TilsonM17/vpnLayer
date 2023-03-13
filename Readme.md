## VPN layer

Uma camada de comandos para tonar os comandos da minha VPN mais curtos e faceis de lembrar.

Eu uso o [CyberGhostVPN](https://www.cyberghostvpn.com/pt_BR/), ela ate que é boa,mas, para linux(que é o SO da minha maquina),tenho de me conectar pela linha de comando,e ela tem comandos muito grandes.
Ex: 

    // "Mudar" para os Estados Unidos
    sudo cyberghostvpn --traffic --country-code US --connect

    //Listar os Servidores disponiveis
    cyberghostvpn --traffic --country-code


Por isso fiz este layer que abstrai os comando grande e os tornam mais simple

    php vpn.php
    
     VPN - 1.0.0 - layer for you vpn provider

            Available arguments:

            list            :    List all available server 
            on [country]    :    connect with server  
            status          :    Status about you connection
            stop            :    Stop connection with server


Esteja livre para adaptar as suas necessidades, depois, crie um link simbolico, assim podera executar de onde quiser.

[Em ação](https://youtube.com/shorts/MbTyXdGrqo0?feature=share)