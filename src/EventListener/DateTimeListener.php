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
        if (!$dc->id) {
            return;
        }

        /** @var \HeimrichHannot\FormFieldsCollectionBundle\Model\FormFieldModel|null $widget */
        $widget = FormFieldModel::findByPk($dc->id);
        if (DateTimeWidget::TYPE !== $widget?->type) {
            return;
        }

        $fields = &$GLOBALS['TL_DCA']['tl_form_field']['fields'];
        switch ($widget->dateTimeType) {
            case 'date':
                $fields['value']['eval']['rgxp'] = 'date';
                $fields['value']['eval']['datepicker'] = true;
                $fields['value']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['defaultDateTimeCustomValue'];
                $fields['minval']['eval']['rgxp'] = 'date';
                $fields['minval']['eval']['datepicker'] = true;
                $fields['maxval']['eval']['rgxp'] = 'date';
                $fields['maxval']['eval']['datepicker'] = true;
                break;
            case 'time':
                $fields['value']['eval']['rgxp'] = 'time';
                $fields['value']['eval']['datepicker'] = true;
                $fields['value']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['defaultDateTimeCustomValue'];
                $fields['minval']['eval']['rgxp'] = 'time';
                $fields['minval']['eval']['datepicker'] = true;
                $fields['maxval']['eval']['rgxp'] = 'time';
                $fields['maxval']['eval']['datepicker'] = true;
                break;
        }
    }
}
