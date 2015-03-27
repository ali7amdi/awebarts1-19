<?php

/*
 * Display to get the requested data from the databse
 *
 * @author Ali7amdi
 */

class Display extends Awebarts {

    private $tablename;

    public function __construct($tablename) {

        $this->tablename = $tablename;

        $this->connectToDb();
        // isert the data into the table
        $this->getData();        
    }

    function getData() {
        
        $query = "SELECT * FROM `$this->tablename` ORDER BY `id` DESC LIMIT 1";

        if(!$sql = mysql_query($query))
        {
            throw new Exception("Error: Can not excute the query.");
        }
        else
        {
            $num = mysql_num_rows($sql); // 1            
            while ($num > 0)
            {
               $data = mysql_fetch_array($sql);
               $num--;
            }
        }        
        return $data;
    }

}

?>
