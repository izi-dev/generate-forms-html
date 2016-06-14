<?php
namespace MrCat\GenerateForm;

class Select extends Form
{
    /**
     * @param $name
     * @param $list
     * @param string $default
     * @param array $options
     * @return mixed
     */
    public static function make($name, $list, $default = '', array $options = [])
    {
        $select = new static();
        $options = $select->setDefaultAttr($options, $name);
        $list = $select->getListOptions($list, $default);
        return $select->select($list, $options);
    }

    /**
     * @param array $list
     * @param null $default
     * @return array
     */
    public function getListOptions(array $list = [], $default = null)
    {
        $options = [];
        foreach ($list as $key => $value) {
            $options[] = [
                'value' => $key,
                'display-name' => $value,
            ];

            if ($key == $default) {
                $indice = count($options) - 1;
                $options[$indice]['selected'] = '';
            }

        };
        return $options;
    }
}