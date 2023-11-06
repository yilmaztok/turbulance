<?php

function getir($baslangic, $son, $cekilmek_istenen)
{
    @preg_match_all('/' . preg_quote($baslangic, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $cekilmek_istenen, $m);
    return @$m[1];
} 
 
	




$url="https://oem-bike-parts.com/en/parts/honda/125cc-349cc/anf-125-innova/anf1255-innova-2005/f-3-kabel-tukor";
	
	
$options = array(
'http'=>array(
'method'=>"GET",
'header'=>"Accept-language: en\r\n" .
           "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
  )
);

$context = stream_context_create($options);
$raw = file_get_contents($url, false, $context);

echo $raw; 
	
echo $test=getir('<img src="','" data-elem="pinchzoomerCatalog"',$raw); 
echo $test2=getir('<strong>','</strong>',$raw); 
echo $test3=getir('{"@context":','}}]}',$raw);
echo $test4=getir('<div>','</div>',$raw); 

	
echo "<br>	<br>	<br>	<br>	";
	
echo "y?lmaz";	
	
echo "anaresim:".$test[0];echo "<br>	<br>	<br>	<br>	";	
echo "ana anaparca:".$test2[0];	echo "<br>	<br>	<br>	<br>	";	
echo "bagli parcalar:".$test3[2];	echo "<br>	<br>	<br>	<br>	";		
$parsele=$test3[2];
echo "<br>";
echo "<br>";
	
	
$bagliparcaadi=getir('"Product","name":"','","',$parsele); 
$bagliparcaresmi=getir('"image":"','"',$parsele); 
$bagliparcastokkodu=getir('"sku":"','","',$parsele); 
$bagliparcaparabirimi=getir('"priceCurrency":"','","',$parsele); 	
$bagliparcafiyat=getir('"price":"','","',$parsele); 		

$editleanaresim=str_replace('\\','','https://oem-bike-parts.com/en/'.$test[0]);
$editleresim=str_replace('\\','',$bagliparcaresmi[0]);


if(!@copy($editleanaresim,'/home/eksparcomtr/public_html/onarim/test-ana.jpg'))
{
   $errors= error_get_last();
   echo "COPY ERROR: ".$errors['type'];
   echo "<br />\n".$errors['message'];
} else {
   echo "yeni yer File copied from remote!";
}
	
	
	
if(!@copy($editleresim,'/home/eksparcomtr/public_html/onarim/test.jpg'))
{
   $errors= error_get_last();
   echo "COPY ERROR: ".$errors['type'];
   echo "<br />\n".$errors['message'];
} else {
   echo "yeni yer File copied from remote!";
}
	
	
echo "parsele"."<br>";
echo $bagliparcaadi[0];	echo $bagliparcaresmi[0];		echo $bagliparcastokkodu[0];			echo $bagliparcaparabirimi[0];			echo $bagliparcafiyat[0];	
echo "<br>"."/parsele"."<br>";	
echo "<br>";	
echo "<br>	<br>	<br>	<br>	";	
	
	
var_dump($test);	
echo "<br>";
var_dump($test2);	
echo "<br>";
var_dump($test3);	
echo "<br>";
var_dump($test4);	
?>