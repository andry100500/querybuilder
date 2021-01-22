<?php

require_once 'QueryBuilder.php';


class Db
{
    public function newBuilder()
    {
        return new QueryBuilder();
    }

    public function query($query)
    {
        echo $query;
    }
}