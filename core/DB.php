<?php
namespace Core;

use PDO;
//use App;
class DB
{
    protected $pdo;

    public function connect()
    {
        $dbconfig = App::config()['database'];

        try {
            $this->pdo = new PDO(
                "mysql:host={$dbconfig['host']};
                dbname={$dbconfig['dbname']}",
                $dbconfig['login'],
                $dbconfig['pass']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function fetchAll()
    {
        $sql = ("SELECT * FROM logs 
            ORDER BY datetime DESC LIMIT 50");
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Fetching data filtered by level
     * @param  string $level
     * @return PDO::FETCH_OBJ
     */
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

    public function fetchByHost($host)
    {
        $where_stmt = "AND host = '{$host}'" ?? '';
        $sql = ("SELECT * FROM logs
                            WHERE 1 
                            {$where_stmt}
                             ORDER BY datetime DESC 
                             LIMIT 50");
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    /**
     * fetch uniq values from $column
     * @param  string $column
     * @return array
     */
    public function distinct($column)
    {
        $sql = "SELECT DISTINCT({$column}) FROM logs ORDER BY $column;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
