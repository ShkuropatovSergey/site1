<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="height=device-width, initial-scale=1,width=device-width "> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--<meta http-equiv="X-UA-Compatible" content="ie=edge"> -->


    <title>Moscow</title>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/header/style_header.css">
    <link rel="stylesheet" href="css/index/style.css">
    <link rel="stylesheet" href="css/tours/style_tours.css">
    <link rel="stylesheet" href="css/contacts/style_contacts.css">
    <link rel="stylesheet" href="css/book/style_book.css">
    <link rel="stylesheet" href="css/subscriber/style_subscriber.css">
    <link rel="stylesheet" href="css/footer/style_footer.css">
    <link rel="stylesheet" href="css/error/style_error.css">
    <link rel="stylesheet" href="css/comments/style_comments.css">
    <link rel="stylesheet" href="css/search/style_search.css">

</head>

<body id='top'>
    
    
<header>

<?php 
// Подключаем БД
include($_SERVER['DOCUMENT_ROOT']."/db.php");
//Определим URI
$uri=$_SERVER['REQUEST_URI'];
if(strlen($uri)>1){
$len = strlen($uri);
$part_uri=substr($uri,0,$len-4);
}else{$part_uri=$uri;}

$sliderHeader = [];
$mas_part_uri=[];

        //Формируем данные картинок в слайдер
    $sql_cards = " SELECT * FROM `sliderheader`";
    $result_cards = mysqli_query($link, $sql_cards);

    while( $data_card = mysqli_fetch_assoc($result_cards) ){
        array_push($sliderHeader, $data_card);
    }

    ?>
    <?php foreach( $sliderHeader as $key => $row): ?>
        <?php foreach( $row as $k => $value): ?>
            <?php if( $k == $part_uri ):?>
                <?php array_push($mas_part_uri,$value)?>    
             <?php endif; ?>                                                
    <?php endforeach;?> 
    <?php endforeach;?>   
    
            <div id="headerSleder" class="owl-carousel">
                <?php foreach($mas_part_uri as $value): ?>
                    <div class=<?=$value?>>
                        <div class="wrapper">
                            <div class="navigation">
                                <div class="logo">
                                    <a href="/" class="picture-spasskaya-tower"></a>
                                    <a href="/" class="picture-MyMoscow">MyMoscow</a>
                                </div>
                                <div class="nav">
                                    <a href="/" lang="a">Главная</a>
                                    <a href="tours.php" lang="b">Наши услуги</a>
                                    <a href="/#our-company" lang="c" data="#our-company">О<span>q</span>компании</a>
                                    <a href="contacts.php" lang="d">Контакты</a>
                                    <a href="/#comments" lang="e" data="#comments">Отзывы</a>
                                </div>
                            </div>
                            <div class="text">
                                <h1>Необычная Москва</h1>
                                <p>MyMoccow-агенство интересных маршрутов</p>
                            </div>
                            <div class="button">
                                <a href="tours.php">ПОДРОБНЕЕ О НАС</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?> 
            </div> 
        </header> 


