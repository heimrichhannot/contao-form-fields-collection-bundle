<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Date;
use Contao\FormFieldModel;
use Contao\FormTextField;
use Contao\FormText;

if (!class_exists(FormTextField::class)) {
    class_alias(FormText::class, FormTextField::class);
}

// add this when we drop support for php 8.1
//#[\AllowDynamicProperties]
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

        $this->parentTemplate = 'form_textfield';
        if (version_compare(ContaoCoreBundle::getVersion(), '5.0', '>=') ) {
            $this->parentTemplate = 'form_text';
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

    public function parse($arrAttributes=null)
    {
        // restore field value on errors
        if ($this->hasErrors()) {
            $dateTime = match ($this->dateTimeType) {
                'date' => \DateTime::createFromFormat(Date::getNumericDateFormat(), $this->value),
                'time' => \DateTime::createFromFormat(Date::getNumericTimeFormat(), $this->value),
            };
            if (false !== $dateTime) {
                $this->value = match ($this->dateTimeType) {
                    'date' => $dateTime->format('Y-m-d'),
                    'time' => $dateTime->format('H:i'),
                };
            }
        }
        return parent::parse($arrAttributes);
    }
}