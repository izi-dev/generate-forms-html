<?php

namespace MrCat\GenerateForm;


class SelectMultiple extends Form
{
    /**
     * @param $name
     * @param $list
     * @param array $default
     * @param array $options
     *
     * @return mixed
     */
    public static function make($name, $list, $default = [], array $options = [])
    {
        $name .= '[]';
        $select = new static();
        $multiSelect = [
            'multiple' => 'multiple',
        ];
        $options = $select->setDefaultAttr(array_merge($multiSelect, $options), $name);

        $list = $select->getListOptions($list, $default);

        return $select->select($list, $options);
    }

    /**
     * @param array $list
     * @param array $default
     *
     * @return array
     */
    public function getListOptions(array $list = [], $default = [])
    {
        $options = [];
        foreach ($list as $key => $value) {
            $options[] = [
                'value'        => $key,
                'display-name' => $value,
            ];
            if (is_array($default) && in_array($key,$default)) {
                $indice = count($options) - 1;
                $options[$indice]['selected'] = '';
            }
        };
        return $options;
    }
}