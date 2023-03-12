<?php

// В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5880174162:AAHdtQIqAq-W8p7nRr-TLo2HXpMG-feINsw";

// Сюда вставляем chat_id
$chat_id = "-1001873913171";

// Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Сайт' => 'osti.su',
        'Имя:' => $name,
        'Телефон:' => $phone
    );

    // Настраиваем внешний вид сообщения в телеграме
    
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

    // Отправляем данные боту
    $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";
    $params = array(
        'chat_id' => $chat_id,
        'parse_mode' => 'html',
        'text' => $txt
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // Выводим сообщение об успешной отправке
    if ($result) {
        echo 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.';
    }

    // А здесь сообщение об ошибке при отправке
    else {
        echo 'Что-то пошло не так. Попробуйте отправить форму ещё раз.';
    }
}

?>