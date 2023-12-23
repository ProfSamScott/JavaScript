<?php
/*
 * A simple server for testing AJAX queries with JSON. The "delay" parameter 
 * can be used to simulate a slow connection.
 * 
 * Load this page with no parameters to view the API.
 *
 * Sam Scott, April 2015
 */
include "time.php";
header("Access-Control-Allow-Origin: *"); // allows AJAX requests from anywhere

if (isset($_REQUEST["delay"]))
    sleep($_REQUEST["delay"]);
if (isset($_REQUEST["timezone"]))
    date_default_timezone_set($_REQUEST["timezone"]);
if (isset($_REQUEST["request"])) {
    header("Content-Type: application/json"); 
    $t = new Time();
    echo json_encode($t);
} else {
    ?>
    <html>
        <head>
            <title>Time Server API</title>
            <style type="text/css">
                td {
                    vertical-align:top;
                }
            </style>
        </head>
        <body>
            <h1>JSON Time Server API</h1>
            <p>A test bed for AJAX queries using JSON. </p>
            <p>Created April 2015 by Sam Scott for
                INFO 16206 (Scripting and Web Languages) at Sheridan College (Ontario).</p>
            <h2>HTTP Request Parameters</h2>
            <table>
                <tr>
                    <td><b>request:</b></td>
                    <td>must be present to receive a JSON datetime</td>
                </tr>
                <tr>
                    <td><b>timezone:</b></td>
                    <td>any valid php timezone (e.g. "Canada/Mountain" or "Canada/Eastern")</td>
                </tr>
                <tr>
                    <td><b>delay:</b></td>
                    <td>number of seconds to delay request (defaults to 0)</td>
                </tr>
            </table>
            
            <h2>Other Information</h2>
            <p>All parameters can be either GET or POST.</p>
            <p>Loading with no parameters displays this instruction page.</p>
        </body>
    </html>
<?php
}
?>
