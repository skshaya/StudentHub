<?php

class Database {

    public $host;           // Hostname / Server
    public $password;       // MySQL Password
    public $user;           // MySQL Username
    public $database;       // MySQL Database Name
    public $link;
    public $query;
    public $result;
    public $rows;
    public $debug;          // Whether to print debug (testing) info (default 0)
    private $logfile;       // Where to log errors (optional)
    public $persistentconn; // Whether to use persistent connections.
    public $lastinsertid;   // ID of last record inserted, if we ever did.

    public function __construct() {
        $this->host = "localhost";
        $this->password = "";
        $this->user = "root";
        $this->database = "studenthub";
        $this->rows = 0;
        $this->link = NULL;
        $this->debug = TRUE;
        $this->persistentconn = FALSE;
        $this->lastinsertid = -1;
    }

    public function __destruct() {
        // Destroy the MySQL connection on unset, even if we are using mysqli_pconnect().
        $this->CloseDB();
    }

    private function failureHandler($iError, $sQuery = "") {
        $sRet = "SQL Error: $iError";
        if ($sQuery != "") {
            $sRet .= "\n... Executing Query: $sQuery\n";
        }

        // Log to file, if set.
        if ($this->logfile) {
            error_log($sRet, 3, $this->logfile);
        }

        // Return full debug info if in debug mode.
        if ($this->debug) {
            return("<hr>" . $sRet);
        }
        return("<hr>Requested page has encountered an error, please try again later.");
    }

    public function SetSettings($strHost, $strUser, $strPass, $strDatabase) {
        // Sets the connection settings.
        $this->host = $strHost;
        $this->user = $strUser;
        $this->password = $strPass;
        $this->database = $strDatabase;
    }

    public function OpenLink() {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database)
                or die(print "class.database: Error connecting to database.\n" . $this->failureHandler(mysqli_error()));
        return($this->link);
    }

    public function CloseDB() {
       if($this->link) {
            if(mysqli_close($this->link)) {
                $this->link = NULL;
            } else {
                print("class.database: Unable to free 'link' resource - #" . $this->link);
                return(FALSE);
            }
        }
        return(TRUE);
    }

    public function Query($query) {
        // Reset our rows/result variables.
        $this->rows = 0;
        $this->result = NULL;

        // Establish connection to the database.
        $conn = $this->OpenLink();
        //$this->SelectDB();
        // Clean SQL to prevent attacks
        $query = stripslashes(mysqli_real_escape_string($conn, $query));

        // Execute query.
        $this->query = $query;
        $this->result = mysqli_query($conn, $query)
                or die(print "class.database: Error while executing Query." . $this->failureHandler(mysqli_error($conn), $this->query));

        // Count the number of rows returned, if a SELECT query was made.
        if (strpos($query, "SELECT") != FALSE && $conn) {
            $this->rows = mysqli_num_rows($this->result);
        }

        // Count the number of rows affected by an INSERT, UPDATE, REPLACE or DELETE query.
        if (((strpos($query, "INSERT") + strpos($query, "UPDATE") + strpos($query, "REPLACE") + strpos($query, "DELETE"))) !== FALSE) {
            //echo "Hello There";
            $this->rows = mysqli_affected_rows($conn);
        }

        if (strpos($query, "INSERT") != FALSE) {
            $this->lastinsertid = mysqli_insert_id($this->link);
        }
        
        $this->CloseDB();
        
    }
    
    public function mQuery($query) {
     // Reset our rows/result variables.
        $this->rows = 0;
        $this->result = NULL;

        // Establish connection to the database.
        $conn = $this->OpenLink();
        
        // Clean SQL to prevent attacks
        $query = stripslashes(mysqli_real_escape_string($conn, $query));

        // Execute query.
        $this->query = $query;
        mysqli_multi_query($conn, $query) or die(mysqli_error($conn));

        // Count the number of rows returned, if a SELECT query was made.
        if (strpos($query, "SELECT") != FALSE) {
            $this->rows = mysqli_num_rows($conn);
        }

        // Count the number of rows affected by an INSERT, UPDATE, REPLACE or DELETE query.
        if (((strpos($query, "INSERT") + strpos($query, "UPDATE") + strpos($query, "REPLACE") + strpos($query, "DELETE"))) !== FALSE) {
            $this->rows = mysqli_affected_rows($conn);
        }

        if (strpos($query, "INSERT") != FALSE) {
            $this->lastinsertid = mysqli_insert_id($this->link);
        }
        
        $this->CloseDB();
        
        return TRUE;
    }

}

?>
