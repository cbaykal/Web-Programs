$(function() {
    
    // labels are bugging out and not automatically checking for some reason... using jQuery to reconcile
    $("#improvements label").click(function() {
        
        var $checkBox = $(this).prev("input[type='checkbox']");
        $checkBox.attr("checked") ? $checkBox.attr("checked", false) : $checkBox.attr("checked", true);
    }); // end click
}); // end ready
