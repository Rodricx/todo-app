<?php 
namespace Database;

use Dotenv\Dotenv;
use Helpers\DD;
use mysqli;

abstract class DataBase extends mysqli
{
    protected $host;
    protected $user;
    protected $password;
    protected $database;
    protected $port;
    protected $credentials;
    public $conn;

    public function __construct()
    {
        $dotenv = Dotenv::createUnsafeImmutable("../")->load();
        // $dotenv->load();
        $this->host      = getenv('DB_HOST');
        $this->user      = getenv('DB_USER');
        $this->password  = getenv('DB_PASS');
        $this->database  = getenv('DB_NAME');
        $this->port      = getenv('DB_PORT');
        $this->credentials = (object)['host' => $this->host, 'user' => $this->user, 'password' => $this->password, 'database' => $this->database, 'port' => $this->port];
    }
        /* $this->host = "dbMysql";
        $this->user = "root";
        $this->password = "root";
        $this->database = "toDoDatabase";
        $this->port = 3306;
        $this->credentials = (object)['host' => $this->host, 'user' => $this->user, 'password' => $this->password, 'database' => $this->database, 'port' => $this->port];
     }*/

    protected function connection()
    {
        // DD::dd($this->credentials);
        $this->conn = new mysqli($this->credentials->host, $this->credentials->user, $this->credentials->password, $this->credentials->database);
        $this->conn->set_charset("utf8mb4");

        if(!$this->conn){
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>