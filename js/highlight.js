var highlightMenuLink = function() {
    var linkFound = false;
    for (var i = 0; i < document.links.length; i++) {
        if(document.URL.endsWith("donate.php") || document.URL.endsWith("success.php")){
            // Don't do anything.
            linkFound = true;
        } else if (document.links[i].href == document.URL) {
            document.links[i].parentNode.className = 'active';
            linkFound = true;
        }
    }
    if(document.URL.indexOf("ammaorphanhome.org") >= 0 && !linkFound){
        document.getElementsByTagName("li")[0].className = 'active';
    }
}

document.addEventListener("DOMContentLoaded", function(){
    highlightMenuLink();
});
var callback = function(){
    highlightMenuLink();
};

if (document.readyState === "complete" ||
    (document.readyState !== "loading" && !document.documentElement.doScroll)) {
    callback();
} else {
    document.addEventListener("DOMContentLoaded", callback);
}