<?php
function clearScreen()
{
    if (PHP_OS == "Linux") {
        echo system("clear");
    } else {
        echo system('cmd /c cls');
    }
}
?>