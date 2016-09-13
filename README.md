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
   - 5 movies (3 now showing, 2 coming soon) which are taken from Hoyts
   - 9 cinema locations (again, from Hoyts)
   - 20 movie sessions, which are generated for random movies/dates/theaters similarly to users
   
   To run these seeders, all you need to do is run:
   
   ```
   php artisan db:seed
   ```