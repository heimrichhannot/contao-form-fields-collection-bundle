<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\FormCheckbox;
use Contao\System;

class SingleCheckboxWidget extends FormCheckbox
{
    public const TYPE = 'huh_single_checkbox';

    protected function getOptions(): array
    {
        $text = System::getContainer()->get('contao.insert_tag.parser')->replaceInline($this->text);
        return [[
            'type' => 'option',
            'name' => $this->strName,
            'id' => $this->strId,
            'value' => $this->value ?: '1',
            'checked' => self::optionChecked('1', $this->value),
            'attributes' => $this->getAttributes(),
            'label' => $text
        ]];
    }


}