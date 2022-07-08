<?php
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/DB.php';
    include_once '../../models/User.php';

    $database = new DB();
    $db = $database->connect();

    $user = new User($db);

    $user->username = isset($_GET['username']) ? $_GET['username'] : die(json_encode([
        'res' => false,
        'msg' => 'username is required'
    ]));
    $user->password = isset($_GET['password']) ? $_GET['password'] : die(json_encode([
        'res' => false,
        'msg' => 'password is required'
    ]));

    $user->read_single();

    $user_arr = [
        'res' => true,
        'data' => [
            'fullname' => $user->fullname
        ]
    ];
    
    print_r(json_encode($user_arr));

    