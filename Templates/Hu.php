<?php

namespace Novutec\WhoisParser\Templates;

class Hu extends Standard
{

    public function parse($result, $rawdata)
    {
        $rawdata = mb_convert_encoding($rawdata, 'UTF-8', 'ISO-8859-1');
        parent::parse($result, $rawdata);
    }


    protected function reformatData()
    {
        $dateFields = array('record created');
        foreach ($dateFields as $field) {
            if (array_key_exists($field, $this->data) && strlen($this->data[$field])) {
                $this->data[$field] = str_replace('.', '-', $this->data[$field]);
            }
        }
    }


    public function translateRawData($rawdata, $config)
    {
        return mb_convert_encoding($rawdata, 'UTF-8', 'ISO-8859-1');
    }
}
