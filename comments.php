<?php
    // Подключаем БД
    include($_SERVER['DOCUMENT_ROOT']."/db.php");

        //Это переменная, ассоциативный массив для сбора информации 
    $templatet = [
        'data'=>[],
        'error'=>[]
    ];
   //Функция очистки входных параметров
   function clean_field( $key ){
    $value = '';

    if( isset( $_POST[$key] ) ){
        //trim удаляет все проблемы, отступы и переносы строк сначала и в конце строчки
        //strip_tags удаляет html и php из строки
        $value = trim( strip_tags( $_POST[$key] ) );
    }
    return $value;
}

//Проверка на то, что пользователь ввел имя и email
if(!empty($_POST['name']) && !empty($_POST['text_comment'])){ 

  //Формируем адрес автарки
  $email=$_POST['email'];
  function get_gravatar( $email, $s = 70, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
      $email=$_POST['email'];
      $url = 'https://www.gravatar.com/avatar/';
      $url .= md5( strtolower( trim( $email ) ) );
      $url .= "?s=$s&d=$d&r=$r";
      if ( $img ) {
          $url = '<img src="' . $url . '"';
          foreach ( $atts as $key => $val )
              $url .= ' ' . $key . '="' . $val . '"';
          $url .= ' />';
      }
      return $url;
  }
    $avatar=get_gravatar( $email, $s = 70, $d = 'mp', $r = 'g', $img = false, $atts = array());

    //Процедура очистки параметров и занесение их в template
    $template['data']['fields'] = [
        'page_id'=> clean_field('page_id'),
        'email'=>clean_field('email'),
        'name'=> clean_field('name'),
        'text_comment'=>clean_field('text_comment'),
        'date_create'=>clean_field('date_create')
    ];

     //Отправляем данные в БД
     $sql = "INSERT INTO commentsi (id,`page_id`,`avatar`,`email`,`name`,`text_comment`,`date_create`)";
     $sql .= "VALUE (NULL, '{$template['data']['fields']['page_id']}','{$avatar}','{$template['data']['fields']['email']}','{$template['data']['fields']['name']}', '{$template['data']['fields']['text_comment']}', NOW())";
     $result = mysqli_query($link, $sql);   

    }
       if( $result ){
        echo 'Yes';
    }else{
        echo 'No';
    }
?>
