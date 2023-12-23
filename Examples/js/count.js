/* 
 * Script for the functions5.html example
 * Sam Scott, January 2015
 */

/**
 * The current count
 * @type Number
 */
var current = 0;

/**
 * Adds an increment to the global variable "current"
 * 
 * @param {Number} inc the counting increment
 * @returns {undefined}
 */
function count(inc) {
    var newVal = current + inc;
    current = newVal;
    var node = document.getElementById("counter");
    node.innerHTML = "" + current;
}



