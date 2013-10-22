<?php
if(isset($error)) {

  echo $error;

} else {

  foreach($domains as $domain) {
  
    echo '
BEGIN:VEVENT
UID: '. md5($domain['Domain']['domain_name']) . '
SUMMARY: '. $domain['Domain']['domain_name'] . ' Expires
DESCRIPTION: ' . $domain['Domain']['domain_name'] . ' is due to expire today
LOCATION: N/A
DTSTART;VALUE=DATETIME: '.$time->format('Ymd',$domain['Domain']['expiry']) . '
DTSTAMP: ' . $time->format('Ymd',$domain['Domain']['expiry']) . '
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE
END:VEVENT
';

  } 


}?>