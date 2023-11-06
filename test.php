<?php 
//$url="https://oem-bike-parts.com/en/parts/honda/125cc-349cc/anf-125-innova/anf1255-innova-2005/f-3-kabel-tukor";

function getir($baslangic, $son, $cekilmek_istenen)
{
    @preg_match_all('/' . preg_quote($baslangic, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $cekilmek_istenen, $m);
    return @$m[1];
} 

 
/*
$url="https://oem-bike-parts.com/en/parts/honda/0-124cc/bali-50/sj50x-bali-1999";

$options = array(
'http'=>array(
'method'=>"GET",
'header'=>"Accept-language: en\r\n" .
           "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
  )
);

$context = stream_context_create($options);
echo $raw = file_get_contents($url, false, $context);

  

$blok=getir('<img class="img-responsive" title="','" alt="',$raw);	

echo var_dump($blok);
*/
$url="https://oem-bike-parts.com/en/parts/honda/0-124cc/bali-50/sj50x-bali-1999/e-1-ventilatorburkolat-burkolat";

$options = array(
'http'=>array(
'method'=>"GET",
'header'=>"Accept-language: en\r\n" .
           "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
  )
);

$context = stream_context_create($options);
echo $raw = file_get_contents($url, false, $context);

  

$blok=getir('<img class="img-responsive" title="','" alt="',$raw);	

echo var_dump($blok);






?>