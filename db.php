
<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "movie_booking";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->conn) {
            die("❌ Database Connection Failed: " . mysqli_connect_error());
        }
    }

    // Generic method to execute SELECT queries
    public function select($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("❌ Query Error: " . mysqli_error($this->conn));
        }
        return $result;
    }

    // For INSERT, UPDATE, DELETE
    public function execute($sql) {
        if (!mysqli_query($this->conn, $sql)) {
            die("❌ Query Error: " . mysqli_error($this->conn));
        }
        return true;
    }
}

// Create Object
$database = new Database();
$conn = $database->conn; // Normal mysqli connection
?>

