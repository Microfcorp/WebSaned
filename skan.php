<?
$caz = $_POST['caz'];
$dir = $_POST['mestosohran'];
//sleep(3);

$today = date("Y-m-d_H-i-s");

echo shell_exec('sudo bash sc.sh "'.$caz.'" ""'.$dir.'/"'.$today.'".jpeg""');
rename($dir.'/"'.$today.'".jpeg', $dir.''.$today.'.jpeg');
//sleep(5);

//sleep(3);
//echo ($output/*.$caz*/);
?>