<?php
define('LOGIN_COOKIE_TIME',time() + 60);

class GameDefine{
const LOGIN_COOKIE_NAME = 'thisiscookie';
const LOGIN_COOKIE_DIR = '/';
const SESSION_NAME = 'thisissession';
const MYSQL_CONNECTION_DSN = 'mysql:dbname=test;host=localhost;charset=utf8mb4';
const MYSQL_HOST = 'localhost';
const MYSQL_READ_USER = 'root';
const MYSQL_SELECT_USER = 'root';
const MYSQL_READ_PASSWORD = '';
const MYSQL_WRITE_PASSWORD = '';
const DB_SERVER = 'http://10.21.0.124/';
const FRONT_SERVER_URL = 'http://note.typingtest.work';

public static $ary_Def = [
                    'read' => [
                        'dsn'  => self::MYSQL_CONNECTION_DSN,
                        'host' => self::MYSQL_HOST,
                        'user' => self::MYSQL_SELECT_USER,
                        'pass' => '',
                        'option' => [
                            PDO::ATTR_PERSISTENT => false,
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES => false,
                        ]
                    ],
                    'write' => [
                        'dsn'  => self::MYSQL_CONNECTION_DSN,
                        'host' => self::MYSQL_HOST,
                        'user' => self::MYSQL_SELECT_USER,
                        'pass' => '',
                        'option' => [
                            PDO::ATTR_PERSISTENT => false,
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES => false,
                        ]
                    ]
                ];
public static $dir = [
    '/typing'     => 'top.html',
    '/typing/game' => 'game.php'
];
}