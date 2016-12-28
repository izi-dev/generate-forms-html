<?php
namespace MrCat\GenerateForm;

class CheckBox extends Form
{
    /**
     * @param $name
     * @param bool $default
     * @param array $options
     * @return mixed
     */
    public static function make($name, $default = false, array $options = [])
    {
        $radio = new static();
        if ($default) {
            $default['checked'] = '';
        }
        $default['type'] = 'checkbox';
        $options = array_merge($options, $default);
        return $radio->input($radio->setDefaultAttr($options, $name));
    }
}
