<?php
/***
 *Created by: Shoxrux Rashidov
 *Mail: shoxrux@rashidov.dev
 *Date: 2020-01-13
 *Time: 00:24
 ***/

require_once 'TBot.php';
/***
 * getData -> Ushbu funksiyani ishi telegramdan kelgan malumotni siz beradi
 * setToken ->Telegram botingiz tokeni
 * setWebhook -> Saytingizni telegramga boglash uchun bir martalik funksiya
 * sendMessage -> Xabar yuborish uchun funksiya ichiga bitta parametr oladi
 * sendPhoto -> Rasim yuborish uchun funksiya ichiga 2 ta parametr oladi
 ***/
$telegram = new TBot();
//Bu yerga tokeningizni yozasiz qavis ichiga va ' ' orasida
$telegram->setToken('1005050672:AAEqUpmICtQGr7CI5NeK1CNYc74SH0-U17k');
//bu yerga veb saytingiz manzilini yozasiz qavs ichiga va '' orasida
//echo $telegram->setWebhook('https://rashidov.dev/telegram/bot/bot.php');
//1005050672:AAEJ5CesCWvd1c4FYQUzEw4F4VjjyubeYXw  eski token

$data = $telegram->getData();
if ($data->text == '/start') {
    $telegram->sendMessage('Salom Botimizga xush kelibsiz');
}
if ($data->text == '/css') {
    $telegram->sendMessage('css class lari xaqida malumot olmoqchi bolsangiz /css yozib bir boshilq qoyasiz va sizga kerakli bolgan comandani yozasiz masalan /css flexbox');
}
if ($data->text == '/php') {
    $telegram->sendMessage('php funksiya lari xaqida malumot olmoqchi bolsangiz /php yozib bir boshilq qoyasiz va sizga kerakli bolgan comandani yozasiz masalan /php explode');
}
if ($data->text == 'salom') {
    $telegram->sendMessage('Salom Qalesiz?');
} elseif ($data->text == 'yaxshi raxmat' || $data->text == 'yaxshi raxmat sizchi' || $data->text == 'yaxshi raxmat senchi' || $data->text == 'yomon' || $data->text == 'yaxshi') {
    $telegram->sendMessage('xa yaxshi:)');
} elseif ($data->text == 'qalesan' || $data->text == 'qandaysan') {
    $telegram->sendMessage('Yaxshi senchi?');
} elseif ($data->text == 'qalesiz' || $data->text == 'qandaysiz') {
    $telegram->sendMessage('Yaxshi sizchi?');
} elseif ($data->text == 'qandaysiz') {
    $telegram->sendMessage('Yaxshi sizchi?');
} elseif ($data->text == 'rasim yubor' || $data->text == 'rasim jonat') {
    $telegram->sendPhoto('https://www.fotor.com/ru/loopBannerImg/ru-homeloop2.jpg', 'senga rasim kerakmi ol ana bolmasa');
} elseif ($data->text == 'rasim yuboring' || $data->text == 'rasim jonating') {
    $telegram->sendPhoto('https://cdn.pixabay.com/photo/2018/01/14/23/12/nature-3082832__340.jpg', 'Madaniyat bilan soraganingiz uchun raxmat :)');
} else if($data->text == 'menu' || $data->text == 'default-menu'){
    $menu = $this->bot->buildKeyBoard([['🏠 Bosh Saxifa']], $onetime = false, true);
    $telegram->sendMessage('Test Menu',$menu);
}
else if($data->text == 'inline' || $data->text == 'inline-menu'){
    $menu = $this->bot->buildInlineKeyBoard([
        [
            ['text' => 'Telegram-PHP-API Github', 'url' => 'https://github.com/shoxruxrashidov/Telegram-PHP-API'], 
            ['text' => '🏠 Bosh Saxifa', 'callback_data' => 'home']
        ]
    ]);
    $telegram->sendMessage('Inline menu ',$menu);
}
else {
    $telegram->sendMessage('Kechirasiz meni soz boyligim chegaralangan va men boshqa soz bilmayman:( menga faqat "salom", "qalesan yoki qalesiz", "rasim yubor yoki rasim yuboring" desangiz javob berishim mumkin');
}