<?php
    session_start();
    require_once ("teachers.php");
    require_once ("students.php");
    require_once ("groups.php");
    require_once ("faculty.php");

    class dbClass
    {
        private static $host;
        private static $db;
        private static $charset;
        private static $user;
        private static $pass;
        private static $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        private static $connection;
        private static $obj;

    private function __construct(string $host= "localhost", string $db = "college_management_system",
    string $charset = "utf8", string $user = "root", string $pass = "")
    {
        self::$host = $host;
        self::$db = $db;
        self::$charset = $charset;
        self::$user = $user;
        self::$pass = $pass;
    }

    /**
     * General Settings to connect and disconnect to DB
     */
    private function connect()
    {
        $dns = "mysql:host=".self::$host.";dbname=".self::$db.";charset=".self::$charset;
        self::$connection = new PDO($dns, self::$user, self::$pass, self::$opt);
    }
    public static function GetInstance():dbClass
    {
        if (self::$obj == null)
        self::$obj=new dbClass ();
        return self::$obj;
    }
    public function disconnect()
    {
        self::$connection = null;
    }

    public function getDetails($className, $query)
    {
        /**getDetails()-function returns the data from specific table in DB
         * @param: $className - name of class and table to display 
         * @param: $query - SQL query 
         * @return:$count - returns array of object.
         */
        self::connect();
        $Array=[];
        $result = self::$connection->query($query);
        //Array of objects
        if($result){
            while($row = $result->fetchObject($className)) {
            $Array[] = $row;
            }
    }
        self::disconnect();
        return $Array;
    }

    public function getCount($className, $query)
    {
        /**getCount()-function returns the number of rows that matches a specified criterion
         * @param: $className - name of class and table that need to count 
         * @param: $query - SQL query 
         * @return:$count - returns number of rows.
         */
        self::connect();
        $result = self::$connection->query($query);
        $count=$result->fetch(PDO::FETCH_ASSOC);
        return $count['count'];
        self::disconnect();
    }

    public function addDetails($statement="", $parameters=[])
    {
         /**addDetails()-function to insert a new record to DB
         * @param: $statement - SQL Query
         * @param: $parameters - SQL parametres to insert
         * @return:$stmt - affected row.
         * If exception happens, PHP codes 'try .. catch' will dispatch errors to show why a connection attempt fail.
         */
        self::connect();
        try{	
            $stmt = self::$connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;  
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }	
        
        self::disconnect();
    }

    public function deleteDetails(String $tableName,int $idToDelete,String $idName)
    {
         /**deleteDetails()-function to delete record by in DB
         * @param: $tableName - table name where delete the record 
         * @param: $idToDelete - id number of record
         * @param: $idName - id name
         * @return: $result - affected row
         * If exception happens, PHP codes 'try .. catch' will dispatch errors to show why a connection attempt fail.
         */
        self::connect();
        $result=self::$connection->exec("DELETE FROM $tableName WHERE $idName = $idToDelete;");   
        return $result;
        self::disconnect();
    }

    public function updateDetail($statement="", $parameters=[])
    {
         /**updateDetails()-function to update record in DB
         * @param: $statement - SQL Query
         * @param: $parameters - SQL parametres to insert
         * @return:$stmt - affected row.
         * If exception happens, PHP codes 'try .. catch' will dispatch errors to show why a connection attempt fail.
         */
        self::connect();
        try{	
            $stmt = self::$connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;  
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }	
        
        self::disconnect();
    }


    }

?>