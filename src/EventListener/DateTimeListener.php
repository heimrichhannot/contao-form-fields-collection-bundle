<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\FormFieldModel;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;

class DateTimeListener
{
    #[AsCallback(table: 'tl_form_field', target: 'config.onload')]
    public function onLoadCallback(DataContainer $dc): void
    {
        if (!$dc || !$dc->id) {
            return;
        }

        $widget = FormFieldModel::findByPk($dc->id);
        if (!$widget || (DateTimeWidget::TYPE !== $widget->type)) {
            return;
        }

        switch ($widget->dateTimeType) {
            case 'date':
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['value']['eval']['rgxp'] = 'date';
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['minval']['eval']['rgxp'] = 'date';
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['maxval']['eval']['rgxp'] = 'date';
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['value']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['defaultDateTimeCustomValue'];
                break;
            case 'time':
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['value']['eval']['rgxp'] = 'time';
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['minval']['eval']['rgxp'] = 'time';
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['maxval']['eval']['rgxp'] = 'time';
                $GLOBALS['TL_DCA']['tl_form_field']['fields']['value']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['defaultDateTimeCustomValue'];
                break;
        };
    }
}