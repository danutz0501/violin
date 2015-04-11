<?php

require '../vendor/autoload.php';

use Violin\Violin;

$v = new Violin;

$v->addFieldMessages([
    'username' => [
        'required'  => 'We need a username to sign you up.',
        'alpha'     => 'Your username can only contain letters.'
    ],
    'email' => [
        'email'     => 'That email doesn\'t look valid.'
    ]
]);

$v->validate([
    'username'  => ['cats4life', 'required|alpha|min(3)|max(20)'],
    'email'     => ['dale.codecourse.com', 'required|email'],
    'password'  => ['ilovecats', 'required'],
    'password_confirm' => ['ilovecats', 'required|matches(password)']
]);

if ($v->passes()) {
    // Passed
} else {
    var_dump($v->errors()->all());
}
