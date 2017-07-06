<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return response()->json(['name'=>"Fakerest","by"=>"BluefireDev"]);
});
$app->get('/users', function () use ($app) {
    $times=range(0,100);
    $data=[];
    $faker=Faker\Factory::create();
    foreach ($times as $i)
    {
        $item=[];
        $item["name"]=$faker->name;
        $item["username"]=$faker->userName;
        $item["photo"]=$faker->imageUrl(250,250);
        $item["email"]=$faker->email;
        $item["created_at"]=$faker->date();
        $data[]=$item;
    }
    return response()->json($data);
});
$app->get('/users/{limit}', function ($limit) use ($app) {
    if(!isset($limit))
        $limit=100;

    $times=range(0,$limit);
    $data=[];
    $faker=Faker\Factory::create();
    foreach ($times as $i)
    {
        $item=[];
        $item["name"]=$faker->name;
        $item["username"]=$faker->userName;
        $item["email"]=$faker->email;
        $item["photo"]=$faker->imageUrl("250","250");
        $item["created_at"]=$faker->date();
        $data[]=$item;
    }
    return response()->json($data);
});

$app->get('/places', function () use ($app) {
    $times=range(0,100);
    $data=[];
    $faker=Faker\Factory::create();
    foreach ($times as $i)
    {
        $item=[];
        $item["name"]=$faker->streetName;
        $item["latitude"]=$faker->latitude;
        $item["longitude"]=$faker->longitude;
        $data[]=$item;
    }
    return response()->json($data);
});

$app->get('/posts', function () use ($app) {
    $times=range(0,100);
    $data=[];
    $faker=Faker\Factory::create();
    foreach ($times as $i)
    {
        $item=[];
        $item["title"]=$faker->text(50);
        $item["image"]=$faker->imageUrl(250,250);
        $item["content"]=$faker->text(300);
        $item["created_at"]=$faker->date();
        $item["author"]=$faker->email;
        $data[]=$item;
    }
    return response()->json($data);
});


