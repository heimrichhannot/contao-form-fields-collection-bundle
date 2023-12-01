<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\FormExplanation;
use Contao\System;
use Symfony\Component\HttpFoundation\Session\Session;

class SuccessMessageFrontendWidget extends FormExplanation
{
    public const TYPE = 'successMessage';

    public function generate(): string
    {
        $requestStack = System::getContainer()->get('request_stack');
        $request = $requestStack->getCurrentRequest();
        if (!$request) {
            return '';
        }

        /** @var Session $session */
        $session = $request->getSession();
        if (!$session) {
            return '';
        }

        if ($session->get(static::generateMessageName($this->strName), false)) {
            return parent::generate();
        }

        return '';
    }

    public static function generateMessageName(string $name): string
    {
        return 'huh.formfieldscollection.successMessage.'.$name;
    }
}