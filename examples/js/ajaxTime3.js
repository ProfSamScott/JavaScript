/*
 * Code for ajaxTime3.html
 * 
 * Sam Scott, April 2015
 * Converted to jQuery, December 2016
 */
$(document).ready(function () {
    function launchAjax() {
        $.get(
                "https://csunix.mohawkcollege.ca/~scott/javascript/examples/servers/timeServer_json.php",
                {timezone: $("input[name=timezone]").val(),
                    request: "x",
                    delay: $("input[name=delay]").val()
                },
                function (time) {
                    // JSON.parse(time) // This line would be necessary if headers not set correctly
                    $("#result").html(time.hour + ":" + time.minute + " " + time.day);
                }
        );
    }
    $("#ajaxButton").click(launchAjax);
});

