$(function() {
    
    var $submenus = $("#mainNav .submenu");
    
    $submenus.hide(); // hide all submenus
    
    $submenus.parent().find("a").mouseover(function() { // show them accordingly
        $(this).next(".submenu").show();
    }); // end mouesover
    
    // if the user mouses over anywhere in the document except the submenu, close the submenu
    $(document).mouseover(function() {
        $submenus.hide();
    }); // end mouseover
    
    // prevent the submenu from closing the the mouseover is inside the submenu
    
    $submenus.parent().mouseover(function(e) {
       if($(this).is(":visible")) { // only hide the submenu if it was visible to begin with
            e.stopPropagation();
       }
    }); // end mouseover
    
}); // end ready
