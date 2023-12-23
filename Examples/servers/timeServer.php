<?php
/*
 * A simple server for testing AJAX queries. The "delay" parameter can be
 * used to simulate a slow connection.
 * 
 * Load this page with no parameters to view the API.
 *
 * Sam Scott, June 2012
 */
header("Access-Control-Allow-Origin: *"); // allows AJAX requests from anywhere

if (isset($_REQUEST["delay"]))
    sleep($_REQUEST["delay"]);
if (isset($_REQUEST["timezone"]))
    date_default_timezone_set($_REQUEST["timezone"]);
if (isset($_REQUEST["request"])) {
    header("Content-Type: text/plain"); 
    switch ($_REQUEST["request"]) {
        case "time":
            echo date('h:i:s');
            break;
        case "date":
            echo date('j/n/y');
            break;
        case "day":
            echo date('l');
            break;
        case "month":
            echo date('F');
            break;
        case "year":
            echo date('Y');
            break;
        default:
            echo 'ERROR: bad value for "request" parameter';
            break;
    }
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
            <h1>Time Server API</h1>
            <p>A test bed for AJAX queries. </p>
            <p>Created June 2012 by Sam Scott for
                SYST 35288 (Mobile Web-Based Application Development) at Sheridan College (Ontario).</p>
            <h2>HTTP Request Parameters</h2>
            <table>
                <tr>
                    <td><b>request:</b></td>
                    <td>can be "time", "date", "year", "month", or "day"</td>
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
            <p>All parameters are optional and can be GET or POST parameters.</p>
            <p>Loading with no parameters displays this instruction page.</p>
        </body>
    </html>
<?php
}
?>
