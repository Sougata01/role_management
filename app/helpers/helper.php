<?php

function toUpperCase(string $string) {
    return strtoupper($string);
}

function getAssetsUrl($path){
    return asset('assets/'.$path);
}
