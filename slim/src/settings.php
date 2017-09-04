<?php
return [
  'settings' => [
    'displayErrorDetails' => true, // set to false in production
    'addContentLengthHeader' => false, // Allow the web server to send the content-length header

    // Renderer settings
    /*'renderer' => [
      'template_path' => __DIR__ . '/../templates/',
    ],*/
    'view' => [
      'path' => __DIR__ . '/../templates',
      'twig' => [
        'cache' => false
      ]
    ],
    // Monolog settings
    'logger' => [
      'name' => 'slim-app',
      'path' => __DIR__ . '/../logs/app.log',
      'level' => \Monolog\Logger::DEBUG,
    ],
  ],
  // sirve para conectarse con PDO
  'pdo'=>[
    'engine'=>'mysql',
    'host'=>'localhost',
    'database'=>'pueba',
    'username'=>'root',
    'password'=>'',
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'options'=>[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => true,
    ],
  ],
  // sirve para conectarse con Eloquent
  'db'=>[
    'driver'=>'mysql',
    'host'=>'localhost',
    'database'=>'pueba',
    'username'=>'root',
    'password'=>'',
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'prefix'=>'',
  ]
];
