<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\FormFieldModel;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SingleCheckboxWidget;

class SingleCheckboxListener
{
    #[AsCallback(table: 'tl_form_field', target: 'config.onload')]
    public function onLoadCallback(DataContainer $dc): void
    {
        if (!$dc->id) {
            return;
        }

        $widget = FormFieldModel::findByPk($dc->id);
        if (!$widget || (SingleCheckboxWidget::TYPE !== $widget->type)) {
            return;
        }

        $GLOBALS['TL_DCA']['tl_form_field']['fields']['text']['eval']['rte'] = 'tinyMCE_option';
        $GLOBALS['TL_DCA']['tl_form_field']['fields']['text']['eval']['tl_class'] = 'clr';
        $GLOBALS['TL_DCA']['tl_form_field']['fields']['text']['eval']['mandatory'] = true;
        $GLOBALS['TL_DCA']['tl_form_field']['fields']['value']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['singleCheckboxValue'];
    }
}
