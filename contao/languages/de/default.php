<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;

$GLOBALS['TL_LANG']['FFL'][SuccessMessageWidget::TYPE] = [
    'Erfolgsmeldung',
    'Gibt eine Erfolgsmeldung aus, wenn das Formular übermittelt wurde.'
];
$GLOBALS['TL_LANG']['FFL'][DateTimeWidget::TYPE]       = [
    'Datum-/ Zeitfeld',
    'Ermöglicht die Eingabe von Datum und/ oder Zeit.'
];