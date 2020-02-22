# Telegram-PHP-API
[![API](https://img.shields.io/badge/Telegram%20Bot%20API%20PHP-Yanvar%2014%2C%202020-36ade1.svg)](https://core.telegram.org/bots/api)
![PHP](https://img.shields.io/badge/php-%3E%3D5.6-8892bf.svg)
![CURL](https://img.shields.io/badge/cURL-required-green.svg)


Telegram-API-PHP bu telegram messenjerida oson bot uchish uchun yozilgan open source code.
Bu orqali siz istalgancha ozingizga telegram botlari ochishingiz mumkin va juda oson.

# Yuklab olish
---------
#### Github orqali

Loyiha katalogidan ishga tushiring:
```
https://github.com/shoxruxrashidov/Telegram-API-PHP.git
```
#### Github orqali 2
```
Download tugmachasiga bosing va yukalb oling
```
************
# Pluginni ornatish
************

TelegramBot.php-ni serveringizga nusxalash va uni yangi bot skriptingizga qo'shish kerak boladi:
```php
include 'Telegram.php';

$telegram = new TelegramBot();
$telegram->setToken('Sizning tokeningiz');
```

Konfiguratsiya (WebHook)
---------
Eslatma: Webhook faqat bir maratta connect qilinadi.
```php
echo $telegram->setWebhook('saytingiz manzili');
```
Namuna
------
```php
 
    require_once 'TelegramBot.php';
  
    $telegram = new TelegramBot();
    $telegram->setToken('sizning token');
    $data = $telegram->getData();
 ```
*******
Avto javob berish
*******
```php    

    if ($data->text == 'salom'){
        $telegram->sendMessage('Salom Qalesiz?');
    }
```
*******
Fotosurat yuborish
*******
```php 
 if ($data->text == 'rasim yubor' || $data->text == 'rasim jonat'){
        $telegram->sendPhoto('https://www.fotor.com/ru/loopBannerImg/ru-homeloop2.jpg','senga rasim kerakmi ol ana bolmasa');
    }
```
