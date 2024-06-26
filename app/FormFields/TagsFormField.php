<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class TagsFormField extends AbstractHandler
{
    protected $codename = 'tags';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.tags', [
            'row'             => $row,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
            'options'         => $options,
        ]);
    }
}
