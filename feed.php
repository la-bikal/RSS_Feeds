<?php   
    include('feedHelpers.php');    
    
    # List of sources to extract news feeds from
    $feedlist = array(
    "BBC"=>"http://feeds.bbci.co.uk/news/rss.xml",    
    "NYT"=>"https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml",
    "CNN"=>"http://rss.cnn.com/rss/cnn_tech.rss"
    ); 
    
    # Number of news items to fetch for each source
    $newsCount = 3;
?>
<html>
<head>
    <title> News Feed </title> 
</head>

<body>
    <marquee><h2><?php echo getFeedsForMarquee($feedlist, $newsCount) ?>  </h2></marquee>
</body>
</html>
