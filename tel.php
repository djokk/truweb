<?php
 
  /* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
  где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
  // 1069245163:AAGNPkmO1n4eLQWSR9ATgeU9R6A1vcaULqA
  //Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
  $name = $_POST['user_name'];
  $phone = $_POST['user_phone'];
  // $email = $_POST['user_email'];
  
  //в переменную $token нужно вставить токен, который нам прислал @botFather
  $token = "2101074495:AAEl7YGEL2Dek-gpiAPXjt44QlJ1r2smbBI";
  //$token = "1069245163:AAGNPkmO1n4eLQWSR9ATgeU9R6A1vcaULqA";
  //нужна вставить chat_id (Как получить chad id, читайте ниже)
  $chat_id = "-607144176";//0
  //$chat_id = "-381738701";//0

  //Далее создаем переменную, в которую помещаем PHP массив
  $arr = array(
    'Имя пользователя: ' => $name,
    'Телефон: ' => $phone,
    // 'Email' => $email
  );
  
  //При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
  foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  };
  
  //Осуществляется отправка данных в переменной $sendToTelegram
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
  
  //Если сообщение отправлено, напишет "Thank you", если нет - "Error"
  if ($sendToTelegram) {
      echo '<center><p class="success">Спасибо за отправку вашего сообщения!</p></center>';
  }
  else 
    {
    echo '<center><p class="fail"><b>Ошибка. Сообщение не отправлено!</b></p></center>';
    }
?>
