<?php
class Time {
    public $hour;
    public $minute;
    public $second;
    public $day;
    public $daynum;
    public $month;
    public $monthnum;
    public $year;
    
    function __construct() {
        $this->hour = date('h');
        $this->minute = date('i');
        $this->second = date('s');
        $this->day = date('l');
        $this->daynum = date('j');
        $this->month = date('F');
        $this->monthnum = date('n');
        $this->year = date('Y');
    }
}
         