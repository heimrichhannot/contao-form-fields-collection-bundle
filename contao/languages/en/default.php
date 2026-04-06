<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;

$GLOBALS['TL_LANG']['FFL'][SuccessMessageWidget::TYPE] = [
    'Success Message',
    'Output a success message after form submission.'
];
$GLOBALS['TL_LANG']['FFL'][DateTimeWidget::TYPE]       = [
    'Date/ time',
    'A date or time field.'
];
$GLOBALS['TL_LANG']['FFL'][SingleCheckboxWidget::TYPE]       = [
    'Checkbox',
    'A single checkbox that can be either checked or unchecked.'
];