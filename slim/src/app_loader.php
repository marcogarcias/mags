<?php
$base = __DIR__."/";

$folders = [
    'controllers',
    'models',
    'routes'
];

foreach($folders as $f)
{
    foreach (glob($base . $f."/*.php") as $filename)
    {
        require $filename;
    }
}