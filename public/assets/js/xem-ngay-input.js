
today = new Date();
var Day = today.getDate();
var Mon = today.getMonth()+1;
var Year = today.getFullYear();

$('.current-day').text(Day);
$('.current-month').text(Mon);
$('.current-year').text(Year);
