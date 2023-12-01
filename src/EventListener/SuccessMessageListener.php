<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
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