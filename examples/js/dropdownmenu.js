/* 
 * Drop down menu examples.
 * 
 * Sam Scott, 2017
 */


/**
 * Show/hide one of the main menus
 * 
 * @param {string} menuName the name of the menu
 * @returns {undefined}
 */
function toggleNavItem(menuName) {
    // get the menu and button clicked
    var menu = document.getElementById(menuName + "Menu");
    var button = document.getElementById(menuName);

    // check if the menu is currently visible
    var visible = menu.style.visibility === "visible";

    // get and deselect all buttons and menus
    var oldButton = document.querySelector(".menuItemHover");
    if (oldButton !== null)
        oldButton.className = "menuItem";
    var menus = document.querySelectorAll(".bigMenu");
    for (var i = 0; i < menus.length; i++)
        menus[i].style.visibility = "hidden";

    // reselect clicked menu if necessary
    if (!visible) {
        menu.style.visibility = "visible";
        button.className = "menuItemHover";
    }
}

/** 
 * event handler for mouseover of rabbit image 
 * @param {Number} rabbitNum identifies which rabbit
 */
function nervousRabbit(rabbitNum) {
    twitch(rabbitNum, 20);
}

/**
 * Uses a timer to make a rabbit seem to shiver.
 * 
 * @param {Number} rabbitNum identifies which rabbit
 * @param {Number} countDown used to top the shivering when it reaches 0
 * @returns {undefined}
 */
function twitch(rabbitNum, countDown) {
    var rabbit = document.getElementById("rabbit" + rabbitNum);
    if (countDown == 0)
        rabbit.style["left"] = "0px";
    else {
        if (countDown % 2 == 0)
            rabbit.style["left"] = "-1px";
        else
            rabbit.style["left"] = "1px";
        setTimeout("twitch(" + rabbitNum + "," + (countDown - 1) + ")", 50);
    }
}
/**
 * Initializes the catch the rabbit game. Should be called whenever
 * the game drop-down is activated.
 * @returns {undefined}
 */
function initGame() {
    counter = 0;
    document.getElementById("noeggs").style["color"] = "darkslategray";
    document.getElementById("yousuck").style["color"] = "darkslategray";
}