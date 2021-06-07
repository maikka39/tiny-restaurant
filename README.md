# Tiny Restaurant

## Run locally

Firstly, we have to configure the environment. To do this, create a duplicate of the `.env.example` file and rename it to `.env`. Then, open this file and
change the variables to those suiting your environment.

Afterwards, run the following commands:

```bash
# Install php dependencies
composer install

# Install js dependencies
npm i

# Compile js files
npm run dev

# Build Twill files
php artisan twill:build

# Publish lang files (enter 'yes' when asked)
php artisan lang:publish

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

### Setup tools

Setup tools used for development

```bash
composer install --working-dir=tools/php-cs-fixer
```

### Run tests

To run unit-tests use the following command:

```bash
php artisan test
```

For running the Dusk tests, use this command:

```bash
php artisan dusk
```

_Note: Make sure your php server is running before running this command. You also need to have Google Chrome installed on your computer._

### Linting

This project has linters for PHP and SCSS.

#### PHP

To fix linting issues, use the following command:

``` bash
php tools/php-cs-fixer/vendor/bin/php-cs-fixer fix
```

#### Stylelint

Be sure to install a [stylelint plugin](https://stylelint.io/user-guide/integrations/editor) for your IDE. Use the following command to lint specific files.

``` bash
stylelint {path} --fix
```

## Style guide Tiny Restaurant

All pages should follow the new [Design](https://www.figma.com/file/bNZsokOLB7Pk2AQjaNB3Hv/Tiny-Restaurant?node-id=207%3A275)

Almost no custom CSS is needed, just use the [Bulma classes](https://bulma.io/documentation/)

All variables for the new design are specified in the ```_vars.scss``` file
