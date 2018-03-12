# Qordoba API Client library for PHP

## Description

The Qordoba API Client library enables you to work with Qordoba project translation services on the fly.

## Requirements
- PHP 5.6 or higher

## Installation

You can use Composer or simply Download from Source

### Composer

The preferred method is via composer. Follow the installation instructions if you do not already have composer installed.

Once composer is installed, execute the following command in your project root to install this library:

`composer require qordoba/qordobaphp:^*`

Finally, be sure to include the autoloader:

`require_once '/path/to/your-project/vendor/autoload.php';`

### Download the Source

If you abhor using composer, you can clone repositore with the package in its entirety.

`git clone git@path.to.git.repo.com/qordoba-php-library.git`

Install everything needed in this repo with composer:

`cd qordoba-php-library && composer install`

Include the autoloader in your project:

`require_once '/path/to/qordoba-php-library/vendor/autoload.php';`
For additional installation and setup instructions, see the documentation.

## Examples

See the examples/ directory for examples of the key client features. You can view them in your browser by running the php built-in web server.

`$ php -S localhost:8000 -t examples/`
### Basic Example
And then browsing to the host and port you specified (in the above example, http://localhost:8000).

```php
    $login = ""; // Qordoba Username
    $pass = ""; // Qordoba pass
    $apiUrl = ""; // Usually https://app.qordoba.com/api/
    $projectId = ""; // Your Qordoba project ID
    $orgId = ""; // Your Qordoba Organization ID

    $Doc = new Qordoba\Document($apiUrl, $login, $pass, $projectId, $orgId);
    $Doc->setName("Translation Test");

    $Doc->addTranslationString("test", "New Test String");
    ...
    $Doc->createTranslation();
```

## Authentication with Login / Password
Unfortunately, this lient require direct retrieving authorization key from regulaer Authentication procedure, so your username and password must be provided directly to API. You can see this in example above. Method to allow key-based application authorization will be added in the future.

## Creating translation object
While you try to create Document object - yuo need to pass 4 parameters for into your new Object - Your Qordoba username / pass, Qordoba Project ID and Qordoba Authorization ID. Also to get tranlations you need to set Name, which will be used later as lltpx
```
$Doc = new Qordoba\Document($apiUrl, $login, $pass, $projectId, $orgId);
$Doc->setName("Translation Test");
```
## Forming translation strings / JSON
Library dedicates structure to handle tranlation strings createion and update routines.

First of all - set appropriate doument type:
```
$Doc->setType('json');
```

Add new Section:
```
$Section = $Doc->addSsection("Product")
```

Add new string to Section
```
$TestString = $Section->addTranslationString('test', 'Test this for translate')
```
Or
```
$TestString = new TranslationString('test', 'Test this for translate');
$Section->addTranslationString($TestString);
```

Update String using it own method
```
$TestString->update('Testing this updated thing');
```

Update String uing Section object:
```
$Section->updateTranslationString('test', 'Testing double this updated thing')
```

Removing String using Section methods
```
$Section->removeTranslationString('test');
```

Removing string through it own method
```
$TestString->unlink();
```

## Forming translation content / HTML
Set Document type for HTML translation:
```
$Doc->setType('html');
```

Appending content to Document:
```
$Doc->addTranslationContent("<html><body><div>Testing Content</div><div>Another Testing Content</div></body></html>");
```


## Sending formed document for translation

Next method will send your translation strings to Qordoba service as new files with "New" tag.
```
$Doc->createTranslation();
```
It will fail with various kind of exceptions if something will goes wrong.
Returns true if translated strings is sended.

## Updating exist document
You can assign existed name to Trandslation document and update it in Qordoba with new version.
To do this - form sended tring structure as usual, sen Project name and set different version Tag for it.
```
$Doc = new Qordoba\Document($apiUrl, $login, $pass, $projectId, $orgId);
$Doc->setName('Translation Test`);
$Doc->setTag('Updated_Version');
$Doc->updateTranslation();
```

## Checking translation status

To check status of current translation just form Doc as uual and call 
```
$Doc->checkTranslation($langCode);
```
Passing language code parameter (Qordoba internal string like `en-us`) to this method will force checking for particular language, while without this parameters all project languages will be checked.

## Retrieving translation

Submitted structures can be retrieved back with next call:
```
$Doc->fetchTranslation($langCode);
```
Passing language code parameter (Qordoba internal string like `en-us`) to this method will force retrieving structure for particular language, while without this parameter all project languages will be fetched in a form of array.

## Additional information

### Languages

All available languages can be fetched in next way:
```
$Doc->getMetadata();
```

All available project languages can be received through Project object with next method
```
$Doc->getProjectLanguages();
```

## Connection
Connection object can be accessed from Document with dedicated getter:
```
$conn = $Doc->getConnection();
```
Please use this object carefully, because with proper synchronization with Document this object will broke your translation sending sequence.

## Updating tokens

Currently no need to update tokens - Library forced to request new key every time you launch it and store key only till the end of session. If you really need to cache your keys and update it after, and leverage amount of key's requests - you can do it in next way:

```
$conn = $Doc->getConnection();
$key = $conn->requestAuthToken();
save_key_somewhere($key);
...
$key = retrieve_key_from_local_storage();
$conn = $Doc->getConnection();
$conn->setApiKey($key);
```

Exception with API error will be generated if key will expire, so keep this in mind. In this case just generate new token and store it as usual.

# Code Quality

Run the PHPUnit tests with PHPUnit. 

`phpunit tests/`


