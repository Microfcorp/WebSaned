<?
header('Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0'); // HTTP/1.1
header("Pragma: no-cache");
header('Expires: 0');
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // дата в прошлом
?>

<!Doctype html>
<html>
<head>
<!--<script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>-->
<title>10 корпус. Сканер</title>
</head>

<script type="text/javascript">

	function PrintElem(elem)
    {
		//var newWin = window.open("about:blank", "hello", "width=200,height=200");
		
		Popup(elem);
		
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
		//var ip = <??>
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<img src="/printing/' + data + '"></img>');
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        //mywindow.close();

        return true;
    }

	
	function createXMLHttp() {
        if (typeof XMLHttpRequest != "undefined") { // для браузеров аля Mozilla
            return new XMLHttpRequest();
        } else if (window.ActiveXObject) { // для Internet Explorer (all versions) 
            var aVersions = [
                "MSXML2.XMLHttp.5.0",
                "MSXML2.XMLHttp.4.0",
                "MSXML2.XMLHttp.3.0",
                "MSXML2.XMLHttp",
                "Microsoft.XMLHttp"
            ];
            for (var i = 0; i < aVersions.length; i++) {
                try {
                    var oXmlHttp = new ActiveXObject(aVersions[i]);
                    return oXmlHttp;
                } catch (oError) {}
            }
            throw new Error("Невозможно создать объект XMLHttp.");
        }
    }

// фукнция Автоматической упаковки формы любой сложности
function getRequestBody(oForm) {
    var aParams = new Array();
    for (var i = 0; i < oForm.elements.length; i++) {
        var sParam = encodeURIComponent(oForm.elements[i].name);
        sParam += "=";
        sParam += encodeURIComponent(oForm.elements[i].value);
        aParams.push(sParam);
    }
    return aParams.join("&");
}
// функция Ajax POST
function postAjax(url, oForm, callback) { 
    // создаем Объект
    var oXmlHttp = createXMLHttp();
    // получение данных с формы
    var sBody = getRequestBody(oForm);
    // подготовка, объявление заголовков
    oXmlHttp.open("POST", url, true);
    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // описание функции, которая будет вызвана, когда придет ответ от сервера
    oXmlHttp.onreadystatechange = function() {
        if (oXmlHttp.readyState == 4) {
            if (oXmlHttp.status == 200) {
                callback(oXmlHttp.responseText);
            } else {
                callback('error' + oXmlHttp.statusText);
            }
        }
    };
    // отправка запроса, sBody - строка данных с формы
    oXmlHttp.send(sBody);
	return true;
}

function SendPost() {
showbanner();	
	/*//alert(caz);
	//отправляю POST запрос и получаю ответ
	$$a({
		type:'post',//тип запроса: get,post либо head
		url:'skan.php',//url адрес файла обработчика
		data:{'caz':caz},//параметры запроса
		response:'text',//тип возвращаемого ответа text либо xml
		success:function (data) {//возвращаемый результат от сервера
			alert(data);
		}
	});*/
	
postAjax('skan.php', document.forms[0], showResult);	
	
}
var id = -1;
function test(){
	postAjax('getimage.php?type=2', document.forms[0], getimage);
}
function set(d){
	var today = new Date();
    var milliseconds = today.getMilliseconds();
id = d;
	postAjax('getimage.php?type=1&time=' + milliseconds + '&id=' + d, document.forms[0], function(d){document.getElementById("img").innerHTML = d;});

}
function sledimg(){
	var today = new Date();
    var milliseconds = today.getMilliseconds();

	id = id + 1;
	postAjax('getimage.php?type=1&time=' + milliseconds + '&id=' + id, document.forms[0], function(d){document.getElementById("img").innerHTML = d;});
}
function predimg(){
	var today = new Date();
    var milliseconds = today.getMilliseconds();

	id = id - 1;
	postAjax('getimage.php?type=1&time=' + milliseconds + '&id=' + id, document.forms[0], function(d){document.getElementById("img").innerHTML = d;});
}
function showResult(d){
	//alert(d);
	document.getElementById('skaning').style.display = 'none';
	test();
}
function showbanner(){
	document.getElementById('skaning').style.display = 'block';
}
function getimage(d){
	var ul = document.getElementById("spisok");
	ul.innerHTML = "";
	var today = new Date();
    var milliseconds = today.getMilliseconds();
	
	for(i = 0; i < d; i++){
	var li = document.createElement('li');
	//postAjax('getimage.php?type=2&time=' + milliseconds + '&id=' + i, document.forms[0], function(d){li.appendChild(document.createTextNode(d));})   
    //li.onclick = "sledimg()";
	li.innerHTML = "<a href='#' onclick=set("+i+")>"+i+"</a>"
	//li.appendChild();
	ul.appendChild(li);
	}
	//document.getElementById("image").innerHTML = d;
}
function filedel(d){
	postAjax('filedel.php?file=' + d, document.forms[0], function(da){test();});	
}
window.setTimeout("test()",1);
window.setTimeout("sledimg()",10);
</script>

<style>
   .sign {
    float: left; /* Выравнивание по правому краю */
    border: 1px solid #333; /* Параметры рамки */
    padding: 7px; /* Поля внутри блока */
    margin: 10px 0 5px 5px; /* Отступы вокруг */
    background: #f0f0f0; /* Цвет фона */ 
   }
   .sign figcaption {
    margin: 0 auto 5px; /* Отступы вокруг абзаца */
   }
  </style>

<body>
	<?php include_once("/var/www/html/site/verh.php"); ?>
	<H1 style="text-align: center; color:red;">Главная страница сканера</H1>
	<span style="font-size: 15pt; color:green;">
	Выберите качество печати:
	</span>
	
	<form method="post">
	   <select id="cazestvo" name="caz">
        <option value="75">Низкое (для превью)</option>
		<option value="150">"Так себе" (между печатью и превью)</option>
        <option value="300">Среднее (для печати)</option>
        <option value="600">Высокое (для широкоформатной печати)</option>
       </select>
	   <select id="mestosohran" name="mestosohran">
        <option value="/mnt/scaning">Сетевой диск</option>
		<option value="/var/www/html/printing/prinnfile">Внутренние хранилище</option>
       </select>
       <input name="sendcmd" onclick="SendPost()" value="Сканировать" type="button" />	   
	  </form>
	  <div id='skaning' style='display:none'>
	  <H4>Пожалуйста подождите, идёт сканирование</H4>
	  </div>
	  <br>
	  <div>
	  <ul id="spisok">
	  
	  </ul>
	  <?
	  function formatFileSize($size) {
    $a = array("B", "KB", "MB", "GB", "TB", "PB");
    $pos = 0;
    while ($size >= 1024) {
        $size /= 1024;
        $pos++;
    }
    return round($size,2)." ".$a[$pos];
}
	  ?>
	  <p><span id="img"></span> 
	  <a href="#" OnClick="predimg()">&#8592;</a><a href="#" OnClick="sledimg()">&#8594;</a></p>
	  </div>
</body>

<footer>
<?php //include_once("/var/www/html/site/footer.php"); ?>
</footer>
</html>