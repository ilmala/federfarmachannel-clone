<?php

use App\Model\Guest;
use App\Model\Video;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Database;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$database = new Database();

$database->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'federfarmachannel',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$database->setAsGlobal();
$database->bootEloquent();

$app->get('/', function (Request $request, Response $response, $params){
    $videos = Video::query()
        ->with('guests')
        ->latest('published_at')
        ->take(5)
        ->get()
        ->transform(function($video){
            return [
                'id' => $video->id,
                'duration' => substr($video->duration,0,-3),
                'publishedAt' => ucwords($video->published_at->locale('it')->isoFormat('D MMMM')),
                'title' => $video->title,
                'video_url' => $video->video_url,
                'image_url' => $video->image_url,
                'guests' => $video->guests->map(function ($guest) {
                    return $guest->first_name.' '.$guest->last_name;
                })->join(', ')
            ];
        })->toJson();

    $guests = Guest::query()->orderBy('last_name')->get();

    $view = new PhpRenderer(__DIR__ . '/../resources/views');

    return $view->render($response, 'home.php', [
        'videos' => $videos,
        'guests' => $guests,
    ]);
})->setName('home');

$app->run();