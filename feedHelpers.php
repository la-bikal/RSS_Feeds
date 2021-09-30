<?php 			
	function getFeedsForMarquee($feedlist, $newsCount){		

	/**
		 * This function returns news feeds from multiple RSS sources as a single string to be displayed in the page.
		 * 
		 * Parameters : $feedlist -> RSS feed links as a list
		 			    $newsCount -> Number of news item for each RSS source
		 *
		 * Returns : News feeds to return for Marquee as a string
	 **/

		$returnText = "";

		foreach($feedlist as $x => $x_value) {
		    $returnText = $returnText ."<i style='color:#FFab54'>[".$x."]</i>: ";

		    $xmlDoc = new DOMDocument();
		    
		    # Loading the xml file for each rss source
		    if($xmlDoc->load($x_value)){
		    	# Extracting the element "item" which consists of description
		        $x=$xmlDoc->getElementsByTagName('item');

		        for ($i=0; $i<$newsCount; $i++) {
		        	# Description tag consists of the actual news feed desired
			        $item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

			        # Stripping html and php tags from the description for pretty print
			        $returnText = $returnText.' '.strip_tags($item_desc);		        
		        }
		    }
	    	else{ 
	        	$returnText = $returnText.' '."<span> No news feed </span>";
	    	}
		}

	return $returnText;
	}
?>