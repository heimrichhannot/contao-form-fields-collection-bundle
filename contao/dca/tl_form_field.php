<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;

$dca = &$GLOBALS['TL_DCA']['tl_form_field'];

$dca['palettes'][SuccessMessageWidget::TYPE] = '{type_legend},type;{text_legend},text;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';
$dca['palettes'][DateTimeWidget::TYPE]       = '{type_legend},type,name,label;{fconfig_legend},mandatory,dateTimeType,defaultDateTimeValue;{expert_legend:hide},class,minval,maxval,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';
$dca['palettes'][SingleCheckboxWidget::TYPE]             = '{type_legend},type,name,value,label,singleSRC;
{fconfig_legend},mandatory;{expert_legend:hide},class;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

$dca['subpalettes']['defaultDateTimeValue_custom'] = 'value';

$dca['palettes']['__selector__'][] = 'defaultDateTimeValue';

$dca['fields']['dateTimeType'] = [
    'inputType' => 'select',
    'options'   => [
        'date',
        'time',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'default'   => 'date',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "varchar(4) NOT NULL default ''",
];

$dca['fields']['defaultDateTimeValue'] = [
    'inputType' => 'select',
    'options'   => [
        'current',
        'custom',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['defaultDateTimeValue'],
    'eval'      => [
        'tl_class'           => 'w50',
        'submitOnChange'     => true,
        'includeBlankOption' => true,
    ],
    'sql'       => "varchar(8) NOT NULL default ''",
];

