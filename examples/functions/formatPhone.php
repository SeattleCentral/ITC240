<?php

function formatPhone($phone) {
    // Remove everything that's not a number or an "x" (for extension).
    $phone = preg_replace('/[^\dxX]+/', '', $phone);

    if (strlen($phone) == 0) {
        return '';
    }

    // Capture an extension component.
    $extension = false;
    if (preg_match('/[xX]/', $phone)) {
        $phoneArray = explode('x', strtolower($phone));
        $phone = $phoneArray[0];
        $extension = $phoneArray[1];
    }

    $formattedPhone = '';

    // Format country code
    $phoneLength = strlen($phone);
    if ($phoneLength > 10) {
        $formattedPhone = '+' . substr($phone, -$phoneLength, -10) . ' ';
    }

    // Format main number
    $formattedPhone .= '(' . substr($phone, -10, -7) . ') ';
    $formattedPhone .= substr($phone, -7, -4) . '-';
    $formattedPhone .= substr($phone, -4);

    // Format extensions
    if (strlen($extension)) {
        $formattedPhone .= ' x' . $extension;
    }

    return $formattedPhone;
}

?>