<?php
namespace MrCat\GenerateForm;

class Html
{
    /**
     * @param $type
     * @param $name
     * @param string $default
     * @param array $options
     *
     * @return string
     */
    public static function input($type, $name, $default = '', array $options = [])
    {
        return Input::make($type, $name, $default, $options);
    }

    /**
     * @param $name
     * @param string $default
     * @param array $options
     *
     * @return string
     */
    public static function text($name, $default = '', array $options = [])
    {
        return static::input('text', $name, $default, $options);
    }

    /**
     * @param $name
     * @param bool $default
     * @param array $options
     *
     * @return string
     */
    public static function radio($name, $default = false, array $options = [])
    {
        return Radio::make($name, $default, $options);
    }

    /**
     * @param $name
     * @param bool $default
     * @param array $options
     *
     * @return mixed
     */
    public static function checkbox($name, $default = false, array $options = [])
    {
        return CheckBox::make($name, $default, $options);
    }

    /**
     * @param $name
     * @param $list
     * @param string $default
     * @param array $options
     *
     * @return string
     */
    public static function select($name, $list, $default = '', array $options = [])
    {
        return Select::make($name, $list, $default, $options);
    }

    /**
     * @param $name
     * @param $list
     * @param array $default
     * @param array $options
     *
     * @return string
     */
    public static function selectMultiple($name, $list, $default = [], array $options = [])
    {
        return SelectMultiple::make($name, $list, $default, $options);
    }

    /**
     * @param $name
     * @param string $default
     * @param array $options
     *
     * @return mixed
     */
    public static function textArea($name, $default = '', array $options = [])
    {
        return TextArea::make($name, $default, $options);
    }


    /**
     * @param $name
     * @param array $options
     *
     * @return mixed
     */
    public static function label($name, array $options = [])
    {
        return Label::make($name, $options);
    }

    /**
     * @return \MrCat\GenerateForm\Tag;
     */
    public static function generate()
    {
        return new Tag();
    }
}