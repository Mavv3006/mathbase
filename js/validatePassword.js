/**
 * Validates a given password. It allows 0-9, a-z, A-Z at least 6 times.
 * @param {string} password The password to be validated
 * @returns {boolean} True if the password matches the pattern, false otherwise
 */
function validatePassword(password) {
    const validPassword = new RegExp(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}$/g);

    return validPassword.test(password);
}