<?php

namespace HeimrichHannot\FormFieldsCollectionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotFormFieldsCollectionBundle extends Bundle
{
    public function getPath()
    {
        return \dirname(__DIR__);
    }

}