/* List of Formatting Marks:
 * <span>content</span> - don't add a link to this
 * `content` - bold
 * ^content^ - code
 * |example file|
 */
// format images

$(window).load(function () {
    // function resizes the image based on its original size
    function resizeImage() {
        var newImg = new Image();
        var image = this;
        newImg.onload = function () {
            var width = newImg.width;
            if ($(image).hasClass("halfsize")) {
                if (width > $(image).parent().innerWidth() / 2)
                    $(image).css("width", $(image).parent().innerWidth() / 2);
                else
                    $(image).css("width", "auto");
            } else {
                if (width > $(image).parent().innerWidth())
                    $(image).css("width", $(image).parent().innerWidth());
                else
                    $(image).css("width", "auto");
            }
        };
        newImg.src = $(image).attr("src");
    }

    // function resizes 200ms after the last resize event
    var timer;
    $(window).resize(function () {
        window.clearTimeout(timer);
        timer = setTimeout(function () {
            $("img.halfsize,img.fullsize").each(resizeImage);
        }, 200);
    });

    // initial resize
    $("img.halfsize,img.fullsize").each(resizeImage);
});

// do everything else
$(document).ready(function () {
    // set up the cover while processing
    $("#cover").css("height", document.height * 2 + "px").css("display", "block");

    // counter stuff
    var reload = sessionStorage.length > 0;
    // end counter stuff

    // set up links
    var linkDone = [];
    for (var i = 0; i < links.length; i++)
        linkDone[i] = false;
    // DONE LINK SETUP

    // Generate headings and TOC and add formatting
    var container = $("#container");
    var nodes = container[0].childNodes;
    var level1 = -1;
    var level2 = 0;
    var level3 = 0;
    var jcSwitch = true;
    var toc = document.createElement("div");
    toc.id = "toc";
    var tocanchor = document.createElement("a");
    tocanchor.name = "Contents";
    toc.appendChild(tocanchor);
    var tochead = document.createElement("h1");
    tochead.innerHTML = "Contents";
    toc.appendChild(tochead);
    var printtoc = document.createElement("div");
    printtoc.id = "printtoc";
    printtoc.className = "pageBreak";
    tochead = document.createElement("h1");
    tochead.className = "nobookmark";
    tochead.innerHTML = "Contents";
    printtoc.appendChild(tochead);

    var tocAdded = false; // set to TRUE when we find first h1 element and add TOC
    var headingWaiting = undefined; // the last h1 waiting to be wrapped with its first paragraph
    for (var i = 0; i < nodes.length; i++) {
        if (nodes[i].tagName)
            switch (nodes[i].tagName) {
                case "H1":
                    // get ready to wrap this with the next p element
                    headingWaiting = nodes[i];
                    // reset the keywords
                    for (var j = 0; j < links.length; j++)
                        linkDone[j] = false;
                    // add TOC before first <h1> element
                    if (!tocAdded) {
                        //TODO - convert to jquery
                        container[0].insertBefore(toc, nodes[i]);
                        container[0].insertBefore(printtoc, toc);
                        tocAdded = true;
                        i++;
                        i++;
                    }
                    level1++;
                    level2 = 0;
                    level3 = 0;
                    i = addHeading(level1, level2, level3, nodes[i], i);
                    break;
                case "H2":
                    // reset the keywords
                    for (var j = 0; j < links.length; j++)
                        linkDone[j] = false;
                    headingWaiting = nodes[i];
                    level2++;
                    level3 = 0;
                    i = addHeading(level1, level2, level3, nodes[i], i);
                    break;
                case "H3":
                    headingWaiting = nodes[i];
                    level3++;
                    i = addHeading(level1, level2, level3, nodes[i], i);
                    break;
                case "DIV":
                case "P":
                case "OL":
                    // break-out box formatting
                    if (nodes[i].className.indexOf("JC") >= 0) {
                        var firstPeriod = nodes[i].innerHTML.indexOf('.');
                        if (firstPeriod > 0 && firstPeriod < 100) {
                            var bold = nodes[i].innerHTML.substring(0, firstPeriod + 1);
                            nodes[i].innerHTML = "<span class='bold'>" + bold + "</span>" + nodes[i].innerHTML.substring(bold.length);
                        }
                        nodes[i].innerHTML = "<p class='break'>" + nodes[i].innerHTML + "</p>";
                        if (jcSwitch)
                            nodes[i].style.float = "right";
                        jcSwitch = !jcSwitch;
                        var head = document.createElement("h4");
                        head.innerHTML = "Java Connection";
                        nodes[i].insertBefore(head, nodes[i].childNodes[0]);
                        var img = document.createElement("img");
                        img.className = "jcImage";
                        img.src = "images/coffee.png";
                        nodes[i].insertBefore(img, nodes[i].childNodes[0]);
                        nodes[i].insertBefore(document.createElement("br"), nodes[i].childNodes[2]);
                        var textContent = nodes[i].nextSibling.textContent.trim();
                        if (textContent === "") {
                            var nextNode = nodes[i].nextSibling.nextSibling;
                            if (!nextNode || !nextNode.tagName || nextNode.tagName.charAt(0) === "H" ||
                                    nextNode.tagName === "DIV" && nextNode.className !== "JC")
                                nodes[i].style.width = "auto";
                        }
                    } else if (nodes[i].className === "DIY") {
                        nodes[i].innerHTML = "<p class='break'>" + nodes[i].innerHTML + "</p>";
                        var head = document.createElement("h4");
                        head.innerHTML = "Do It Yourself";
                        nodes[i].insertBefore(head, nodes[i].childNodes[0]);
                        var img = document.createElement("img");
                        img.className = "diyImage";
                        img.src = "images/diy.png";
                        nodes[i].insertBefore(img, nodes[i].childNodes[0]);
                        nodes[i].insertBefore(document.createElement("br"), nodes[i].childNodes[2]);
                    } else if (nodes[i].className === "exercises") {
                        var levelString = level1 +
                                (level2 > 0 ? "." + level2 + (level3 > 0 ? "." + level3 : "") : "");
                        var anchor = document.createElement("a");
                        anchor.name = "e" + levelString;
                        container[0].insertBefore(anchor, nodes[i]);
                        i++; // because we added a node
                        nodes[i].innerHTML = "<h5>&LT;exercises section='" + levelString + "'&GT;</h5>" +
                                nodes[i].innerHTML + "<h5>&LT;/exercises&GT;</h5>";
                    }

                    // formatting marks within paras and boxes
                    if (nodes[i].tagName !== "DIV" || nodes[i].className === "JC" ||
                            nodes[i].className === "DIY" || nodes[i].className === "exercises"
                            || nodes[i].className === "table" || nodes[i].tagName === "OL") {
                        insertTags(nodes[i], "`", "<span class='bold'>", "</span>");
                        //insertTags(nodes[i], "`", "<span class='italic'>", "</span>");
                        insertTags(nodes[i], "^", "<code>", "</code>");
                        insertExampleLinks(nodes[i]);
                        if (nodes[i].tagName.charAt(0) !== "H" && nodes[i].className !== "table")
                            insertLinks(nodes[i], links, linkDone, level1 + "." + level2 + "." + level3);
                    }
                    // wrap up h1 and first element to prevent breaking across
                    // pages when printing.
                    if (headingWaiting) {
                        var newDiv = document.createElement("div");
                        newDiv.className = "sectionStart";
                        var anchor = headingWaiting.previousSibling;
                        if (anchor.name.charAt(anchor.name.length - 1) === ".")
                            newDiv.className = "sectionStart pageBreak";
                        else
                            newDiv.className = "sectionStart";
                        newDiv.appendChild(anchor.cloneNode(true));
                        newDiv.appendChild(headingWaiting.cloneNode(true));
                        newDiv.appendChild(nodes[i].cloneNode(true));
                        // TODO convert to jQuery
                        container[0].insertBefore(newDiv, anchor);
                        container[0].removeChild(headingWaiting);
                        container[0].removeChild(nodes[i]);
                        container[0].removeChild(anchor);
                        i--; // because child removed from nodes list
                    }
                    headingWaiting = undefined;
                    break;
            }
    }

    function insertTags(node, character, startTag, endTag) {
        var currentIndex = 0;
        do {
            var start = node.innerHTML.indexOf(character, currentIndex);
            if (start === -1)
                currentIndex = -1;
            else {
                currentIndex = start + 1;
                var end = node.innerHTML.indexOf(character, currentIndex);
                if (end === -1) {
                    alert("ERROR: saw unmatched '" + character + "': " + node.innerHTML + " at location " + currentIndex);
                    currentIndex = -1;
                } else {
                    currentIndex = insertTag(node, start, end, startTag, endTag, 1);
                }
            }
        } while (currentIndex !== -1);
    }

    function insertTag(node, start, end, startTag, endTag, inc) {
        nodes[i].innerHTML = node.innerHTML.substring(0, start) +
                startTag + node.innerHTML.substring(start + inc, end) +
                endTag + node.innerHTML.substring(end + inc);
        return (node.innerHTML.substring(0, start) +
                startTag + node.innerHTML.substring(start + inc, end) +
                endTag).length;
    }

    function insertExampleLinks(node) {
        var loc = $(location).attr('href');
        if (loc.charAt(location.length - 1) !== "/")
            loc = loc.substring(0, loc.lastIndexOf("/") + 1);
        var currentIndex = 0;
        do {
            var start = node.innerHTML.indexOf("|", currentIndex);
            if (start === -1)
                currentIndex = -1;
            else {
                currentIndex = start + 1;
                var end = node.innerHTML.indexOf("|", currentIndex);
                if (end === -1) {
                    currentIndex = -1;
                    alert("ERROR: saw unmatched '|': " + node.innerHTML);
                } else {
                    currentIndex = insertTag(node, start, end, "<a href='" +
                            loc + "examples/" +
                            node.innerHTML.substring(start + 1, end) +
                            "' target='examples' title='" +
                            node.innerHTML.substring(start + 1, end) + "'>", "</a>", 1);
                }
            }
        } while (currentIndex !== -1);
        var start = node.innerHTML.indexOf("example pack");
        if (start >= 0)
            currentIndex = insertTag(node, start, start + 12,
                    "<a href='" + loc + "JFMS_examples.zip' title='Download Example Pack'>", "</a>", 0);
    }

    function insertLinks(node, links, linkDone, level) {
        // var tempFirstDone = [];
        // for (var i = 0; i < linkDone.length; i++)
        //      tempFirstDone[i] = linkDone[i];
        for (var i = 0; i < links.length; i++) {
            if ((!links[i][2] || level.indexOf(links[i][2]) === 0) &&
                    (!linkDone[i] || node.tagName === "DIV")) {
                var start = 0, index, inserted;
                do {
                    index = node.innerHTML.toLowerCase().indexOf(links[i][0].toLowerCase(), start);
                    if (index >= 0) {
                        // automatic pluralization
                        var end = index + links[i][0].length;
                        if (node.innerHTML.charAt(end).toLowerCase() === "s")
                            end++;
                        else if (node.innerHTML.substring(end, end + 2).toLowerCase() === "es")
                            end += 2;
                        inserted = false;
                        // make sure we're not inside a larger word
                        if ((index === 0 ||
                                node.innerHTML.charAt(index - 1).match(/[a-zA-z]/) === null) &&
                                (node.innerHTML.charAt(end).match(/[ .,!?)"\n<]/) !== null)
                                ) {
                            // make sure we're not inside a tag
                            // var i1 = node.innerHTML.indexOf(">", index);
                            //   var i2 = node.innerHTML.indexOf("<", index);
                            //   if (i1 === -1 || i2 < i1 && i2 !== -1) {
                            // make sure we're not inside a link
                            var i1 = node.innerHTML.indexOf("</a>", index);
                            var i2 = node.innerHTML.indexOf("<a", index);
                            if (i1 === -1 || i2 < i1 && i2 !== -1) {
                                // or a heading
                                i1 = node.innerHTML.indexOf("</h", index);
                                i2 = node.innerHTML.indexOf("<h", index);
                                if (i1 === -1 || i2 < i1 && i2 !== -1) {
                                    // or a generic span tag
                                    i1 = node.innerHTML.indexOf("</span>", index);
                                    i2 = node.innerHTML.indexOf("<span>", index);
                                    if (i1 === -1 || i2 < i1 && i2 !== -1) {
                                        // or a code tag
                                        i1 = node.innerHTML.indexOf("</code>", index);
                                        i2 = node.innerHTML.indexOf("<code>", index);
                                        if (i1 === -1 || i2 < i1 && i2 !== -1) {
                                            if (node.tagName !== "DIV")
                                                linkDone[i] = true;
                                            var startTag = "<a href='" + links[i][1] + "' title='" + links[i][1] +
                                                    "' target='" + links[i][1].split("/")[2] + "'>";
                                            var endTag = "</a>";
                                            if (links[i][1].indexOf("wikipedia") === -1 &&
                                                    links[i][1].indexOf("w3schools") === -1 &&
                                                    links[i][1].indexOf("JFMS_examples.zip") === -1)
                                                endTag = "<span class='printonly'> [" + links[i][1] + "]</span>" + endTag;
                                            insertTag(node, index, end, startTag, endTag, 0);
                                            inserted = true;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //  }
                    start = index + 1;
                } while (index >= 0 && !inserted)
            }
        }
        return linkDone;
    }

    function addHeading(level1, level2, level3, node, i) {
        // create numbering
        var level = 1;
        var name = level1 + ".";
        if (level2 > 0) {
            level++;
            name += level2;
            if (level3 > 0) {
                level++;
                name += "." + level3;
            }
        }
        // add number to text
        node.id = "sec" + level1 + "-" + level2 + "-" + level3;
        var heading = name + " " + node.innerHTML;
        node.innerHTML = heading;
        var anchor = document.createElement("a");
        anchor.name = name;
        // TODO convert to jquery
        container[0].insertBefore(anchor, node);
        i++;
        // create printtoc entry
        if (level === 1) {
            var newTocEntryDiv = document.createElement("div");
            newTocEntryDiv.id = "ptoc" + level1 + "-" + level2 + "-" + level3;
            newTocEntryDiv.className = "toc ptoc";
            var newTocEntry = document.createElement("a");
            newTocEntry.href = "";
            newTocEntry.onclick = function () {
                $(window).scrollTop($("#" + node.id).offset().top);
                return false;
            };
            newTocEntry.innerHTML = heading;
            newTocEntry.className = "toc" + level;
            newTocEntryDiv.appendChild(newTocEntry);
            printtoc.appendChild(newTocEntryDiv);
        }
        // create toc entry
        var newTocEntryDiv = document.createElement("div");
        newTocEntryDiv.id = "toc" + level1 + "-" + level2 + "-" + level3;
        newTocEntryDiv.className = "toc";
        var newTocEntry = document.createElement("a");
        newTocEntry.href = "";
        newTocEntry.onclick = function () {
            $(window).scrollTop($("#" + node.id).offset().top);
            return false;
        };
        newTocEntry.innerHTML = heading;
        newTocEntry.className = "toc" + level;
        newTocEntry.title = "Jump To Section " + name;
        if (level === 1) {
            var newTocFolder = document.createElement("a");
            newTocFolder.href = "";
            newTocFolder.innerHTML = "<img src='images/collapsed.png' class=ftoc>";
            var tfname = "toc" + level1 + "-" + (level2 === 0 ? "" : level2 + "-" + (level3 === 0 ? "" : level3));
            newTocFolder.id = "f" + tfname;
            newTocFolder.onclick = function () {
                toSlide = $("div[id^='" + tfname + "'][id!='" + newTocEntryDiv.id + "']");
                var img = newTocFolder.childNodes[0];
                if (img.src.indexOf("collapsed.png") >= 0) {
                    toSlide.slideDown(200, positionNavbar);
                    img.src = "images/expanded.png";
                    if (sessionStorage)
                        sessionStorage[$(this).attr("id")] = "expanded";
                } else {
                    toSlide.slideUp(200, positionNavbar);
                    img.src = "images/collapsed.png";
                    if (sessionStorage)
                        sessionStorage[$(this).attr("id")] = "collapsed";
                }
                return false;
            };
            newTocFolder.hideFold = function () {
                toSlide = $("div[id^='" + tfname + "'][id!='" + newTocEntryDiv.id + "']");
                if (toSlide.length === 0) {
                    $(this).css("visibility", "hidden");
                }
            };
            newTocFolder.className = "tocfolder screenonly";
            newTocEntryDiv.appendChild(newTocFolder);
        } else
            newTocEntryDiv.style.display = "none";

        newTocEntryDiv.appendChild(newTocEntry);
        toc.appendChild(newTocEntryDiv);

        // return the counter incremented
        return i;
    }

    var folders = document.getElementsByClassName("tocfolder");
    for (var i = 0; i < folders.length; i++) {
        folders[i].hideFold();
        if (sessionStorage)
            if (sessionStorage[folders[i].id] === "expanded")
                folders[i].onclick();
            else
                sessionStorage[folders[i].id] = "collapsed";

    }

    // navbar stuff
    var timer;
    function positionNavbar() {
        clearTimeout(timer);
        var navbar = $("#navbar");
        var top = $(window).scrollTop();
        /*var bottom = top + $(window).innerHeight();*/
        navbar.css("opacity", "1")/*.css("top", bottom - 100 + "px")*/;
        if (container.offset().left + container.innerWidth() + navbar.innerWidth() + 50 > $(window).innerWidth())
            navbar.css("right", "10px");
        else
            navbar.css("right", $(window).innerWidth() - (container.offset().left + container.innerWidth() + navbar.innerWidth()) - 50 + "px");
        if (container.offset().left + container.innerWidth() > navbar.offset().left) {
            clearTimeout(timer);
            timer = setTimeout(function () {
                navbar.css("opacity", "0.2");
            }, 5000);
        }

        // find next heading down 
        var headings = $("h1:not(.nobookmark),h2:not(.nobookmark),h3:not(.nobookmark)");
        var nextLocation = $(window).scrollTop() + $(window).innerHeight() === $(document).height() ? 0 : $(document).height();
        var nextFull = $(window).scrollTop() + $(window).innerHeight() === $(document).height() ? "Top" : "Bottom";
        var nextDist = -1;
        var prevLocation = $(window).scrollTop() === 0 ? $(document).height() : 0;
        var prevFull = $(window).scrollTop() === 0 ? "Bottom" : "Top";
        var prevDist = -1;
        for (var i = 0; i < headings.length; i++) {
            var temp = headings[i].offsetTop - headings[i].offsetHeight - top;
            if (temp > 0 && (nextDist === -1 || temp < nextDist && nextDist >= 0)) {
                nextDist = temp;
                nextFull = headings[i].innerHTML;
                nextLocation = $(headings[i]).offset().top;
            }
            temp = top - headings[i].offsetTop;
            if (temp > 10 && (prevDist === -1 || temp < prevDist && prevDist >= 0)) {
                prevDist = temp;
                prevFull = headings[i].innerHTML;
                prevLocation = $(headings[i]).offset().top;
            }
        }
        if ($(window).scrollTop() + $(window).innerHeight() === $(document).height()) {
            nextLocation = 0;
            nextFull = "Top";
        }
        var topLinkFull = "Top";
        var topLinkLocation = 0;
        if ($(window).scrollTop() >= $("a[name=Contents]").offset().top + 10) {
            topLinkFull = "Contents";
            topLinkLocation = $("a[name=Contents]").offset().top;
        }
        navbar.html('<a class="toplink" href="' + prevFull + '" onclick="$(window).scrollTop(' + prevLocation + ');return false;"' +
                '" title="' + prevFull + '">&#8678;</a>' +
                '<a class="toplink" href="' + topLinkFull + '" onclick="$(window).scrollTop(' + topLinkLocation + ');return false;" title="' + topLinkFull + '">&#8679;</a>' +
                '<a class="toplink" href="' + nextFull + '" onclick="$(window).scrollTop(' + nextLocation + ');return false;"' +
                '" title="' + nextFull + '">&#8680;</a>');
    }

    // create navbar and bottom anchor
    var navbar = document.createElement("div");
    $(navbar).attr("id", "navbar");
    $(navbar).html(
            '<a class="toplink" href="" onclick="$(window).scrollTop($(document).height());return false;" title="Bottom">&#8678;</a>' +
            '<a class="toplink" href="" onclick = "$(window).scrollTop(0);return false;"title="top">&#8679;</a>' +
            '<a class="toplink" href="" onclick="$(window).scrollTop($("a[name=Contents]").offset().top)" title="Contents">&#8680;</a>'
            );
    $(navbar).mouseenter(function () {
        clearTimeout(timer);
        $(this).css("opacity", 1);
    });
    $(navbar).mouseleave(function () {
        if (container.offset().left + container.innerWidth() > navbar.offsetLeft) {
            clearTimeout(timer);
            timer = setTimeout(function () {
                $(navbar).css("opacity", "0.2");
            }, 5000);
        }
    });
    var body = $("body");
    body[0].appendChild(navbar);
    var bottomanchor = document.createElement("a");
    bottomanchor.name = "bottom";
    bottomanchor.id = "bottomanchor";
    body[0].appendChild(bottomanchor);

    // add navbar positioning
    $(document).scroll(positionNavbar);
    $(window).resize(positionNavbar);
    timer = setTimeout(positionNavbar, 500); // kludge deals with innerHeight() inconsistency
    // DONE NAVBAR STUFF


    // remove cover
    $("#cover").css("display", "none");

});