<?php 

session_start();
requireValidSession();

$date = (new DateTime())->getTimestamp();
$today = strftime('%d de %b de %Y', $date);



loadTemplateView('day_records', ['today' => $today]);

?>