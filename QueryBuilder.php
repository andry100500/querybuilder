<?php

require_once 'QueryBuilderInterface.php';

class QueryBuilder implements QueryBuilderInterface
{

    private $table;
    private $select = '*';
    private $where;
    private $order;
    private $limit;
    private $offset;


    public function select($columns): QueryBuilderInterface
    {
        $this->select = implode(',', $columns);
        return $this;
    }

    public function where($conditions): QueryBuilderInterface
    {
        if (is_string($conditions)){
            $this->where = $conditions;
        }

        if (is_array($conditions)){
            // будет время, допишу.
        }

        return $this;
    }

    public function table($table): QueryBuilderInterface
    {
        $this->table = $table;
        return $this;
    }

    public function limit($limit): QueryBuilderInterface
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset): QueryBuilderInterface
    {
        $this->offset = $offset;
        return $this;
    }

    public function order($order): QueryBuilderInterface
    {
        $sortsCount = count($order);
        $counter = 0;

        foreach ($order as $key => $value) {
            $counter += 1;
            $this->order = $this->order . $key . ' ' . $value;
            if ($sortsCount > $counter) $this->order .= ',';
        }


        return $this;
    }

    public function build(): string
    {
        $query = 'SELECT ' . $this->select . ' FROM ' . $this->table;
        if ($this->where) $query = $query . ' WHERE ' . $this->where;
        if ($this->order) $query = $query . ' ORDER BY ' . $this->order;
        if ($this->limit) $query = $query . ' LIMIT ' . $this->limit;
        if ($this->offset) $query = $query . ' OFFSET ' . $this->offset;
        return $query;
    }

    public function one(): ?array
    {

    }

    public function all(): ?array
    {

    }
}