let accordionContainer = document.getElementsByClassName("accordion-container");
let accordionHeader = document.getElementsByClassName("accordion-header");

// for each one of the accordion-headers add a click function
let i;
for (i = 0; i < accordionHeader.length; i++) {
  accordionHeader[i].addEventListener("click", togglePanel)
}

function togglePanel(){
	let parentNodeClass = this.parentNode.className;
	
	// in other words, for each one: set class to close for main container 
	for(i = 0; i < accordionContainer.length; i++) {
		accordionContainer[i].className = "accordion-container close";
	}
	
	// if this is the container that was clicked, set class to open
	if(parentNodeClass == "accordion-container close") {
		this.parentNode.className = "accordion-container open";
	}
}