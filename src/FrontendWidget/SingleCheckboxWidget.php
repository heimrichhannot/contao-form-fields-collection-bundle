<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\FormCheckbox;
use Contao\System;

class SingleCheckboxWidget extends FormCheckbox
{
    public const TYPE = 'huh_single_checkbox';

    protected $strTemplate = 'form_huh_single_checkbox';

    protected function getOption(): array
    {
        $text = System::getContainer()->get('contao.insert_tag.parser')->replaceInline($this->text);
        $text = preg_replace(
            '/^\s*<p\b[^>]*>\s*(.*?)\s*<\/p>\s*$/is',
            '$1',
            $text
        ) ?? $text;


        return [
            'type' => 'option',
            'name' => $this->strName,
            'id' => $this->strId,
            'value' => $this->value ?: '1',
            'checked' => self::optionChecked('1', $this->value),
            'attributes' => $this->getAttributes(),
            'label' => $text
        ];
    }

    public function addAttributes($arrAttributes): void
    {
        parent::addAttributes($arrAttributes);
        $this->checkboxOption = $this->getOption();

    }


}