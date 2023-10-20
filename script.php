<?php 

include("connection/connection.php");
$category_articles = array();
$sql = 'SELECT DISTINCT(category) FROM `news_articles` ORDER BY `category`';
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $category = $row['category'];
    $sql2 = 'SELECT * from `news_articles` WHERE `category` = "'.$category.'" ORDER BY publishedAt DESC LIMIT 4';
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $category_articles[$category][] = $row2;
    }
}

echo "<pre>";
print_r($category_articles);
exit;