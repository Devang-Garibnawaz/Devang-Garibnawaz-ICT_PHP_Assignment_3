<?php 
class connect{
        public $con;
        public function connectdb()
        {
            $this->con = mysqli_connect("localhost","root","root");
            mysqli_select_db($this->con,"ict_shopping");
        }
        public function CRUD($qry)
        {
            $res = mysqli_query($this->con,$qry);
            return $res;
        }
        public function fetchAssoc($sql)
        {
            return mysqli_fetch_assoc($sql);
        }
        public function num_rows($sql)
        {
            return mysqli_num_rows($sql);
        }
}
?>