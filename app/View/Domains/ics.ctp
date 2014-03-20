<?php
if(isset($error)) {

  echo $error;

} else {

  foreach($domains as $domain) {
  
    echo "
BEGIN:VEVENT\r\n
UID:". md5($domain['Domain']['domain_name']) . "\r\n
SUMMARY:". strtoupper($domain['Domain']['domain_name']) . " expires\r\n
DESCRIPTION:" . $domain['Domain']['domain_name'] . " is due to expire today\r\n
LOCATION:N/A\r\n
DTSTART;VALUE=DATE:".$time->format('Ymd',$domain['Domain']['expiry']) . "\r\n
DTSTAMP;VALUE=DATE:" . $time->format('Ymd',$domain['Domain']['expiry']) . "\r\n
CLASS:PUBLIC\r\n
STATUS:FREE\r\n
X-MICROSOFT-CDO-BUSYSTATUS:FREE\r\n
";

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

    echo "END:VEVENT\r\n
";

  } // loop domains

} // no error
?>