
function copyText(button) {
    // Get the text content of the column of the clicked button
    var columnText = button.parentNode.previousElementSibling.textContent;
    
    // Create a temporary input element to hold the text
    var tempInput = document.createElement("input");
    tempInput.setAttribute("value", columnText);
    document.body.appendChild(tempInput);
    
    // Select the text inside the input element
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); /* For mobile devices */
    
    // Copy the selected text
    document.execCommand("copy");
    
    // Remove the temporary input
    document.body.removeChild(tempInput);
    
    // Optionally, provide feedback to the user
    alert("Copied: " + columnText);
}