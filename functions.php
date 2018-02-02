<?php

function curle($link)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// get the result of http query
    $output = curl_exec($ch);
    curl_close($ch);
// feed the curl output to simplexml_load_string
     return $output;
}

//$xml = simplexml_load_string($output) or die(“XML string not loading”);



function formatXML($link_get) {
    $rss = simplexml_load_string(curle($link_get));
    $items = $rss->xpath('/rss/channel/item');
    $startAtItem = 0;
    $numberOfItems = 5;
    $firstFiveItems = array_slice($items, $startAtItem, $numberOfItems);
     
    foreach($firstFiveItems as $article){
        $title= $article->title;
        $pubDate= $article->pubDate;
        $pubDate =rtrim($pubDate,"+0000");
        $link= $article->link;
        $description= $article->description;


        echo  "<div style=' color:#FFFF00; background:#0C8C4F;width: 50%;margin:20px auto'  class=\" animated slideInDown well well-lg \">";
        echo "<span> $pubDate </span>";
        echo "<h4>$title </h4>";
        echo "<p > $description <a style='color:#1A20F5' href=\"$link\">Read more</a></p>";
        echo "</div>";
        if($i==5){
            return;
        }

    }
}
