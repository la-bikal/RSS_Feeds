<?php 
error_reporting(0);
$feedlist = array(
    "BBC"=>"http://feeds.bbci.co.uk/news/rss.xml",
    // "REUTERS"=>"http://feeds.reuters.com/reuters/technologyNews",
    "NYT"=>"https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml",
    "CNN"=>"http://rss.cnn.com/rss/cnn_tech.rss"
);

foreach($feedlist as $x => $x_value) {
    echo "<i style='color:#FFab54'>[[".$x."]]</i>: ";

    $xmlDoc = new DOMDocument();

    if($xmlDoc->load($x_value)){
        $x=$xmlDoc->getElementsByTagName('item');

        for ($i=0; $i<5; $i++) {

        $item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
        echo "<span>" . strip_tags($item_desc) . "</span>";
            }
    }
    else{ 
        echo "<span> No news feed </span>";
    }
}
?>


