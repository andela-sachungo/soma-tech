<?php
/**
 * A global helper function for creating flash messages using sweet alert.
 *
 * The app helper function grabs the Flash instance from the container.
 * If the flash() function is called with no arguments, return the other
 * methods in the Flash class, e.g., success(), else return the info
 * method.
 *
 * @return void
 */
function flash($title = null, $message = null)
{
    $flash = app('Soma\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}
