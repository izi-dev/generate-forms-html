<?php
namespace MrCat\GenerateForm;

class TextArea extends Form
{
    /**
     * @param $name
     * @param string $default
     * @param $options
     * @return mixed
     */
    public static function make($name, $default = '', array $options = [])
    {
        $textArea = new static();
        return $textArea->textArea($textArea->setDefaultAttr($options, $name), $default);
    }
}