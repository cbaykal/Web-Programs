
var interval, // will keep track of the slideshow interval
    counter = -1, // keep track of which update we are currently displaying
    timeout, // will keep track of timeout
    TIMEOUT_TIMER = 15 * 1000; // after a user clicks a link, the slide show will start again after 15 seconds

$(function() {
    
		
	/* h3 tags will hold the questions, they are proceeded by paragraphs with the class answer, so hide them initally */
	$("h3").addClass("closed").next(".answer").hide(); // end addClass and hide
	
	/* add a toggle function to hide/show answers and hide/show background images for the questions */
	$("h3").toggle(function() {
		
		var $this = $(this); // store $(this) into $this in order to avoid having jQuery select the element two times. Good Programming practice
		$this.next(".answer").slideToggle(); // slide down the answer, making it visible
		$this.removeClass("closed").addClass("open"); // now that the answer is visible, the background image of the header should be a X
	},
	function() {
		
		var $this = $(this); // store $(this) into $this in order to avoid having jQuery select the element two times. Good Programming practice
		$this.next(".answer").slideToggle(); // slide up the answer, hiding it
		$this.removeClass("open").addClass("closed"); // now that the the answer is hidden, the background image of the header should be a +
	}); // end toggle
	
	
	// initialize the updates div
	initUpdatesDiv();
	
}); // end ready


function initUpdatesDiv() {
    
    // Begin Constants
    
    var SPACE_RIGHT = 10, // total amount of pixels from right of the div
        SLIDE_SHOW_TIMER = 8.5 * 1000;
    
    // End Constants
    
    var $updatesBox = $("#updatesBox"),
        $updatesListItems = $updatesBox.find("li"),
        $updatesLinks = $updatesListItems.find("a"),
        $updatesDivs = $updatesBox.find(".update");
        
   $updatesDivs.hide(); // initially hide all divs
    
   var linkWidth = $updatesListItems.outerWidth(true),     // get the width of a link
       boxWidth = $updatesBox.innerWidth(true),
       numUpdates = $updatesLinks.length, // number of updates
       positionRight = SPACE_RIGHT + linkWidth * (numUpdates - 1), // calculate the initial offset to position links
       positionBottom = 10;
   
   // absolutely position the ul containing all of the list items that reference to the updates divs
   $updatesListItems.parent().css({
       width: boxWidth,
       bottom: positionBottom,
       right: 0
   });
        
    // position the links accordingly  
    $updatesListItems.each(function() {
        $(this).css({
            bottom: positionBottom,
            right: positionRight
        }); // end css
        
        // increment the positionRight variable to space out the links
        positionRight -= linkWidth;
        
    }); // end each
    
    // if a link is clicked, show the corresponding div
    $updatesLinks.click(function(event, automated) {
        
        if(!automated) {
           // clear both the interval and timeout, then renew the timeout
           clearInterval(interval);
           clearTimeout(timeout);
           timeout = setTimeout(function() {
                     // since I am passing parameters to initSlideShow I need to call it in an anonymous function
                     initSlideShow($updatesListItems, numUpdates, SLIDE_SHOW_TIMER);
                     },
                     TIMEOUT_TIMER); // end setTimeout
             
        }
       
        var $this = $(this),
            update = $this.attr("href"),
            updateString = "#update",
            recorrectedUpdate = update.substr(update.indexOf(updateString) + updateString.length);
            
        counter = $updatesLinks.index($this); // update the counter
            
        // IMPORTANT: I'm going to switch the order of updates to ensure
        // that the most recent update is displayed as update1. See index.php for commentary     
        recorrectedUpdate = numUpdates - +recorrectedUpdate + 1; 
        update = updateString + recorrectedUpdate; // append the number

        $(".active").fadeOut("slow"); // fade out the current update
        
        $(update).fadeIn("slow").addClass("active").width(boxWidth); // fade in the selected update and add the active class
        
        displayTitle($(update), $(update).find("h3")); // will display the title letters one by one
        
        $(".selected").removeClass("selected"); // remove the selected class from the currently active link
        
        $this.addClass("selected"); // for link opacity
        
        return false; // to prevent the link from performing its default behavior
        
    });
   
   initSlideShow($updatesListItems, numUpdates, SLIDE_SHOW_TIMER); // start the slideshow

}

function displayTitle($update, $title) {
    
    // hide title
    $title.remove();
    
    var str = '<h3>',
        text = $title.text(),
        textLength = text.length,
        FADEIN_TIMER = 100;
    
    if(text.indexOf("<span>") == -1) { // so we don't recreate the string all the time
        
        for(var i = 0; i < textLength; i++) {
          str += "<span>" + text[i] + "</span>";
        }
    
        str += "</h3>";
        $update.prepend(str);
        
    }
    
    $update.find("h3").find("span").hide();
    
    $update.find("span").each(function(i) {
        $(this).delay(FADEIN_TIMER*i).fadeIn();
     }); // end each
    

}

function initSlideShow($listItems, numUpdates, SLIDE_SHOW_TIMER) {

    // initially click the first update if it's the first time initSlideShow is called
    if(counter == -1) { 
        $listItems.first().find("a").trigger("click", true);
       // counter = 1; // since we already clicked the first one it's set to 1
    }
    
    // initialize the slide show
    interval = setInterval(function() {
                if(counter < numUpdates - 1) {
                    // click on the next link if the counter is less than numUpdates using trigger so we know that it is automated
                    $listItems.find(".selected").parent().next().find("a").trigger("click", true);
                    
                } else {
                    // if not, we need to click on the first link
                    $listItems.first().find("a").trigger("click", true);
                }
                
               }, 
               SLIDE_SHOW_TIMER); // end setInterval
               
}





