<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;

$dca = &$GLOBALS['TL_DCA']['tl_form_field'];

$dca['palettes'][DateTimeWidget::TYPE] = <<<PALETTE
    {type_legend},type,name,label;
    {fconfig_legend},mandatory,dateTimeType,defaultDateTimeValue;
    {expert_legend:collapsed},class,minval,maxval,accesskey,tabindex;
    {template_legend:collapsed},customTpl;
    {invisible_legend:collapsed},invisible
    PALETTE;
$dca['palettes'][SingleCheckboxWidget::TYPE] = <<< PALETTE
    {type_legend},type,name,label;
    {fconfig_legend},mandatory,help;
    {options_legend},value,text;
    {expert_legend:collapsed},class;
    {template_legend:collapsed},customTpl;
    {invisible_legend:collapsed},invisible
    PALETTE;

$dca['subpalettes']['defaultDateTimeValue_custom'] = 'value';

$dca['palettes']['__selector__'][] = 'defaultDateTimeValue';

$dca['fields']['dateTimeType'] = [
    'inputType' => 'select',
    'options' => [
        'date',
        'time',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'default' => 'date',
    'eval' => [
        'tl_class' => 'w50',
    ],
    'sql' => "varchar(4) NOT NULL default ''",
];

$dca['fields']['defaultDateTimeValue'] = [
    'inputType' => 'select',
    'options' => [
        'current',
        'custom',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['defaultDateTimeValue'],
    'eval' => [
        'tl_class' => 'w50',
        'submitOnChange' => true,
        'includeBlankOption' => true,
    ],
    'sql' => "varchar(8) NOT NULL default ''",
];
