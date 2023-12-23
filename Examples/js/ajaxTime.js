/*
 * Code for ajaxTime.html
 * 
 * Sam Scott, June 2013
 */
$(document).ready(function () { // BEST PRACTICE: Everything in the Ready function

    /**
     * Function to send the ajax request
     * @returns {undefined}
     */
    var launchAjax = function () { // event handler for button click
        $.get(
                "https://csunix.mohawkcollege.ca/~scott/javascript/examples/servers/timeServer.php",
                {
                    timezone: $("[name=timezone]").val(),
                    request: $("[name=type]").val(),
                    delay: $("[name=delay]").val()
                },
                function (data) {
                    $("#result").html(data);
                }
        );
    };

    $("#ajaxButton").click(launchAjax); // adds the event handler
});

