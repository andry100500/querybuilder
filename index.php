<?php
require_once 'QueryBuilder.php';
require_once 'Db.php';

// выполнены первый и второй уровень

$db = new Db();

echo $db->newBuilder()->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->order(['id' => 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();