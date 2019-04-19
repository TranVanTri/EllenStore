<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Helloo!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
