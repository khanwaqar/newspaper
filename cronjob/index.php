<?php
error_reporting(E_ALL);
ini_set("display_errors", E_ALL);
/* ============================= CONFIG ============================= */

// Crawler ID 14048

require_once("../crawler_classes.php");

$startPages[STATUS_FORRENT] = array
(
    TYPE_NONE        =>  array
    (
        "https://www.thenews.com.pk/latest-stories"
    )
);


/* ============================= END CONFIG ============================= */

// START writing data to output.xml file
CrawlerTool::startXML();


$office[TAG_OFFICE_ID] = 1;
$office[TAG_OFFICE_NAME] = "The News International";
$office[TAG_OFFICE_URL] = "https://www.thenews.com.pk/";
CrawlerTool::saveOffice($office);

foreach($startPages as $status => $types)
{
    foreach($types as $type => $pages)
    {
        foreach($pages as $page)
        {
            $html = $crawler->request($page);
            processPage($crawler, $status, $type, $html);
        }
    }
}

// END writing data to output.xml file
CrawlerTool::endXML();

echo "<br /><b>Completed!!</b>";


function processPage($crawler, $status, $type, $html)
{
    static $propertyCount = 0;
    static $properties = array();

    $parser = new PageParser($html, true);

    $nodes = $parser->getNodes("div[@class = 'writter-list-item-story']");

    $items = array();
	foreach($nodes as $node)
    {
        $article = array();

        $article["url"] = $parser->extract_xpath("a/@href", RETURN_TYPE_TEXT, null, $node);
        $article["title"] = $parser->extract_xpath("a[@class='open-section']", RETURN_TYPE_TEXT, null, $node);
        $article["date"] = $parser->extract_xpath("span[@class='latestDate']", RETURN_TYPE_TEXT, null, $node);
        
        $items[] = $article;
	}   
    
    echo "<pre>"; print_r($items); exit;

    foreach($items as $item)
    {
        // keep track of number of properties processed
        $propertyCount += 1;

        // process item to obtain detail information
        echo "--------- Processing property #$propertyCount ...";
        processItem($crawler, $item["item"], $crawler->request($item["itemUrl"]));
        echo "--------- Completed<br />";
    }

    return sizeof($items);
}

function getAddress($crawler, &$property, $lat, $lng)
{
    $obj = json_decode($crawler->request("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false"));
    //$obj = json_decode(file_get_contents("d-3.htm"));
    if(!empty($obj))
    {
        $text = $obj->results[0]->formatted_address;
        if(preg_match("/(.*?),\s(\d{4,})(.*?),/", $text, $match))
        {
            CrawlerTool::parseAddress($match[1], $property);
            $property[TAG_ZIP] = $match[2];
            $property[TAG_CITY] = trim(preg_replace("/\(.*\)|\d/", "", $match[3]));
        }
    }
}

function getGardenOrientation($text, &$property)
{

    if(empty($text)) return;

    $property[TAG_GARDEN_AVAILABLE] = 1;

    $text = trim(strtolower(str_replace("-", "", $text)));

    if ($text=='noordwest' || $text == "nordouest")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'NW';
    }
    elseif ($text=='zuidwest' || $text = "sudouest")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'SW';
    }
    elseif ($text=='zuidoost' || $text == "sudest")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'SE';
    }
    elseif ($text=='noordoost' || $text == "nordest")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'NE';
    }
    elseif ($text=='noord' || $text == "nord")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'N';
    }
    elseif ($text=='oost' || $text == "est")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'E';
    }
    elseif ($text=='west' || $text == "ouest")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'W';
    }
    elseif ($text=='zuid' || $text = "sud")
    {
        $property[TAG_GARDEN_ORIENTATION] = 'S';
    }
}

function checkVal($text, $yes, $no, $isPlanningTag = false)
{
    if($isPlanningTag)
    {
        if(empty($text) || stripos($text, "niet van toepassing") !== false || stripos($text, "niet meegedeeld") !== false || stripos($text, "non communiqué") !== false) return 2;
        if(stripos($text, "in aanvraag") !== false || stripos($text, "en demande") !== false || stripos($text, "requested") !== false) return 3;
    }

    if(empty($text)) return "";
    if(stripos($text, $no) !== false) return 0;
    if(stripos($text, $yes) !== false) return 1;
}

function toNumber($txt)
{
    $txt = preg_replace("/\s/", "", $txt);
    if(preg_match("/([\d\.\,\s]+)/", $txt, $match))
    {
        return trim($match[1]);
    }

    return "";
}

/**
 * Download and extract item detail information
 */
function processItem($crawler, $property, $html)
{
    $parser = new PageParser($html, true);
    $parser->deleteTags(array("script", "style"));

    $property[TAG_TEXT_DESC_NL] = $parser->extract_xpath("div[descendant::table[@class = 'texttable'] and @class = 'row']/following-sibling::div[1]", RETURN_TYPE_TEXT_ALL);
    $property[TAG_PLAIN_TEXT_ALL_NL] = $parser->extract_xpath("div[@class = 'row' and position() > 3]", RETURN_TYPE_TEXT_ALL);
    $pics = $parser->extract_xpath("a[contains(@rel, 'lightbox[oneweb]')]", RETURN_TYPE_ARRAY);
    $picUrls = array();
    foreach($pics as $pic) {
        $url = 'http://93.94.111.77/raheelTestingDec/getPicUrl.php?url='.urlencode("http:".$pic);
        $picInfo = file_get_contents($url);
        $property[TAG_PICTURES][] = array(
            TAG_PICTURE_URL => $pic,
            TAG_PICTURE_VERSION => $picInfo
        );
    }
        

    CrawlerTool::parseAddress($parser->extract_xpath("span[contains(text(), 'LOCATIE:')]/following-sibling::span[1]"), $property);
  /*   $parser->extract_xpath("div[p/span[contains(text(), 'prijs:')]]/p[last()]", RETURN_TYPE_TEXT, function($text) use(&$property)
    {
        if(preg_match("/(\d{4,})(.*)/", $text, $match))
        {
            $property[TAG_ZIP] = $match[1];
            $property[TAG_CITY] = trim(preg_replace("/\(.*\)|\d/", "", $match[2]));
        }
    }); */
    $property[TAG_ZIP] = "2270";
    $property[TAG_CITY] = "Herenthout";

    $price = $parser->extract_xpath("span[contains(text(), 'PRIJS:')]/following-sibling::span[1]", RETURN_TYPE_NUMBER);
    $property[TAG_UNMATCHED_VARIABLES][] = array(TAG_VARIABLE_LABEL => "Price", TAG_VARIABLE_VALUE => $price);
    
    $commonCost = $parser->extract_regex("/(\d+)\seuro vaste kosten/", RETURN_TYPE_NUMBER);
    $property[TAG_UNMATCHED_VARIABLES][] = array(TAG_VARIABLE_LABEL => "Kosten", TAG_VARIABLE_VALUE => $commonCost);

    $excludedVars = array("slaapkamer 1", "slaapkamer 2", "slaapkamer 3", "slaapkamer 4", "slaapkamer 5", "slaapkamer 6");
    $nodes = $parser->getNodes("table[@class = 'texttable']//tr");
    foreach($nodes as $node)
    {
        $name = trim(preg_replace("/:|\d|\(.*?\)/", "", $parser->extract_xpath("td[1]", RETURN_TYPE_TEXT, null, $node)));
        $value = $parser->extract_xpath("td[2]", RETURN_TYPE_TEXT, null, $node);
        if(empty($value) || empty($name)) continue;

        if(in_array($name, $excludedVars)) continue;

        switch($name) {
            case "WC":
            case "parking":
            case "badkamer":
            case "aantal kamers":
                $value = CrawlerTool::toNumber($value);
                break;

            case "type":
                $property[TAG_TYPE] = CrawlerTool::getPropertyType($value);
                if(empty($property[TAG_TYPE])) $property[TAG_TYPE] = CrawlerTool::getPropertyType($property[TAG_TEXT_DESC_NL]);
                $value = "";
                break;

            case "Slaapkamer":
            case "slaapkamer":
            case "terras":
                if(preg_match("/([\d\,\.]+)\s*m/", $value, $match)) {
                    $surf = CrawlerTool::toNumber($match[1]);
                    if($surf > 0) {
                        switch($name) {
                            case "Slaapkamer":
                            case "slaapkamer":
                                $property[TAG_BEDROOMS][] = array(TAG_BEDROOM_SURFACE => $surf);
                                break;

                            case "terras":
                                $property[TAG_TERRACES][] = array(TAG_TERRACE_SURFACE => $surf);
                                break;
                        }
                    }
                }

                $value = "";

                break;

        }

        if(!empty($value)) $property[TAG_UNMATCHED_VARIABLES][] = array(TAG_VARIABLE_LABEL => $name, TAG_VARIABLE_VALUE => $value);
    }

    //print_r($property); exit;

    // WRITING item data to output.xml file
    CrawlerTool::saveProperty($property);
}