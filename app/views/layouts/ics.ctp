<?php header('Content-type:text/calendar'); ?>
BEGIN:VCALENDAR
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-TIMEZONE;VALUE=TEXT:GMT
PRODID:-//unstyled.com//NONSGML v1.0//EN
X-WR-CALNAME;VALUE=TEXT:<?php echo 'Domiary for Si\n'; ?>
VERSION:2.0
<?php echo $content_for_layout; ?>
END:VCALENDAR