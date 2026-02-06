<?php

namespace HeimrichHannot\FormFieldsCollectionBundle\EventListener\Integrations;

use Contao\Date;
use HeimrichHannot\FormFieldsCollectionBundle\FrontendWidget\DateTimeWidget;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Terminal42\LeadsBundle\Event\FormDataLabelEvent;
use Terminal42\LeadsBundle\Event\FormDataValueEvent;

class LeadsListener
{
    #[AsEventListener]
    public function onFormDataValueEvent(FormDataValueEvent $event): void
    {
        if (DateTimeWidget::TYPE !== $event->getField()['type']) {
            return;
        }

        $format = match ($event->getField()['dateTimeType']) {
            'date' => Date::getNumericDateFormat(),
            'time' => Date::getNumericTimeFormat(),
            'default' => null,
        };

        if (null === $format) {
            $event->stopPropagation();
            return;
        }

        try {
            $event->setValue((new Date($event->getValue(), $format))->tstamp);
        } catch (\Exception) {}

        $event->stopPropagation();
    }

    #[AsEventListener]
    public function onFormDataLabelEvent(FormDataLabelEvent $event): void
    {
        if (DateTimeWidget::TYPE !== $event->getField()['type']) {
            return;
        }

        $format = match ($event->getField()['dateTimeType']) {
            'date' => Date::getNumericDateFormat(),
            'time' => Date::getNumericTimeFormat(),
            'default' => null,
        };

        if (null === $format) {
            $event->stopPropagation();
            return;
        }

        try {
            $event->setLabel(Date::parse($format, $event->getValue()));
        } catch (\Exception) {}

        $event->stopPropagation();
    }
}