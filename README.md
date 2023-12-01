# Form Field Collection Bundle

This bundle add additional form fields to the contao form generator.

## Fields
* Date/Time field - Field of html type date or time with native pickers (if supported by browser)
* Success Message Field - Displays a success message after form submission

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

### Success Message field

Select the field type "Success Message" and enter the message you want to display after form submission.

![screenshot_successmessage_backend.png](docs%2Fimg%2Fscreenshot_successmessage_backend.png)