<?php

function getDirectories($path)
{
    return glob( $path . '/*', GLOB_ONLYDIR);
}

function getFiles($path)
{
    return glob( $path . '/*');
}

function getMetaData($path)
{
    $fp = file_get_contents($path . "/metadata");
    if ($fp === false) {
        return writeMetaData($path, []);
    }
    return unserialize($fp);
}

function writeMetaData($path, $data)
{
    file_put_contents($path . "/metadata", serialize($data));
    return $data;
}