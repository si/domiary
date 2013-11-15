<?php
if(isset($error)) {

  echo $error;

} else {

  foreach($domains as $domain) {
  
    echo '
BEGIN:VEVENT
UID:'. md5($domain['Domain']['domain_name']) . '
SUMMARY:'. strtoupper($domain['Domain']['domain_name']) . ' expires
DESCRIPTION:' . $domain['Domain']['domain_name'] . ' is due to expire today
LOCATION:N/A
DTSTART;VALUE=DATETIME:'.$time->format('Ymd\This\Z',$domain['Domain']['expiry']) . '
DTSTAMP:' . $time->format('Ymd\This\Z',$domain['Domain']['expiry']) . '
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE
END:VEVENT
';

  } // loop domains

} // no error
?>