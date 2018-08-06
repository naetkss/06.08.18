<?php

ini_set('display_errors', 1);

include 'Models/User.php';
include 'Models/Article.php';

$user = new User('user name');

$articleFirst = $user->createArticle([
    'title' => 'test title',
    'body' => 'test description'
]);

$articleSecond = $user->createArticle([
    'title' => 'article second title',
    'body' => 'article second description'
]);

$userSecond = new User('user second name');

$articleSecond->setAuthor($userSecond);

