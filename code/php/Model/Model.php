<?php


abstract class Model 
{
    public $sql;
    // protected $resultArray;
    protected $resultSet;
    // protected $resultRecord;

    public function __construct()
    {
        @parent::__construct(DBHOST,DBUSER,DBPASSWORD,DBNAME);
        $this->throwIfDBError();
        $this->autorun();
    }

    protected function autorun()
    {

    }

    public function setResultSet($mysqliResult)
    {
        $this->resultSet = $mysqliResult;
    }

    public function getResultSet()
    {
        return $this->resultSet;
    }

    public function updateResultSet()
    {
        $result = $this->query($this->sql);
        $this->throwIfDBError();
        $this->setResultSet($result);
    }

    private function throwIfDBError()
    {

        If ($this->connect_error) {
            throw new Exception($this->connect_error);
        }
        if ($this->error) {
            throw new Exception($this->error);
        }

    }
}