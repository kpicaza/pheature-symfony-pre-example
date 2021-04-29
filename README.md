# Pheature Driven Symfony Example

Welcome to our Symfony Toggle example, In this app we will explain how to use Pheature Flags library in an example ecommerce-like Symfony Web App.

In the following lines we will define the initial description of the ecommerce and also we will define a short of user-stories.

* *This is example app, every detail in the context, definition, and|or user-stories is fictional and created for learning purposes*

## Requirements

* PHP >= 8.0
* yarn  
* composer

## Install 

```bash
git clone git@github.com:kpicaza/pheature-symfony-pre-example.git
cd pheature-symfony-pre-example
composer upddate
yarn run encore production
php -S 127.0.0.1:8000 -t public ## Enjoy!!!
```

## Context

We are going to build a small ecommerce website for a local [amigurumi](https://en.wikipedia.org/wiki/Amigurumi) artisan.

To reduce the time to market, we will iterate over the program updating and adding the required use cases:

1. First iteration:

We will build a landing page with a few requirements:

- [x] It should show the arstisan's logo.
- [x] It should show the artisans's commercial name.
- [x] It should show some amigurumi pictures.
- [ ] It should show contact information.

2. Second iteration

- [ ] It should have products
- [ ] It should have a backoffice to add products
