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


    private function replaceChar($searchedChar, $replacedChar, $stringInWhatReplaced){
        $position = strpos($stringInWhatReplaced, $searchedChar);
        if ($position!==false){
            return substr_replace($stringInWhatReplaced,$replacedChar,$position,strlen($searchedChar));
        }
        else{
            return $stringInWhatReplaced;
        }
    }


    public function exc($query, $arguments){
        $result = $query;

        $count = count_chars($query, 1)[58];
        if($count>count($arguments)){
            return "Not enought arguments";
        }


        if ($this->is_assoc($arguments)){
            foreach ($arguments as $key => $argument){
                $result = str_replace(":$key", "$argument", "$query");
            }
        }
        else {
            foreach ($arguments as $argument){
                $result = $this->replaceChar("?", "$argument", "$query");
            }
        }
        return $result;
    }


    public function query($query, $arguments, $debug=0){
        try{
            $sth = $this->link->prepare($query);
        } catch(PDOException $e){
            echo '<br>Ошибка выполнения запроса: '.$e->getMessage();
        }

        if ($debug===1){
            echo $this->exc($query,$arguments);
        }

        $sth->execute($arguments);
        return $sth;
    }
}

