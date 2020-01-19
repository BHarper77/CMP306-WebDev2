<?php
include "../Model/articlesAPI.php";

header('Content-Type: text/xml; charset=utf-8', true);

$articlesJSON = fiveLatestArticles();
$articles = json_decode($articlesJSON);

$numberOfArticles = count($articles);

$dom = new DOMDocument("1.0", "UTF-8");

//Creating rss element and adding it to DOM
$rss =  $dom->createElement("rss");
$rssNode = $dom->appendChild($rss);
$rssNode->setAttribute("version", "2.0");

//Creating channel node, add under rss node
$channel = $dom->createElement("channel");
$channelNode = $rssNode->appendChild($channel);

//Adding nodes under channel
$channelNode->appendChild($dom->createElement("title", "RSS Feed"));
$channelNode->appendChild($dom->createElement("description", "description"));
$channelNode->appendChild($dom->createElement("link", "https://mayar.abertay.ac.uk/~1700485/CMP306Website/View/Week10.php"));

//Adding items to channel
for ($i=0; $i < $numberOfArticles; $i++) 
{
	$itemNode = $channelNode->appendChild($dom->createElement("item"));

	$titleNode = $itemNode->appendChild($dom->createElement("title", $articles[$i] -> ArticleTitle));
	$linkNode = $itemNode->appendChild($dom->createElement("link", "https://mayar.abertay.ac.uk/~1700485/CMP306Website/View/Week10.php"));
	$descriptionNode = $itemNode->appendChild($dom->createElement("description", $articles[$i] -> Text));
}

echo $dom->saveXML();
?>