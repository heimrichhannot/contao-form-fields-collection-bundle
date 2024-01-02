<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget;

use Contao\FormExplanation;
use Contao\System;
use Symfony\Component\HttpFoundation\Session\Session;

class SuccessMessageWidget extends FormExplanation
{
    public const TYPE = 'huh_successMessage';

    protected $strTemplate = 'form_huh_successMessage';

    public function parse($arrAttributes = null)
    {
        $requestStack = System::getContainer()->get('request_stack');
        $scopeMatcher = System::getContainer()->get('contao.routing.scope_matcher');
        $request = $requestStack->getCurrentRequest();

        if (!$request) {
            return '';
        }

        if ($scopeMatcher->isBackendRequest($request)) {
            return parent::generate() ?? '';
        }

        /** @var Session $session */
        $session = $request->getSession();
        if (!$session) {
            return '';
        }

        if ($session->get(static::generateMessageName($this->strName), false)) {
            $session->remove(static::generateMessageName($this->strName));
            return parent::parse() ?? '';
        }

        return '';
    }

    public static function generateMessageName(string $name): string
    {
        return 'huh.formfieldscollection.successMessage.'.$name;
    }
}