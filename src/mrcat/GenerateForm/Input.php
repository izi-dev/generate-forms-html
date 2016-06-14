<?php
namespace MrCat\GenerateForm;

class Input extends Form
{
    /**
     * @param $type
     * @param $name
     * @param string $default
     * @param $options
     * @return mixed
     */
    public static function make($type, $name, $default = '', array $options = [])
    {
        $input = new static();
        $default = [
            'value' => $default,
            'type' => $type
        ];
        $options = array_merge($options, $default);
        return $input->input($input->setDefaultAttr($options, $name));
    }
}