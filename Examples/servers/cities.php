<?php

/*
 * A server to return a json-encoded list of cities in a given population range.
 * Sam Scott, Mohawk College, 2017
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include "connect.php";

class City {

    public $name;
    public $population;
    public $country;

    function __construct($name, $population, $country) {
        $this->name = $name;
        $this->population = $population;
        $this->country = $country;
    }

    function outputRow() {
        return "<tr><td>$this->name</td><td>$this->country</td><td>$this->population</td></tr>";
    }

}

if (isset($_GET["min"]) && isset($_GET["max"])) {
    $min = $_GET["min"];
    $max = $_GET["max"];
    $command = "SELECT Name, CountryCode, Population FROM City WHERE Population>=? AND Population<=? ORDER BY Population";
    $stmt = $dbh->prepare($command);
    $stmt->execute(array($min, $max));
    $cities = [];
    while ($row = $stmt->fetch()) {
        array_push($cities, new City(utf8_encode($row["Name"]), utf8_encode($row["Population"]), utf8_encode($row["CountryCode"])));
    }
} else {
    $cities = Array();
}
echo json_encode($cities);
