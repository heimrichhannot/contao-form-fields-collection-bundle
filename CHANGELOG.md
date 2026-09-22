# Changelog

All notable changes to this project will be documented in this file.

## [0.3.0] - 2026-09-22

- Added: Twig versions of `form_huh_datetime`, `form_huh_single_checkbox`, `form_huh_single_checkbox_bs5`, and `form_huh_successMessage`, based on Contao's core form templates. Existing `.html5` templates remain available.
- Added: Configurable `invisible_class` in the single-checkbox Twig template for visually hidden mandatory-field text.

- Changed: **Breaking:** raised the minimum PHP version from 8.2 to 8.4 and the minimum Contao version from 5.3 to 5.7.
- Changed: The Bootstrap 5 Twig variant uses `visually-hidden` and extends the bundle's base template through its bundle-specific namespace, allowing a project default override without circular inheritance.
- Changed: Moved `be_tinyMCE_option.html.twig` into `contao/templates/twig/` and added the `.twig-root` marker; the template name remains unchanged.

- Removed: **Breaking:** removed the SingleCheckboxWidget template variable aliases deprecated in 0.2.2 from both PHP and Twig templates. Update custom templates as follows:
  - `errorAttributes` → `error_wrapper_attributes`
  - `wrapperElementAttributes` → `option_wrapper_attributes`
  - `checkboxAttributes` → `checkbox_attributes`

## [0.2.2] - 2026-07-01

- Added: Bootstrap 5 template variant for SingleCheckboxWidget
- Added: template variable to style the label of SingleCheckboxWidget
- Changed: updated variable names for customizing SingleCheckboxWidget (old ones are supported but deprecated)
  Adjust your templates accordingly:
  - `errorAttributes` -> `error_wrapper_attributes`
  - `wrapperElementAttributes` -> `option_wrapper_attributes`
  - `checkboxAttributes` -> `checkbox_attributes`
- Fixed: option wrapper element used for error wrapper

## [0.2.1] - 2026-06-30

- Changed: make the error message customizable for SingleCheckboxWidget
- Changed: show pickers in the backend for DateTimeWidget
- Fixed: the remaining occurs where the value of DateTimeWidget gets lost

## [0.2.0] - 2026-06-30

- Changed: drop contao 4 support
- Changed: drop php 8.1 support
- Removed: SuccessMessageWidget

## [0.1.10] - 2026-06-30

- Fixed: mandatory evaluation for single checkbox field type (especially when overriding template with twig) ([#3](https://github.com/heimrichhannot/contao-form-fields-collection-bundle/pull/3))
- Fixed: value of DateTimeWidget get lost on errors
- Fixed: name attribute of SingleCheckboxWidget if template is overridden with a twig template

## [0.1.9] - 2026-04-10

- Added: single checkbox field type ([#1](https://github.com/heimrichhannot/contao-form-fields-collection-bundle/pull/1))

## [0.1.8] - 2026-03-30

- Changed: allow symfony 7

## [0.1.7] - 2026-02-06

- Changed: enhance leads support

## [0.1.6] - 2025-11-10

- Fixed: implicitly nullable warning
- Fixed: missing return type declaration

## [0.1.5] - 2025-10-24

- Fixed: compatibility issue with contao 5 for date widget

## [0.1.4] - 2024-07-31

- Fixed: possible exception in DateTimeWidget when value is null

## [0.1.3] - 2024-01-02

- Fixed: compatibility issue with symfony 6
- Fixed: invalid class import
- Fixed: missing success message template

## [0.1.2] - 2023-12-07

- Changed: make successMassage text field mandatory
- Fixed: possible exception in datetime widget
- Fixed: successMessage rendering order

## [0.1.1] - 2023-12-01

- Fixed: added missing default template for SuccessMessageWidget
- Fixed: success message not removed after show up

## [0.1.0] - 2023-12-01

- Added: Initial version.
