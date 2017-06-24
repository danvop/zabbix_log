<?php
namespace Core;

use PDO;

class DB
{
    protected $user = 'syslogro';
    protected $pass = 'syslogro';
    
    protected $pdo;

    public function connect()
    {
        try {
            $this->pdo = new PDO('mysql:host=10.4.32.53;dbname=syslog', $this->user, $this->pass);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function fetchAll()
    {
        $sql = ("SELECT * FROM logs ORDER BY datetime DESC LIMIT 50");
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetchByLevel($level)
    {
        $where_stmt = "AND level = '{$level}'" ?? '';
        $sql = ("SELECT * FROM logs
                            WHERE 1 
                            {$where_stmt}
                             ORDER BY datetime DESC 
                             LIMIT 50");
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
