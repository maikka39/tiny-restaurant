# Tiny Restaurant

## Run locally

Firstly, we have to configure the envioronment. To do this, create a duplicate of the `.env.example` file and rename it to `.env`. Then, open this file and change the variables to those suiting your environment.

Afterward run the following commands:

```bash
# Install php dependencies
composer install

# Install js dependencies
npm i

# Compile js files
npm run dev

# Generate an app key
php artisan key:generate

# Setup your database
php artisan migrate

# Create an admin account
php artisan twill:superadmin

# Setup the dusk chrome driver
php artisan dusk:chrome-driver

# Refresh route cache
php artisan route:cache

# Run the applicaten
php artisan serve
```

## Run tests

To run unit-tests use the following command:

```bash
php artisan test
```

For running the Dusk tests, use this command:

```bash
php artisan dusk
```

_Note: Make sure your php server is running before running this command._

# Style guide Tiny Restaurant
In this document, we describe the general styling rules to be applied when designing web pages for the Tiny Restaurant website.

It consists of: colors, typography, general layout rules and more.

## Colors
We created a color palette. Use these colors in all designs:

```
$primary: #327231;
$text: #ce6727;
$secondary: #221a06;
$background: #eeebe7;
```

![Color palette](https://i.imgur.com/Lwx88b0.png)

## Typography
We have selected a few fonts. Each font has it's own purpose on the site. To ensure compatibility across all browsers, Google Fonts are being used in all cases.

| Type          | Tag     | Name           | Style       |
|---------------|---------|----------------|-------------|
| Heading 1     | h1      | *Staatliches*  | Display     |
| Heading 2     | h2      | *Indie Flower* | Handwriting |
| Heading 3 - 6 | h3 - h6 | *Roboto*       | Sans        |
| Paragraphs    | p       | *Roboto*       | Sans        |

## Layout and spacing
As a general rule of thumb, all elements and sections should be spaced 1 unit.

This 1 unit is written as 1rem. This is translated to 16px by default. This size is adjustable in the theme.

When necessary, you can apply more or less space by using a value bigger or smaller then 1.

