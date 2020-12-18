<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

require_once 'vendor/autoload.php';
require_once 'database/configDB.php';

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/token.txt")
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs); 

// Command no @ to bot
$botman->hears("/start", function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    include "command/requestChat.php";
    $bot->reply("Assalamualaikum $firstname (ID:$id_user),\nSelamat Datang Di Layanan Cek Port Telkom.\n\nKetikkan Perintah /help Untuk Mengetahui Menu Perintah Yang Bisa Saya Kerjakan");

});

$botman->hears("/help", function (Botman $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    
    include "command/requestChat.php";
    
    $bot->reply("/OLT {IP} \n*Untuk Melihat Status OLT \n\n /ODP {Nama_ODP} \n*Untuk Melihat Status ODP");
});

$botman->hears("/ODP {nama_odp}", function (Botman $bot, $nama_odp) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    $nama_odp = $nama_odp;
    include "command/requestChat.php";
    include "command/viewDataOLT.php";

    $message = viewDataODP($nama_odp);
    $bot->reply($message);

});

$botman->hears("/OLT {node_ip}", function (Botman $bot, $node_ip) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    $node_ip = $node_ip;
    include "command/requestChat.php";
    include "command/viewDataOLT.php";

    $message = viewDataOLT($node_ip);
    $bot->reply($message);

});


// ------------------------------------------------------------pembatas---------------------------------------------------------- 
// Command with @ to bot
$botman->hears("/start@CekportMaks32bot", function (BotMan $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    $id = $user->getId();

    $bot->reply("Assalamualaikum $firstname (ID:$id_user),\nSelamat Datang Di Layanan Cek Port Telkom.\n\nKetikkan Perintah /help Untuk Mengetahui Menu Perintah Yang Bisa Saya Kerjakan");
    include "command/requestChat.php";
});

$botman->hears("/help@CekportMaks32bot", function (Botman $bot) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();

    include "command/requestChat.php";

    $bot->reply("/OLT {IP} \n*Untuk Melihat Status OLT \n\n /ODP {Nama ODP} \n*Untuk Melihat Status ODP");
});

$botman->hears("/ODP@CekportMaks32bot {nama_odp}", function (Botman $bot, $nama_odp) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    $nama_odp = $nama_odp;
    include "command/requestChat.php";
    include "command/viewDataOLT.php";

    $message = viewDataODP($nama_odp);
    $bot->reply($message);

});

$botman->hears("/OLT@CekportMaks32bot {node_ip}", function (Botman $bot, $node_ip) {
    $user = $bot->getUser();
    $firstname = $user->getFirstName();
    $id_user = $user->getId();
    $node_ip = $node_ip;
    include "command/requestChat.php";
    include "command/viewDataOLT.php";

    $message = viewDataOLT($node_ip);
    $bot->reply($message);

});

// command not found
$botman->fallback(function (BotMan $bot) {
    $message = $bot->getMessage()->getText();
    $bot->reply("Maaf, Perintah Ini '$message' Tidak Ada ðŸ˜¥");
});


$botman->listen();