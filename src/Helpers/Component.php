<?php

namespace PropaySystems\Utilities\Helpers;

abstract class Component extends \Illuminate\View\Component
{
    protected function classes(array $classList): string
    {
        $classes = [];

        foreach ($classList as $class => $constraint) {
            if (is_numeric($class)) {
                $classes[] = $constraint;
            } elseif ($constraint) {
                $classes[] = $class;
            }
        }

        return implode(' ', $classes);
    }
}
