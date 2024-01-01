<?php

namespace HeimrichHannot\FormFieldsCollectionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotFormFieldsCollectionBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

}