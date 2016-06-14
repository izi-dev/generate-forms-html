<?php
namespace MrCat\GenerateForm;


class Tag extends Form
{
    protected $html = [];

    protected $nameTag;

    protected $optionsTag = [];

    /**
     * @param $name
     * @param $options
     * @param $list
     * @return string
     */
    public function toStringTag($name, $options, $list)
    {
        $options = $this->attributes($options);
        return "<{$name} {$options} > {$list} </{$name}>";
    }


    /**
     * @param $name
     * @param array $options
     * @param $callable
     * @return $this
     */
    public function tag($name, array $options = [], $callable)
    {
        $this->nameTag = $name;
        $this->optionsTag = $options;

        if (is_callable($callable)) {
            call_user_func($callable, $this);
        }

        if (is_string($callable)) {
            $this->append($callable);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function get()
    {
        $array = array_group_by($this->html, 'name');
        $display = '';
        $options = [];
        $html = [];
        foreach ($array as $key => $value) {
            foreach ($value as $item) {
                if ($item['name'] == $key) {
                    $display .= $item['display'];
                    $options = $item['options'];
                }
            }
            $html[] = $this->toStringTag($key, $options, $display);
            $display = '';
        }
        return implode(' ', $html);
    }

    /**
     * @param $display
     * @return string
     */
    public function append($display)
    {
        $html = [
            'name' => $this->nameTag,
            'options' => $this->optionsTag,
            'display' => $display,
        ];
        array_push($this->html, $html);
        return $this;
    }
}