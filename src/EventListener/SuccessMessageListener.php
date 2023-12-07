<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\DataContainer;
use Contao\FormFieldModel;
use Form;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\SuccessMessageWidget;
use Symfony\Component\HttpFoundation\RequestStack;

class SuccessMessageListener
{
    public function __construct(
        private RequestStack $requestStack,
    )
    {
    }

    #[AsCallback(table: 'tl_form_field', target: 'config.onload')]
    public function onLoadCallback(DataContainer $dc = null): void
    {
        if (!$dc || !$dc->id) {
            return;
        }

        $widget = FormFieldModel::findByPk($dc->id);
        if (!$widget || (SuccessMessageWidget::TYPE !== $widget->type)) {
            return;
        }

        $GLOBALS['TL_DCA']['tl_form_field']['fields']['text']['eval']['mandatory'] = true;
    }

    #[AsHook("processFormData")]
    public function onProcessFormData(array $submittedData, array $formData, ?array $files, array $labels, Form $form): void
    {
        $request = $this->requestStack->getCurrentRequest();
        if (!$request) {
            return;
        }

        $successFields = FormFieldModel::findBy(["type=?", "pid=?", "invisible=''"], [SuccessMessageWidget::TYPE, $form->id]);
        if (!$successFields) {
            return;
        }

        $session = $request->getSession();

        while ($successField = $successFields->next()) {
            $session->set(SuccessMessageWidget::generateMessageName($successField->name), true);
        }
    }
}