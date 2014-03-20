<?php
class WhoisComponent extends Object {
    function lookup($domain,$deep_whois = true) {
        App::import('Vendor','whois',array('file'=>'phpwhois'.DS.'whois.main.php'));
        $whois = new Whois();
        $whois->deep_whois = $deep_whois;
        return $whois->Lookup($domain,false);
    }
}
?>
