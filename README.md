Simplei18nBundle
================

###Install with composer

    {
        "require": {
            "juanber84/simplei18nbundle": "dev-master"
        }
    }


Compatible with http://symfony.com/doc/current/cookbook/session/locale_sticky_session.html

Add in your app/AppKernel.php

```php
<?php

   // app/AppKernel.php
   public function registerBundles()
   {
     return array(
       // ...
        new Juanber84\Bundle\Simplei18nBundle\Juanber84Simplei18nBundle(),
       // ...
     );
   }
```
Add in your app/routing.yml

	juanber84_simplei18n:
	    resource: "@Juanber84Simplei18nBundle/Resources/config/routing.yml"
	    prefix:   /

###Use it

Put the next twig code in the header of your layout:

    {{ language('es') }} // If you used this it will convert to the language which you've inserted
    {{ language() }}     // If you used this it will convert to the language which _locale var session

Use the widget where you would show it:

    {{ simplei18n(['es', 'en', 'pt', 'it'] )|raw }}

Make your custom widget using the path:

    {{ path('juanber84_simplei18n_changelocale', {'locale': 'es'}) }}