<?php
// $Id: rglob.php,v 1.0 2008/11/24 17:20:00 hm2k Exp $

/**
 * Recursive glob()
 */

/**
 * @param int $pattern
 *  the pattern passed to glob()
 * @param int $flags
 *  the flags passed to glob()
 * @param string $path
 *  the path to scan
 * @return mixed
 *  an array of files in the given path matching the pattern.
 */

function rglob($pattern='*', $flags = 0, $path='C:\folders')
{
    $paths=glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
    $files=glob($path.$pattern, $flags);
    foreach ($paths as $path) { $files=array_merge($files,rglob($pattern, $flags, $path)); }
    return $files;
}

/* example usage: */

var_export(rglob('0101991'));

?>