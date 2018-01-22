








/*
 We are using the following attributes on anchors in order to collapse the responsive menu when an item is clicked:
    
        data-toggle="collapse"
        data-target=".in"

*/
$(document).ready(function () {
    $("nav").find("li").on("click", "a", function () {
        $('.navbar-collapse.in').collapse('hide');
    });
});