<?php
    function safeescapestringis($string){
        $str2 = str_replace('%', '', $string);
        $str2 = str_replace('_', '', $str2);
        $str2 = str_replace('"', '', $str2);
        $str2 = str_replace("'", '', $str2);
        $str2 = str_replace('*', '', $str2);
        $str2 = str_replace('<', '', $str2);
        $str2 = str_replace('>', '', $str2);
        $str2 = str_replace('^', '', $str2);
        $str2 = str_replace('|', '', $str2);
        $str2 = mb_ereg_replace("[\x00\x0A\x0D\x1A\x22\x25\x27]", '\\$0', $str2);
        if (empty($str2) || $str2 == "" || $str2 == " "){
            $str2 = "unknown";
        }

        return $str2;
    }

	function getip() {
        if (getenv("CF-Connecting-IP") && strcasecmp(getenv("CF-Connecting-IP"),"unknown"))
            $ip = getenv("CF-Connecting-IP");
        elseif (getenv("CF-CONNECTING-IP") && strcasecmp(getenv("CF-CONNECTING-IP"),"unknown"))
            $ip = getenv("CF-CONNECTING-IP");
 		elseif (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
 			$ip = getenv("HTTP_CLIENT_IP");
		elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
 			$ip = getenv("HTTP_X_FORWARDED_FOR");
		elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
 	 		$ip = getenv("REMOTE_ADDR");

        elseif (!empty($_SERVER['CF-Connecting-IP']) && strcasecmp($_SERVER['CF-Connecting-IP'], "unknown"))
            $ip = $_SERVER['CF-Connecting-IP'];
        elseif (!empty($_SERVER['CF-CONNECTING-IP']) && strcasecmp($_SERVER['CF-CONNECTING-IP'], "unknown"))
            $ip = $_SERVER['CF-CONNECTING-IP'];
		elseif (!empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
 	   		$ip = $_SERVER['REMOTE_ADDR'];
 	 	else
  	  		$ip = "unknown";
 	 	return(safeescapestringis($ip));
	}
    function get_useragentstriped() {
        return md5(CMSSECRET.':'.(strip_tags(trim($_SERVER['HTTP_USER_AGENT']))));
    }
	function iptoken($salt = false) {
		return md5(($salt? $salt.':' : '').CMSSECRET.':'.getip());
	}
?>