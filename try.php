<?php
$str = 'Not Good';

// previous to PHP 5.1.0 you would compare with -1, instead of false
if (($timestamp = strtotime($str)) === false) {
    echo "The string ($str) is bogus";
} else {
    echo "$str == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}
?>