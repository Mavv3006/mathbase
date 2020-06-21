/**
 * Toggels the disabled property of the HTMLElement with the given ID.
 * 
 * @param {string} element The ID of the HTMLElement
 */
function disableInput(element) {
    if (document.getElementById(element).disabled) {
        document.getElementById(element).disabled = false;
    } else {
        document.getElementById(element).disabled = true;
    }
}