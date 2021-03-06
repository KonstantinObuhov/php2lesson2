<?php

namespace App;

class Db
{
    /*Защищенное свойство указатель на бд
    доступ к нему есть только у методов внутри методов объекта
    */
    protected $dbh;
    /*Конструктор - функция, которая при создании объекта автоматически вызывается*/
    public function __construct()
    {
        $config = new Config();
        $dsn = 'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'];
        $user = $config->data['db']['user'];
        $password = $config->data['db']['password'];
        $this->dbh = new \PDO($dsn, $user, $password);
    }
    /*Метод query возвращает результаты запросов к бд или в прпостейшем случае ошибку при выполнении
    запроса
    */
    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false === $res) {
            die('DB error in ' . $sql);
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }
    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        return  (false === $res) ? $res : true;
    }

}