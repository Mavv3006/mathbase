/**
 * Checks whether the type of the file to upload is valid.
 * Valid types are `.gif`, `.png`, `.jpg`, `.jpeg`.
 * 
 * @param {string} file_name 
 * @return {bool} True if the file type is valid, False otherwise
 */
function isValidType(file_name) {
    if (file_name.includes(".")) {
        let endung = file_name.split(".")[1];
        switch (endung) {
            case 'gif':
            case 'png':
            case 'jpg':
            case 'jped':
                return true;
            default:
                return false;
        }
    } else {
        return false;
    }
}