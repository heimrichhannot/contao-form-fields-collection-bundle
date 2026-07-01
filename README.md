# Form Field Collection Bundle

This bundle adds additional form fields to the Contao form generator.

## Fields

* Date/Time field - Field of html type date or time with native pickers (if supported by browser)
* Single Checkbox field - A single checkbox with a rich-text option label and configurable submitted value

## Installation

Install the bundle via composer and update your database afterwards:

```
composer require heimrichhannot/contao-form-fields-collection-bundle
```

## Usage

After install you'll find new form field types.

### Date/Time field

![Frontend output of Date time widget](docs%2Fimg%2Fscreenshot_datetime_frontend.png)

Select the field type "Date/ time" and select the format (date or time).

![screeenshot_datetime.png](docs%2Fimg%2Fscreeenshot_datetime.png)

### Single Checkbox field

Select the field type "Checkbox Single". Then configure the checkbox label in the `text` field and, if needed, define a
custom submitted value in the `value` field. If no value is set, the checkbox submits `1`.

Like other Contao form fields, you can also mark the checkbox as mandatory and provide a help text.

![Frontend Output Checkbox Single](docs/img/screenshot_checkbox.png)

#### Customize

The template is made to be customized. Following variables are available:

| Variable                  | Description                                                 |
|---------------------------|-------------------------------------------------------------|
| option_wrapper_element    | (string) Default 'span'                                     |
| option_wrapper_attributes | (HtmlAttributes\|null) The wrapper element attributes       |
| checkbox_attributes       | (HtmlAttributes\|null) The checkbox element attributes      |
| label_attributes          | (HtmlAttributes\|null) The label element attributes         |
| error_wrapper_element     | (string) Default 'p'                                        |
| error_wrapper_attributes  | (HtmlAttributes\|null) The error wrapper element attributes |


Example:
```php
// Make it a bootstrap 5 one:
<?php
$this->extend('form_huh_single_checkbox');
$this->option_wrapper_element = 'div';
$this->option_wrapper_attributes = $this->attrs()->addClass('form-check')->mergeWith($this->wrapperElementAttributes);
$this->checkbox_attributes = $this->attrs()->addClass('form-check-input')->mergeWith($this->checkbox_attributes ?: []);
$this->label_attributes = $this->attrs()->addClass('form-check-label')->mergeWith($this->label_attributes);
?>
```

> [!TIP]
> To make an overridden template like [form_huh_single_checkbox_bs5.html5](contao/templates/elements/form_huh_single_checkbox_bs5.html5) the project default,
> create twig template to extend it:
> ```twig
> {# contao/templates/twig/form_huh_single_checkbox.html.twig #}
> {% extends '@Contao/form_huh_single_checkbox_bs5.html5' %}
> ```