<?php

/**
 * This function will check whether the file should be allowed to upload or not.
 * Allowed are only `.jpg`, `.png`, `.gif`
 *
 * @param string $filename The name of the file including the extention
 * @return boolean True if the extension of the file is allowed.
 */
function isAllowedMIMEType(string $mimeType): bool
{
    switch ($mimeType) {
        case 'image/jpeg':
        case 'image/png':
        case 'image/gif':
        case '':
            return true;
        default:
            return false;
    }
}
