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
