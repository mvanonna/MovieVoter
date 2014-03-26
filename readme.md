MovieVoter
==========

A simple application for generating a *To Watch* list of movies between a small group of friends.
Submitted movies can be up- or down-voted by the users.

Movies can be submitted using a search tool which leverages the [Themoviedb](http://www.themoviedb.org/) API ([API Documentation](http://www.themoviedb.org/documentation/api)).
This API will provide basic movie information and assets.

After submitting a movie, ratings will be grabbed from IMDB and RottenTomatoes using the following API's:
* [The Open Movie Database API ](http://www.omdbapi.com/) (IMDB)
* [RottenTomatoes](http://developer.rottentomatoes.com/)

Installation
------------
##### Clone the project
```bash
$ git clone https://github.com/Bogardo/MovieVoter.git .
```
##### Run composer install command
```bash
$ composer install
```

##### Setup configuration files
 
Create a local configuration folder
```
app/config/local
```

Copy the following files to `app/config/local`:

- `app/config/app.php` **to** `app/config/local/app.php`
- `app/config/database.php` **to** `app/config/local/database.php`
- `app/config/movievote.php` **to** `app/config/local/movievote.php`

In `app/config/local/app.php`:
- Set `debug` to `true`
- Set `url` to your local development domain (`dev.movievote.com`)
- Add the following ServiceProviders to the `providers`:
```php
'Way\Generators\GeneratorsServiceProvider',
'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
```
> These ServiceProviders are only for development purposes 

In `app/config/local/database.php`:
- Add your local database configuration

In `app/config/movievote.php`:
- Add your API keys for the specified services

##### Setup local environment

Add the following to your vhost configuration (just below `ServerName domain.com`):
```
SetEnv LARAVEL_ENV local
```

> You could also set the environment variable to your Windows configuration
> But this doesn't always seem to work, so the vhost SetEnv is preferred

Usage
-----

### CSS/SCSS
Styling is done using SASS (SCSS syntax).
SASS files can be found in `public/assets/scss`

A `config.rb` is present in the root directory.
This contains the default configuration for Sass and Compass.
> If you're using **Koala** then point it to the project root directory.

### Code

##### IDE Helper
To generate an IDE helper run the following to generate a helper file:
```bash
$ php artisan ide-helper:generate
```