# Tiny Restaurant

## Run locally

Firstly, we have to configure the environment. To do this, create a duplicate of the `.env.example` file and rename it to `.env`. Then, open this file and change the variables to those suiting your environment.

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

To fix linting issues, use the following command:

``` bash
php tools/php-cs-fixer/vendor/bin/php-cs-fixer fix
```

## Style guide Tiny Restaurant

All pages should follow the new [Design](https://www.figma.com/file/bNZsokOLB7Pk2AQjaNB3Hv/Tiny-Restaurant?node-id=207%3A275)

Almost no custom CSS is needed, just use the [Bulma classes](https://bulma.io/documentation/)

All variables for the new design are specified in the ```_vars.scss``` file
