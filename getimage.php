<?
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header("Pragma: no-cache");
header('Expires: 0');
$type = $_GET['type'];

	    function formatFileSize($size) {
    $a = array("B", "KB", "MB", "GB", "TB", "PB");
    $pos = 0;
    while ($size >= 1024) {
        $size /= 1024;
        $pos++;
    }
    return round($size,2)." ".$a[$pos];
    }
	
if($type == "0"){
$temp = "";

	    $entries = array_diff( scandir("prinnfile"), array('..', '.'));;
        foreach($entries as $entry) {
		$temp .= '<figure class="sign"><a href="prinnfile/'.$entry.'"><img width="350" height="400" id="prinnfile/'.$entry.'" src="image.php?src=prinnfile/'.$entry.'"></img></a><figcaption>'.$entry.' ('.formatFileSize(filesize( 'prinnfile/' . $entry)) .')</figcaption> <a href="#" onclick="filedel(\'prinnfile/'.$entry.'\')">Удалить</a> <a href="#" onclick="PrintElem(\'prinnfile/'.$entry.'\')">Печать</a></figure>'. PHP_EOL;
        }
		
		$entries = array_diff( scandir("/mnt/scaning"), array('..', '.'));;
        foreach($entries as $entry) {
		$temp .= '<figure class="sign"><a href="scaning/'.$entry.'"><img width="350" height="400" id="/mnt/scaning/'.$entry.'" src="image.php?src=scaning/'.$entry.'"></img></a><figcaption>'.$entry.' ('.formatFileSize(filesize( '/mnt/scaning/' . $entry)) .')</figcaption> <a href="#" onclick="filedel(\'/mnt/scaning/'.$entry.'\')">Удалить</a> <a href="#" onclick="PrintElem(\'scaning/'.$entry.'\')">Печать</a></figure>'. PHP_EOL;
        }
		
		echo $temp;
}
elseif($type == "1"){
	$id = $_GET['id'];
	
	$ids = -1;
	
	$temp = "";
	
$array = array();

	    $entries = array_diff( scandir("prinnfile"), array('..', '.'));;
        foreach($entries as $entry) {
		$ids = $ids + 1;	
		$array[$ids] = '<figure class="sign"><a href="prinnfile/'.$entry.'"><img width="350" height="400" id="prinnfile/'.$entry.'" src="image.php?src=prinnfile/'.$entry.'"></img></a><figcaption>'.$entry.' ('.formatFileSize(filesize( 'prinnfile/' . $entry)) .')</figcaption> <a href="#" onclick="filedel(\'prinnfile/'.$entry.'\')">Удалить</a> <a href="#" onclick="PrintElem(\'prinnfile/'.$entry.'\')">Печать</a></figure>'. PHP_EOL;
        }
		
		$entries = array_diff( scandir("/mnt/scaning"), array('..', '.'));;
        foreach($entries as $entry) {
		$ids = $ids + 1;	
		$array[$ids] = '<figure class="sign"><a href="scaning/'.$entry.'"><img width="350" height="400" id="scaning/'.$entry.'" src="image.php?src=scaning/'.$entry.'"></img></a><figcaption>'.$entry.' ('.formatFileSize(filesize( '/mnt/scaning/' . $entry)) .')</figcaption> <a href="#" onclick="filedel(\'/mnt/scaning/'.$entry.'\')">Удалить</a> <a href="#" onclick="PrintElem(\'scaning/'.$entry.'\')">Печать</a></figure>'. PHP_EOL;
        }
		
		echo $array[$id];
}
elseif($type == "2"){
	
	$ids = -1;
	
	$temp = "";
	
$array = array();

	    $entries = array_diff( scandir("prinnfile"), array('..', '.'));;
        foreach($entries as $entry) {
		$ids = $ids + 1;	
		$array[$ids] = '<figure class="sign"><a href="prinnfile/'.$entry.'"><img width="350" height="400" id="prinnfile/'.$entry.'" src="image.php?src=prinnfile/'.$entry.'"></img></a><figcaption>'.$entry.' ('.formatFileSize(filesize( 'prinnfile/' . $entry)) .')</figcaption> <a href="#" onclick="filedel(\'prinnfile/'.$entry.'\')">Удалить</a> <a href="#" onclick="filedel(\'prinnfile/'.$entry.'\')">Удалить</a> <a href="#" onclick="PrintElem(\''.$entry.'\')">Печать</a></figure>'. PHP_EOL;
        }
		
		$entries = array_diff( scandir("/mnt/scaning"), array('..', '.'));;
        foreach($entries as $entry) {
		$ids = $ids + 1;	
		$array[$ids] = '<figure class="sign"><a href="scaning/'.$entry.'"><img width="350" height="400" id="scaning/'.$entry.'" src="image.php?src=scaning/'.$entry.'"></img></a><figcaption>'.$entry.' ('.formatFileSize(filesize( '/mnt/scaning/' . $entry)) .')</figcaption> <a href="#" onclick="filedel(\'/mnt/scaning/'.$entry.'\')">Удалить</a> <a href="#" onclick="PrintElem(\'/mnt/scaning/'.$entry.'\')">Печать</a></figure>'. PHP_EOL;
        }
		
		echo count($array);
}
?>
