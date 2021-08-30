Changes
-----------
I made the following modifications to the original code developed during the live session:

- I added **composer** dependency manager. It has the advantage of class auto-loading. So instead of having multiple ``require_once`` statements, what I just did is include ``require_once "vendor/autoload.php";`` only once and all classes will be auto-loaded.
- I added tests using the **PHPUnit** package.

Installation
----------------
- From the root of the folder, ``i.e same level as composer.json``, run ``composer install`` to install the PHPUnit package.

Running Tests
-------------
- From the root of the application, run ``./vendor/bin/phpunit Test``. This will run all the tests in the ``Test`` folder

Running App
-----------
- Run ``php App.php`` command from the root folder.
