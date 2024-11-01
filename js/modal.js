// Get the modal
var modal = document.getElementById('Modalcategories');

// Get the button that opens the modal
var btn = document.getElementById("modalcategories");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

///////// Remove paragraphs empty in plugin ////////////////////////////////// 
jQuery(function($){
    $('div.span_2_of_8 > p').filter(function() {
        return $.trim($(this).text()) === '' && $(this).children().length == 0
    })
    .remove()
})


jQuery(document).ready(function(){
    $ = jQuery; 
    $('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
}); 

});