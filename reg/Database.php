<?php


class Database
{
    public $isConn;
    protected $database;

    public function __construct($host = 'localhost', $username = 'root', $password = '', $dbname = 'db', $option = [])
    {
        //проверка на подключения
        $this->isConn = TRUE;// мы подключились к базе данных

        try{
            $this->database = new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8", $username, $password, $option);// новое подключения
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// результат поключения ошибка
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            throw new Exception($e->getMessage());

        }
    }
    public function Disconnect()
    {
        $this->isConn = FALSE;
        $this->database = NULL;
    }

    /**
     * @param $query
     * @param array $params
     * @return mixed
     * @throws Exception
     * для получения одной записи с базы
     */
    public function getRow($query, $params = []){
        try {
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param $query
     * @param array $params
     * @return mixed
     * @throws Exception
     * для получения больше чем одной записи с базы
     */
    public function getRows($query, $params = []){
        try {
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param $query
     * @param array $params
     * @return bool
     * @throws Exception
     * для добовления новой записи в базу данных
     */
    public function insertRow($query, $params = [])
    {
        try{
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            return TRUE;
        }catch (PDOException $e){
            throw new Exception($e->getMessage());
        }

    }

    /**
     * @param $query
     * @param array $params
     * @throws Exception
     * для обновления базы
     */
    public function updateRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

    /**
     * @param $query
     * @param array $params
     * @throws Exception
     * для удаления
     */
    public function deleteRow($query, $params = [])
    {
        $this->insertRow($query,$params);
    }

}

?>
