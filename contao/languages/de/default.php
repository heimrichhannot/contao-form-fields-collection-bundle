<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;

$GLOBALS['TL_LANG']['FFL'][SuccessMessageWidget::TYPE] = [
    'Erfolgsmeldung (Form Fields Collection)',
    'Gibt eine Erfolgsmeldung aus, wenn das Formular übermittelt wurde.'
];
$GLOBALS['TL_LANG']['FFL'][DateTimeWidget::TYPE]       = [
    'Datum-/ Zeitfeld (Form Fields Collection)',
    'Ermöglicht die Eingabe von Datum und/ oder Zeit.'
];
$GLOBALS['TL_LANG']['FFL'][SingleCheckboxWidget::TYPE]       = [
    'Checkbox Einzeln (Form Fields Collection)',
    'Eine einzelne Checkbox, die entweder aktiviert oder deaktiviert sein kann.'
];