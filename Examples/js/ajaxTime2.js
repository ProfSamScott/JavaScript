/*
 * Code for ajaxTime4.html
 * 
 * Sam Scott, December, 2016
 */
$(document).ready(function () { // BEST PRACTICE: Everything in the Ready function

    function launchAjax() { // event handler for button click
        var params = $("[name=userInput]").serialize();
        $("#result").load("https://csunix.mohawkcollege.ca/~scott/javascript/examples/servers/timeServer.php?" + params);
    }

    $("#ajaxButton").click(launchAjax); // adds the event handler
});

