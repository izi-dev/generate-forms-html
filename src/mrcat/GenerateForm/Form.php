<?php
namespace MrCat\GenerateForm;

class Form
{
    /**
     * @param array $options
     * @return string
     */
    public static function attributes(array $options = [])
    {
        $attributes = [];
        foreach ($options as $key => $value) {
            $attributes[] = "{$key}='{$value}'";
        }
        return implode(' ', $attributes);
    }

    /**
     * @param array $options
     * @return string
     */
    public function input(array $options = [])
    {
        $options = $this->attributes($options);
        return "<input {$options} />";
    }

    /**
     * @param array $list
     * @param array $options
     * @return string
     */
    public function select(array $list = [], array $options = [])
    {
        $options = $this->attributes($options);
        $list = $this->optionSelect($list);
        return "<select {$options}> {$list} </select>";
    }

    /**
     * @param $options
     * @param $display
     * @return string
     */
    public function toOptionSelectString($options, $display)
    {
        return "<option {$options}> {$display} </option>";
    }

    /**
     * @param array $list
     * @return string
     */
    public function optionSelect(array $list = [])
    {
        $options = [];
        foreach ($list as $value) {
            if (is_array($value)) {
                $display = $value['display-name'];
                unset($value['display-name']);
                $attributes = $this->attributes($value);
                $options[] = $this->toOptionSelectString($attributes, $display);
            }
        }
        return implode(' ', $options);
    }

    /**
     * @param $options
     * @param $name
     * @return array
     */
    public static function setDefaultAttr(array $options = [], $name)
    {
        $attrDefault = [
            'name' => $name,
            'id' => key_exists('id', $options) ? $options['id'] : $name
        ];
        return array_merge($options, $attrDefault);
    }

    /**
     * @param array $options
     * @param string $display
     * @return string
     */
    public function textArea(array $options = [], $display = '')
    {
        $options = $this->attributes($options);
        return "<textarea {$options} > {$display} </textarea>";
    }

    /**
     * @param $display
     * @param array $options
     * @return string
     */
    public function label(array $options = [], $display = '')
    {
        $options = $this->attributes($options);
        return "<label {$options} > {$display} </label>";
    }
}