<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\FormFieldModel;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;

class SingleCheckboxListener
{
    #[AsCallback(table: 'tl_form_field', target: 'config.onload')]
    public function onLoadCallback(DataContainer $dc = null): void
    {
        if (!$dc || !$dc->id) {
            return;
        }

        $widget = FormFieldModel::findByPk($dc->id);
        if (!$widget || (SingleCheckboxWidget::TYPE !== $widget->type)) {
            return;
        }

        $GLOBALS['TL_DCA']['tl_form_field']['fields']['label']['eval']['mandatory'] = true;
    }
}