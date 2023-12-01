<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Form;

class SuccessMessageListener
{
    #[AsHook("processFormData")]
    public function onProcessFormData(array $submittedData, array $formData, ?array $files, array $labels, Form $form): void
    {
        return;
    }
}