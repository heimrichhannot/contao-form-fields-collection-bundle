<?php

use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;

$GLOBALS['TL_FFL'][SuccessMessageWidget::TYPE] = SuccessMessageWidget::class;
$GLOBALS['TL_FFL'][DateTimeWidget::TYPE]       = DateTimeWidget::class;
