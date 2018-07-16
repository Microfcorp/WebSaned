<?
header('Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0'); // HTTP/1.1
header("Pragma: no-cache");
header('Expires: 0');
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // дата в прошлом

// Получить имя запрашиваемого файла
$filename = filter_input(INPUT_GET, 'src', FILTER_SANITIZE_STRING);
// Узнать расширение файла

header("Content-Type: image/pjpeg");
// считать и выдать в ответ содержание файла как есть
//echo $filename;
readfile( $filename);
?>