Dolivel package scaffold
====

## How to
1. Create a new laravel project with composer.
2. Inside the root of your project, create the following path ```/packages/novadevs```
3. Go inside and run the ```composer init``` command.
3. Add to this path (/packages/novadevs) the following scaffold (you can clone this project)

#### Package structure
    <module-name>
    ├── README.md
    ├── src
    │   ├── Commands
    │   │   └── InstallModule.php
    │   ├── Database
    │   │   └── migrations
    │   ├── Models
    │   ├── Controllers
    │   ├── YourModuleNameServiceProvider.php
    │   ├── config
    │   │   └── mod-conf.php
    │   ├── public
    │   │   ├── css
    │   │   └── js
    │   ├── resources
    │   │   ├── assets
    │   │   ├── lang
    │   │   │   ├── en.json
    │   │   │   └── es.json
    │   │   └── views
    │   └── routes
    │       └── web.php
    └── webpack.mix.js
4. Customize your package composer.josn file, it should looks as follows (keep in mind that you'll need to replace some <....> stuff):
 

#### Sample of package's composer.json
```/packages/novadevs/<package-name>/composer.json```
```
{
    "name": "dolivel/<module-name>",
    "description": "<module-description>",
    "type": "project",
    "license": "GPL",
    "authors": [
        {
            "name": "<your-name>",
            "email": "<your-email>",
            "role": "Developer"
        },
        {
            "name": "Novadevs",
            "email": "info@novadevs.com",
            "homepage": "https://novadevs.com",
            "role": "Company"
        }
    ],
    "minimum-stability": "dev",
    "require": {
        "php" : ">= 5.6.4",
        "laravel/framework": ">= 5.6",
        "illuminate/auth": ">= 5"
    },
    "require-dev": {
        "phpunit/phpunit" : "~5.0"
    },
    "autoload": {
        "psr-4": {
            "Novadevs\\Dolivel\\<module-name>\\": "src"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Novadevs\\Dolivel\\<module-name>\\Tests\\": "tests"
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "Novadevs\\Dolivel\\<module-name>\\<module-name>ServiceProvider"
            ]
        }
    }
}
```
       
5. Update your Laravel project's main composer.json file, and add a custom repository wich points to your previously created path (/packages/novadevs).
6. Finally, rom you Laravel's project root, run
    ```composer require novadevs/nombre_paquete @dev```
    This will 'install' your packagem, I mean, it will register your custom service provider by the autodiscover feature.