# WDA-2

## Basic Setup

1. Laravel's config file, `.env` is excluded on purpose, so you'll need to create your own in the project root. You can simply copy the contents of `.env.example` to a new file to do so.
2. Next, you'll need to use Composer to install the required dependencies. You can do this via `php composer.phar install`
3. Set your `APP_KEY` by running

   ```
   php artisan key:generate
   ```

## Database Setup

*You can find a [schema diagram for this DB here.](https://trello.com/c/b1dh1LZN)*

1. Laravel expects our SQLite database to be called `database.sqlite`, so you'll have to create it first:
   
   `cd` into the `database/` directory and run:
   
   ```
   touch database.sqlite
   ```

2. Next, you'll have to point Laravel to the actual DB in the `.env` file.

   Set the `DB_DATABASE` property to the *absolute* path of the `database.sqlite` file.
   
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/your/database.sqlite
   ```
   
3. Now that our database is created, we need to create tables by running our migrations via:

   ```
   php artisan migrate
   ```
   
4. You can now populate our DB with some starting data, via *seeders* which can be found in `database/seeds/`

   Currently, our seeders populate the DB with the following:

   - 20 users, whose details are generated randomly via the `Faker` library
   - 8 movies (5 now showing, 3 coming soon) which are taken from Hoyts
   - 9 cinema locations (again, from Hoyts)
   - 20 movie sessions, which are generated for random movies/dates/theaters similarly to users
   
   To run these seeders, all you need to do is run:
   
   ```
   php artisan db:seed
   ```
   
## Database Updating

### Handling updates to the seeders

**WARNING**: Note that this will rollback and re-run *all of our migrations*, so **any changes you have made to the database via the application will be lost** (e.g. new users you may have
registered, bookings made via the application, etc.) 

Occasionally, we may need to add/remove stuff from our `seeders` to update the entries in our database.

If any of the seeders have been updated, you can use this command to "refresh" our database with these new changes:

```
php artisan migrate:refresh --seed
```

If you require any specific entries to persist (even after running this command), you can do so by editing the seeders as necessary.

## Unit Test Usage

So that our tests don't interfere with the production database (`database.sqlite`), an in-memory SQLite database is used for testing, and is defined in `config/database.php` under `connections`.

Note that this database is still dependent on the migrations/seeds that we use in production - it is designed to be a reflection of a "fresh" state of our application.

To run these tests, open the Terminal in PHPStorm and simply run `phpunit`.