<?php
class MY_Pagination extends CI_Pagination {

    public function __construct() {
        parent::__construct();
    }

    public function current_place() {
        return 'Page '.$this->cur_page.' of '.ceil(($this->total_rows/$this->per_page)). '';
    }
}
?>