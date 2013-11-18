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
';

    if(isset($reminder_value) && isset($reminder_unit)){
        $reminder_date = '-P';
    //      	          P15DT5H0M20S
        switch($reminder_unit){
            default: case 'H': case 'M': case 'S': $reminder_date .= 'T'.(int)$reminder_value.$reminder_unit; break;
            case 'D': $reminder_date .= (int)$reminder_value.$reminder_unit; break;
        }
        
        echo 'BEGIN:VALARM'."\n";
        echo 'ACTION:DISPLAY'."\n";
        echo 'DESCRIPTION:REMINDER'."\n";
        echo 'TRIGGER;RELATED=START:'.$reminder_date."\n";
        echo 'END:VALARM'."\n";
    }

    echo 'END:VEVENT
';

  } // loop domains

} // no error
?>