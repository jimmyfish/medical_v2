Medical v2
========================

Welcome to Medical project with Symfony v3.3

Before you go, please install necessary package from composer

```
composer install -vvv
```

Clear cache before start

```
php bin/console cache:clear --no-warmup
```

And don't forget to configure the `app/config/parameters.yml` and specify the right credential for Database

After configuration you must update the database structure for necessary project sequence

```
php bin/console doctrine:schema:update --force
```

Workflow
========

Before you go do the following :

``
git pull --rebase
``

to make sure your work is up-to-date with main project

if necessary do ` composer update `, and ` composer run-script post-install-cmd `

Directory Listing
===

```
.
app
└─ Resource
     └─ views
          └─ default -> Containt Base Layout
  ...
  AppKernel.php -> Main Kernel of Application
...
src
└─ AppBundle
    └─ Controller -> CONTROLLER
    └─ Entity -> MODEL
    └─ Form -> FORM
    └─ Resource
        └─ config
            └─ doctrine  -> DB TABLE CONFIG
            ...
        └─ routing -> ROUTING
        └─ views -> VIEW per PAGE
...
web
└─ app.php -> Front-Controller
...
composer.json -> Composer init required library
...
```
