<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;

$GLOBALS['TL_FFL'][DateTimeWidget::TYPE]       = DateTimeWidget::class;
$GLOBALS['TL_FFL'][SingleCheckboxWidget::TYPE] = SingleCheckboxWidget::class;
$GLOBALS['TL_FFL'][SuccessMessageWidget::TYPE] = SuccessMessageWidget::class;
