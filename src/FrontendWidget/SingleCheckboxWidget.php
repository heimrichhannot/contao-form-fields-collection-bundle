<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\FormCheckbox;
use Contao\Input;
use Contao\System;

class SingleCheckboxWidget extends FormCheckbox
{
    public const TYPE = 'huh_single_checkbox';

    protected $strTemplate = 'form_huh_single_checkbox';

    protected function getOption(): array
    {
        $text = System::getContainer()->get('contao.insert_tag.parser')->replaceInline((string)$this->text);
        if (
            preg_match('/^\s*<p\b[^>]*>(.*)<\/p>\s*$/is', $text, $matches) === 1
            && preg_match('/<\/?p\b/i', $matches[1]) !== 1
        ) {
            $text = trim($matches[1]);
        }

        $value = (null !== $this->value && '' !== $this->value) ? $this->value : '1';
        $option = [
            'type' => 'option',
            'name' => $this->strName,
            'id' => $this->strId,
            'value' => $value,
            'attributes' => $this->getAttributes(),
            'label' => $text
        ];
        if ($this->mandatory) {
            $option['mandatory'] = true;
        }

        if (!Input::isPost()) {
            $option['checked'] = false;
        } else {
            $option['checked'] = (string)$this->varValue === (string)$value;
        }

        return $option;
    }

    public function getAttributes($arrStrip = array())
    {
        if ($this->mandatory) {
            $this->arrAttributes['required'] = 'required';
        }
        return parent::getAttributes($arrStrip);
    }


    protected function isValidOption($varInput): bool
    {
        // set arrOptions to make parent validation work
        $this->arrOptions = [$this->getOption()];
        return parent::isValidOption($varInput);
    }
}