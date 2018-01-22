
<?PHP



function sec_session_start() {

 
 


	
	//########## PRIMER DEVE DEFINIR OS PARAMETROS --- ANTES DE INICIAR   session_start();
	//      NUNCA DEFINA 1 TRUE PARA INICIAR AUTOMATICO ---NO ---PHP.INI--------------PORQUE  PRIMEIRO DEVE DEFINIR PARAMETROS 
	
	//VEJA EXEMPLO ABAIXO

    $session_name = md5('start_id');   // Set a custom session name
    $secure = true;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
	
	
	
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) { //________________________________________
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }//_____________________________________________________________________________________________
	
	
	
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
	
	
	//INICIAR
    session_start();            // Start the PHP session 
	
	
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
	
	
}    //________________________________________________________________FIM_____________________FUNCTION_____sec_session_start











//######################### O FORM USA this funtion

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

