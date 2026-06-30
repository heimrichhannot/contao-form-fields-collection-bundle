<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;

$GLOBALS['TL_FFL'][DateTimeWidget::TYPE] = DateTimeWidget::class;
$GLOBALS['TL_FFL'][SingleCheckboxWidget::TYPE] = SingleCheckboxWidget::class;
