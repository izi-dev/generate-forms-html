<?php
namespace MrCat\GenerateForm;

class Radio extends Form
{
    /**
     * @param $name
     * @param bool $checked
     * @param array $options
     * @return mixed
     */
    public static function make($name, $checked = false, array $options = [])
    {
        $radio = new static();
        $default['type'] = 'radio';
        if ($checked) {
            $default['checked'] = '';
        }
        $options = array_merge($options, $default);
        return $radio->input($radio->setDefaultAttr($options, $name));
    }
}