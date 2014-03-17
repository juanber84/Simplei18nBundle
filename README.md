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