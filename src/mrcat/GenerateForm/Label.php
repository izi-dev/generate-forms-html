<?php
namespace MrCat\GenerateForm;


class Label extends Form
{
    /**
     * @param $name
     * @param $options
     * @return mixed
     */
    public static function make($name, array $options = [])
    {
        $label = new static();
        $options['id'] = '';
        $options['for'] = $name;
        return $label->label($label->setDefaultAttr($options, $name), $name);
    }
}