<?php

$local = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=gektor',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];

$production = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=tdgektor_db',
    'username' => 'tdgektor_admin',
    'password' => 'psIT41K5',
    'charset' => 'utf8',
];

return $production;