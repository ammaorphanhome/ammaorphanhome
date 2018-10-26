var highlightMenuLink = function() {
    for (var i = 0; i < document.links.length; i++) {
        if(document.URL.endsWith("donate.php") || document.URL.endsWith("success.php")){
            document.getElementsByTagName("li")[0].removeAttribute("class");
        } else if (document.links[i].href == document.URL) {
            document.getElementsByTagName("li")[0].removeAttribute("class");
            document.links[i].parentNode.className = 'active';
        }
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