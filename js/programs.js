$(function() {
    
    var $tabLinks = $("#programsTab #tabLinks a");
    // hide all panels initially
    $(".panel").hide();
    
    $tabLinks.click(function() {
        var $this = $(this);
        
        $(".selected").removeClass("selected"); // remove the tab link with the selected option
        
        $this.addClass("selected").blur(); 
        
        // ####### TEMPORARY UNTIL I GET THE SOURCE CODE #######
        $($this.attr("href")).find("p").text("Code for " + $this.text() + " coming soon. Stay tuned.");
        
        $(".panel").hide(); // fadeOut the visible panel
        
        $($this.attr("href")).show(); // fadeIn the panel
        
        return false; // so we don't actually follow the link
    }); // end click
    
    $tabLinks.first().click(); // click the first tab on page load
    
}); // end ready
