
history.navigationMode = "compatible"; // so that the document.ready function is called when the back button is used

/* Begin document ready */
$(function() {
    
    // Necessary Constants
    var THUMBNAILS_DISPLAYED = 4, // number of thumbnails that will be displayed at a given time
        HOVER_TOP_ADJUST = -10,
        HOVER_LEFT_ADJUST = 5,
        BG_ANIMATION_SPEED = 400,
        SLIDE_SHOW_SPEED = 3500;
    
    var images = [],  // array to hold the preloaded images
        currImg = 0,
        interval,
        thumbnailInd = 0,
        $thumbnails = $("#thumbnails"),
        $links = $("#thumbnails").find("a"), // since we'll be selecting it quite often
        $listItems = $("#thumbnails").find("li"),
        numPics = $listItems.length, // number of pictures
        $leftArrow = $("img#arrowLeft"),
        $rightArrow = $("img#arrowRight"),
        $imgArrowRight = $("img#imgArrowRight"),
        $imgArrowLeft = $("img#imgArrowLeft"),
        initLeftPos = parseInt($("img#arrowLeft").outerWidth(true), 10),
        imgWidth = 206, // width of padding, border, and margin
        range = imgWidth * (numPics - THUMBNAILS_DISPLAYED); // needed to scroll back to the beginning/end
     
     
    // All images should reference the larger images, rather than doing it manually
    // I am doing it programatically here
    $links.each(function() {
        
        var $this = $(this),
            largeImg = $this.find("img").attr("src").replace("_tb.png", "_large.png");
            
        $this.attr("href", largeImg);
    });
    
    // pre-load all of the images
    $links.each(function() {
        
        var image = new Image(); // create a new image object that will store the image src
        image.src = $(this).attr("href"); // get the source
        images.push(image); // add to array
    });
    
    // Re-adjust the position of the thumbnail slightly on hover
    $listItems.hover(function() {
        $(this).css({
            top: "+=" + HOVER_TOP_ADJUST,
            left: "+=" + HOVER_LEFT_ADJUST
        }); // end css
    },
    function() {
        $(this).css({
            top: "-=" + HOVER_TOP_ADJUST,
            left: "-=" + HOVER_LEFT_ADJUST
        }); // end css

    }); // end hover
    
    // initialize the position of all of the thumbnail images
    $listItems.each(function() {
        var $this = $(this);
        
        $this.css({
            left: initLeftPos,
            top: 20
        }) // end css
        
        initLeftPos += imgWidth;
    }); // end each

    // on click, show the bigger image
    $links.click(function(event, automated) {
        
        if(!automated) {
            clearInterval(interval); // stop the slideshow
        }
        
        var $bigImg = $("#bigImageWrapper"), // find the big image container
            $this = $(this),
            href = "/~baykal/screenshots/" + $this.attr("href");
            
            $this.blur(); // lose focus intentionally so we don't have the "fuzzy" blue border around the thumbnail
            
            $(".active").removeClass("active");
            $this.parent().addClass("active");

        for(var i = 0; i < images.length; i++) { // loop through the pre-loaded images
            if(images[i].src.indexOf(href) != -1) { // if we found a match, load the preloaded image
                
                $bigImg.find("img.mainImg").fadeOut(200).remove(); // find the current image, fade it out, then remove it
                $bigImg.append("<img class='mainImg' src='" + href + "' alt='" + 
                                $this.find("img").attr("alt") + "'>"); // add the new image
                $bigImg.find("img.mainImg").css("opacity", "0").animate({
                    "opacity" : 1
                }, 1500); // end animate
                
                currImg = i; // update current image index
            }
        }
        
        return false; // to prevent default behavior
    }); // end click
    
    // Code to position all of the images
        
    /* Begin Slideshow Code */
   
    interval = setInterval(function() {
                       $imgArrowRight.trigger('click', true);
                       }, SLIDE_SHOW_SPEED);
   
   /* End Slideshow Code */
    
    /* Begin thumbnail arrow code */
    
    $rightArrow.click(function(event, automated) { // if the left arrow is clicked, subtract the image width from each of the positions
        
        if(!automated) {
            clearInterval(interval); // stop the slideshow
        }
        
        // if there are no more thumbnails left to show, scroll back to the beginning
       if(thumbnailInd == numPics - THUMBNAILS_DISPLAYED) { 

            $listItems.animate({ // restore original positions
                left: "+=" + range
            }, BG_ANIMATION_SPEED*2); // end animate
            thumbnailInd = 0;
            // change the background position for a cool effect
            $thumbnails.animate({
                backgroundPosition: "+=3520px"
            }, BG_ANIMATION_SPEED*2); // end animate
            
        } else {
            $listItems.animate({
                left: "-=" + imgWidth
            }, BG_ANIMATION_SPEED); // end animate
            thumbnailInd++;
            // change the background position for a cool effect
            $thumbnails.animate({
                backgroundPosition: "+=880px"
            }, BG_ANIMATION_SPEED); // end animate
        }
        

    }); // end click
    
    $leftArrow.click(function() { // if the left arrow is clicked, add the image width from each of the positions
        
        clearInterval(interval); // stop the slideshow
        
        // if there are no more thumbnails left to show, scroll forward
        if(thumbnailInd == 0) {
            
            $listItems.animate({
                left: "-=" + range
            }, BG_ANIMATION_SPEED*2); // end animate
            thumbnailInd = numPics - THUMBNAILS_DISPLAYED;
            // change the background position for a cool effect
            $thumbnails.animate({
                backgroundPosition: "-=3520px"
            }, BG_ANIMATION_SPEED*2); // end animate
            
        } else {
            $listItems.animate({
                 left: "+=" + imgWidth
             }, BG_ANIMATION_SPEED); // end animate
            thumbnailInd--;
            // change the background position for a cool effect
            $thumbnails.animate({
                backgroundPosition: "-=880px"
            }, BG_ANIMATION_SPEED); // end animate
        }
        
    }); // end click
    
    
    /* End thumbnail arrow code */
   
   /* Begin big image wrapper arrow code */
  
   // if the user clicks the right arrow or the picture, simulate a click on the next image in the thumbnails
   $imgArrowRight.click(function(event, automated) {
       
        if(!automated) {
            clearInterval(interval); // stop the slideshow
        }

       var currImgHref = $("#bigImageWrapper img.mainImg").attr("src"),
           currImgHref = currImgHref.substr(currImgHref.indexOf("images_screenshot"));
           $nextImg = $listItems.find("a[href*='" + currImgHref + "']").parent().next();
        
        // if there is a next image, then click on the link, if not, click on the first link
        $nextImg.length ? $nextImg.find("a").trigger('click', automated): $links.first().trigger('click', automated);

        if(currImg == 0 || (currImg >= thumbnailInd + THUMBNAILS_DISPLAYED)) {
            $rightArrow.trigger('click', automated); // move the thumbnail pictures to the right
        }

   }); // end click
   
   // We also want the user to be able to simply click on the image to go to the next image, however,
   // we need to use delegate since we dynamically add the main image
   $("#bigImageWrapper").delegate("img.mainImg", "click", function() {
       
       $imgArrowRight.click(); // simulate a click on the right image arrow
       
   }); // end delegate
    
   $imgArrowLeft.click(function() {
      clearInterval(interval); // stop the slideshow
      
      var currImgHref = $("#bigImageWrapper img.mainImg").attr("src"),
          currImgHref = currImgHref.substr(currImgHref.indexOf("images_screenshot")),
          $prevImg = $listItems.find("a[href*='" + currImgHref + "']").parent().prev(); // find the previous img
    
      // if there is a previous image, then click on the link, if not, click on the last link
      $prevImg.length ? $prevImg.find("a").click() : $links.last().click();
      
      if(currImg == numPics - 1 || currImg >= THUMBNAILS_DISPLAYED - 1) {
            $leftArrow.click(); // move the thumbnail pictures to the right
        }

    }); // end click
    
    /* End big image wrapper code */
   
    $links.first().trigger('click', true); // click the first thumbnail picture on start
    
}); // end ready
