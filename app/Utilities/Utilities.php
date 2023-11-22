<?php

trait Utilities
{
    protected function cleanUpString(string $string): string
    {
        return strip_tags(trim($string));
    }
}