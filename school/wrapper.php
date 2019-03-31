<?php
class Wrapper{
    private $username;
    private $password;
    private $dbname;
    private $link;
    private $host;
    private $charset;


    public function __construct($host, $dbname, $password, $username, $charset){
        $this->link = $this->connect($host,$dbname,$password,$username, $charset);
        $this->dbname = $dbname;
        $this->host = $host;
        $this->password = $password;
        $this->username = $username;
        $this->charset = $charset;
    }

    private   function connect($host, $dbname, $password, $username, $charset)
    {
        try {
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $dsn = "mysql:host=".$host.";dbname=".$dbname.";charset=".$charset;
            $pdo = new PDO($dsn, $username,$password, $opt);
            return $pdo;
        }
        catch (PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }

    function __destruct()
    {
        $dbh = null;
    }

    public function is_assoc($arr)
    {
        if(!is_array($arr)) {
            trigger_error("Argument should be an array for is_assoc", E_USER_WARNING);
            return FALSE;
        }
        return count(array_filter(array_keys($arr), 'is_string')) > 0;
    }

    public function exc($query, $arguments){
        $result = $query;

        if ($this->is_assoc($arguments)){
            foreach ($arguments as $keyword => $argument){
                $result = str_replace(":$keyword", "$argument", "$query");
            }
        }
        else {
            foreach ($arguments as  $argument){
                $result = str_replace("?", "$argument", "$query");
            }
        }
        return $result;
    }


    public function prepared($query, $arguments, $debug=0){
        try{
            $sth = $this->link->prepare($query);
        } catch(PDOException $e){
            echo "Error query: ".$e->getMessage();
        }

        if ($debug===1){
            echo $this->exc($query,$arguments);
        }

        $sth->execute($arguments);
        return $sth;
    }
}

