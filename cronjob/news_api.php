<?php 

error_reporting(E_ALL);
ini_set("display_errors", E_ALL);
 

$url = "https://newsdata.io/api/1/news?apikey=pub_31245ee5c14f7a63bcb973288ccce5537f674&language=en";

$result = getCurlRequest($url);
processData($result);


while($result['nextPage'] != ''){
    $result = getCurlRequest($url."&page=".$result['nextPage']);
    processData($result);
}




echo "<pre>";
print_r($data);
echo "</pre>";
exit;


function processData($result){
    $data = array();
    foreach($result['results'] as $article ){
        $item = array();

        $item['article_id'] = $article['article_id'];
        $item['title'] = $article['title'];
        $item['url'] = $article['link'];
        if(!empty($article['keywords']))
            $item['keywords'] = implode(",",$article['keywords']);
        $item['description'] = $article['description'];
        $item['image_url'] = $article['image_url'];
        $item['publishedAt'] = date("Y-m-d H:i:s",strtotime($article['pubDate']));
        $item['content'] = $article['content'];
        $item['country'] = $article['country'][0];
        $item['category'] = $article['category'][0];
        $item['language'] = $article['language'];
        $item['source'] = $article['source_id'];

        $data[] = $item;

        mySQLDataInsertion($item);
    }
    return $data;
}

function getCurlRequest($url){
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
    );
    
    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response, true);
    curl_close($ch); // Close the connection

    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    return $result;
}


function mySQLDataInsertion($data){
    $servername = "localhost";
    $database = "newspaper";
    $username = "root";
    $password = "waqar";
    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    
    extract($data);
    
    $sql = "INSERT INTO `news_articles` (`article_id`, `title`, `url`, `keywords`, `description`, `image_url`, `publishedAt`, `content`, `country`, `category`, `language`, `source`) 
    VALUES ('$article_id', '".mysqli_real_escape_string($conn,$title)."', '$url', '$keywords', '".mysqli_real_escape_string($conn,$description)."', '$image_url', '$publishedAt', '".mysqli_real_escape_string($conn,$content)."', '$country', '$category', '$language', '$source');";
    // echo "<br>";
    // echo $sql; 
    // echo "<br>";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        mysqli_close($conn);
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        mysqli_close($conn);
        return false;
    }
    

    
}