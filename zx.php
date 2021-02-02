<?php
    include($_SERVER['DOCUMENT_ROOT']."/header.php"); 
?>
<script> window.location='/'</script>
<button id="more">Дальше</button>
<script type="text/javascript">
// $(document).ready(function(){
 
var inProgress = false; // идет процесс загрузки
var startFrom = 10; // позиция с которой начинается вывод данных
 console.log($('#more'));
    $('#more').on('click',function() {console.log("sss");
    //    if (!inProgress) {
    //         $.ajax({
    //             url: 'ajax.items.php', // путь к ajax-обработчику
    //             method: 'POST',
    //             data: {
    //                 "start" : startFrom
    //             },
    //             beforeSend: function() {
    //                 inProgress = true;
    //             }
    //         }).done(function(data){
    //             data = jQuery.parseJSON(data); // данные в json
    //             if (data.length > 0){
    //                 // добавляем записи в блок в виде html
    //                 $.each(data, function(index, data){
    //                     $("#articles").append("<p><b>" + data.title + "</b><br />" + data.text + "</p>");
    //                 });
    //                 inProgress = false;
    //                 startFrom += 10;
    //             }
    //         });
    //     }
     });
//});

</script>

    <script src="jquery.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="shop-slider.js"></script>
    <script src="header-slider.js"></script>
    <script src="script.js"></script>
    </body>

</html>