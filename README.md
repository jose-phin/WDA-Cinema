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
   - 10 movies (5 now showing, 5 coming soon) which are taken from Hoyts
   - 9 cinema locations (again, from Hoyts)
   - 20 movie sessions, which are generated for random movies/dates/theaters similarly to users
   
   To run these seeders, all you need to do is run:
   
   ```
   php artisan db:seed
   ```
   
### Handling updates to the seeders

**WARNING**: Note that this will rollback and re-run *all of our migrations*, so **any changes you have made to the database via the application will be lost** (e.g. new users you may have
registered, bookings made via the application, etc.) 

Occasionally, we may need to add/remove stuff from our `seeders` to update the entries in our database.

If any of the seeders have been updated, you can use this command to "refresh" our database with these new changes:

```
php artisan migrate:refresh --seed
```

If you require any specific entries to persist (even after running this command), you can do so by editing the seeders as necessary.

## Route Endpoint Usage

### Users

#### GET /user/profile

Displays the profile of an authenticated user via the `user_profile` template.

When rendering this template, the route will provide two arrays that are accessible from the view:

- `$bookings` which holds the details of each booking a user has made
- `$wishes` which holds the details of each wish a user has made 

### Movies

#### GET /movies

Fetches all movies in the DB and renders the `movie` view.

### Sessions

#### GET /sessions/by_movie/{id}

Fetches all sessions for a **movie**, at *all* locations, and renders the `movie_sessions` template.

Accepts a single param `{id}` which is the ID of the movie.

When rendering the template, this route will provide a `$sessions` array that contains the details of each matching session.

#### GET /sessions/by_cinema/{id}

Fetches all sessions for a **cinema**, for *any* movie, and renders the `movie_sessions` template.

Accepts a single param `{id}` which is the ID of the cinema location.

When rendering the template, this route will provide a `$sessions` array that contains the details of each matching session.

### Cart and Bookings

#### GET /user/cart 

Renders the `cart` view and populates it with all items in a user's cart

#### POST /user/cart/add

Adds a new booking to an authenticated user's cart.

Request should include:

- `session_id`, which is the ID of the screening session the user wants to book
- `adult_qty`, the number of Adult tickets a user wants
- `child_qty`
- `concession_qty`

#### DELETE /user/cart/{id}

Removes a user's booking from the cart.

Accepts a param `id` which is the ID of the booking.

#### PUT /user/cart/update/{id}

Use this route to update the number of tickets for a user's booking in the cart.

Accepts a param `id` which is the ID of the booking.

Request should also include updated: `adult_qty`, `child_qty` and `concession_qty`

#### PUT /user/cart/checkout

Checks out the user's entire cart.

Currently, this route does not perform any validation. This will be added later.

### Wishes

#### RESOURCE /user/wish

This endpoint is handled by a RESTful controller, so all CRUD operations are passed to this endpoint. Currently, this endpoint only handles adding and deletion of a wish.

To **add a wish**, you simply need to provide the `user/wish` endpoint as the action parameter of your form:

```
<form method="POST" action="{{ url('user/wish') }}">
    {{ csrf_field() }}

    <input id="movie_id" type="text" name="movie_id">
    <button type="submit">Submit</button>
</form>
```

To **delete a wish**, you need to wrap whatever element you are using to handle deletion (e.g. a button) in a form:

```
<form method="POST" action="{{ url('user/wish/{id}') }}">
    {{ csrf_field() }}

    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Delete</button>
</form>
```

Where `{id}` is the ID of the wish you want to delete. Note that the hidden `<input>` tag is what Laravel uses to identify the HTTP verb of the request.

Note in both cases you must call the `csrf_field()` function at the start of the form as a CSRF token is passed to and validated by the controller after submission.

## Unit Test Usage

So that our tests don't interfere with the production database (`database.sqlite`), an in-memory SQLite database is used for testing, and is defined in `config/database.php` under `connections`.

Note that this database is still dependent on the migrations/seeds that we use in production - it is designed to be a reflection of a "fresh" state of our application.

To run these tests, open the Terminal in PHPStorm and simply run `phpunit`.