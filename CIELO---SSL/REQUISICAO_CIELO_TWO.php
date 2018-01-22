<?php
require 'errorHandling.php';
require_once 'pedido.php';
require_once 'logger.php';

define('VERSAO', "1.1.0");

session_start();

if(!isset($_SESSION["pedidos"]))
{
        $_SESSION["pedidos"] = new ArrayObject();
}

// CONSTANTES
define("ENDERECO_BASE", "https://ecommerce.cbmp.com.br");
define("ENDERECO", ENDERECO_BASE."/servicos/ecommwsec.do");

define("LOJA", "xxxxx");
define("LOJA_CHAVE", "xxxxx");
define("CIELO", "");
define("CIELO_CHAVE", "???????????????????????????????????????????????????????????????");


// Envia requisição
function httprequest($paEndereco, $paPost){

        $sessao_curl = curl_init();
        curl_setopt($sessao_curl, CURLOPT_URL, $paEndereco);
        
        curl_setopt($sessao_curl, CURLOPT_FAILONERROR, true);

        //  CURLOPT_SSL_VERIFYPEER
        //  verifica a validade do certificado
        curl_setopt($sessao_curl, CURLOPT_SSL_VERIFYPEER, false);
        //  CURLOPPT_SSL_VERIFYHOST
        //  verifica se a identidade do servidor bate com aquela informada no certificado
        curl_setopt($sessao_curl, CURLOPT_SSL_VERIFYHOST, 2);

        //  CURLOPT_SSL_CAINFO
        //  informa a localização do certificado para verificação com o peer
        curl_setopt($sessao_curl, CURLOPT_CAINFO, getcwd() .
                        "/????/???????????????????????????????????????????????????????????????.crt");
        curl_setopt($sessao_curl, CURLOPT_SSLVERSION, 3);

        //  CURLOPT_CONNECTTIMEOUT
        //  o tempo em segundos de espera para obter uma conexão
        curl_setopt($sessao_curl, CURLOPT_CONNECTTIMEOUT, 10);

        //  CURLOPT_TIMEOUT
        //  o tempo máximo em segundos de espera para a execução da requisição (curl_exec)
        curl_setopt($sessao_curl, CURLOPT_TIMEOUT, 40);

        //  CURLOPT_RETURNTRANSFER
        //  TRUE para curl_exec retornar uma string de resultado em caso de sucesso, ao
        //  invés de imprimir o resultado na tela. Retorna FALSE se há problemas na requisição
        curl_setopt($sessao_curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($sessao_curl, CURLOPT_POST, true);
        curl_setopt($sessao_curl, CURLOPT_POSTFIELDS, $paPost );

        $resultado = curl_exec($sessao_curl);
        
        curl_close($sessao_curl);

        if ($resultado)
        {
                return $resultado;
        }
        else
        {
                return curl_error($sessao_curl);
        }
}

// Monta URL de retorno
function ReturnURL()
{
        $pageURL = 'http';

        if ($_SERVER["SERVER_PORT"] == 443) // protocolo https
        {
                $pageURL .= 's';
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80")
        {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
                $pageURL .= $_SERVER["SERVER_NAME"]. substr($_SERVER["REQUEST_URI"], 0);
        }
        // ALTERNATIVA PARA SERVER_NAME -> HOST_HTTP

        $file = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

        $ReturnURL = str_replace($file, "retorno.php", $pageURL);

        return $ReturnURL;
}

?>