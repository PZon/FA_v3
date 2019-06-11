<?php
$currentYear=date('Y');
$currentMonth=date('m');

if(date('m')==1) $prevMonth=12;
else $prevMonth=date('m')-1;


$currentYM=$currentYear.'-'.$currentMonth.'-01';
$prevYM=$currentYear.'-'.$prevMonth.'-01';
$prevYMEnd=$currentYear.'-'.$prevMonth.'-31';

echo $prevMonth;
?>