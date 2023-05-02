<?php
    function safeescapestringuag($string){
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
            $str2 = "unknownagent";
        }

        return $str2;
    }

    function get_useragent() {
        return safeescapestringuag(strip_tags(trim($_SERVER['HTTP_USER_AGENT'])));
    }

    function getos($agent = false) {
        if (!$agent) $agent = get_useragent();
        $os  = 'Unknown';
        $oss     = array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        foreach ($oss as $regex => $value) {
            if (preg_match($regex, $agent)) {
                $os = $value;
            }
         }
        return $os;
    }

    function getbrowser($agent = false) {
        if (!$agent) $agent = get_useragent();
        $browser = 'Unknown';
        $browsers = array(
                '/msie/i'      => 'Internet Explorer',
                '/firefox/i'   => 'Firefox',
                '/safari/i'    => 'Safari',
                '/chrome/i'    => 'Chrome',
                '/edge/i'      => 'Edge',
                '/opera/i'     => 'Opera',
                '/netscape/i'  => 'Netscape',
                '/maxthon/i'   => 'Maxthon',
                '/konqueror/i' => 'Konqueror',
                '/mobile/i'    => 'Handheld Browser'
        );
        foreach ($browsers as $regex => $value) {
            if (preg_match($regex, $agent)) {
                $browser = $value;
            }
        }
        return $browser;
    }

    function get_agent_compact($agent = false) {
        if (!$agent) $agent = get_useragent();
        return getos($agent).' '.getbrowser($agent);
    }
?>