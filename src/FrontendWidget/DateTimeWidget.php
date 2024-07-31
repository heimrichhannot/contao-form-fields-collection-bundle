<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\Date;
use Contao\FormFieldModel;
use Contao\FormTextField;
use Contao\FormText;

if (!class_exists(FormTextField::class)) {
    class_alias(FormText::class, FormTextField::class);
}

class DateTimeWidget extends FormTextField
{
    public const TYPE = 'huh_datetime';

    protected $strTemplate = 'form_huh_datetime';

    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        if ('custom' === $this->defaultDateTimeValue) {
            $fieldModel = FormFieldModel::findByPk($this->id);
            if ($fieldModel) {
                $this->value = match ($this->dateTimeType) {
                    'date' => Date::parse('Y-m-d', $fieldModel->value),
                    'time' => Date::parse("H:i", $fieldModel->value),
                };
            }
        } elseif ('current' === $this->defaultDateTimeValue) {
            $this->value = match ($this->dateTimeType) {
                "", 'date' => date('Y-m-d'),
                'time' => date('H:i'),
            };
        }
    }


    public function __get($strKey)
    {
        switch ($strKey) {
            case 'rgxp':
            case 'type':
                if ('date' === $this->dateTimeType) {
                    return 'date';
                }
                if ('time' === $this->dateTimeType) {
                    return 'time';
                }
                break;
//            case 'value':
//                if ($this->blnSubmitInput) {
//                    return parent::__get($strKey);
//                }
//                if ('custom' === $this->defaultDateTimeValue) {
//                    return parent::__get($strKey);
//                } else {
//                    if ('date' === $this->dateTimeType) {
//                        return date('Y-m-d');
//                    }
//                    if ('time' === $this->dateTimeType) {
//                        return date('H:i');
//                    }
//                }
//
//                break;
        }

        return parent::__get($strKey);
    }

    protected function validator($varInput)
    {
        if (empty($varInput)) {
            return parent::validator('');
        }

        return parent::validator(match ($this->dateTimeType) {
            'date' => \DateTime::createFromFormat('Y-m-d', $varInput)->format(Date::getNumericDateFormat()),
            'time' => \DateTime::createFromFormat('H:i', $varInput)->format(Date::getNumericTimeFormat()),
        });
    }


}