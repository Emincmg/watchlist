
## About Watchlist

This application is a watchlist application that has been assigned as a task from the company xenovo.com. All of its functions have been configured according to the documentation provided by xenovo.com. With this application, you can: 

- Browse through trending movies.
- Search your favourite movies.
- Make your own wathclist.
- Create and edit your profile.

## Installation

To perform the installation, you will need the following requirements:

- [Docker Desktop](https://www.docker.com/products/docker-desktop).
- [WSL 2](https://learn.microsoft.com/en-us/windows/wsl/install) Up and running with a Linux distro
- [PhpStorm](https://www.jetbrains.com/phpstorm/) or An IDE Compatible with Php Laravel framework.



### Installation Steps

1. First, clone this repository:

   ```bash
   git clone https://github.com/Emincmg/watchlist.git


2. Change into the project directory:

    ```bash
   cd watchlist

3. Install dependencies:

   ```bash
    composer install

4. Make sure Docker Desktop is installed and ready to be used with Laravel Sail.

5. Run the containers:

    ```bash
   ./vendor/bin/sail up 

6. Once the containers are up and running, you can access the Watchlist application in your web browser at http://localhost. But before that;

7. In the 'task-watchlist-laravel.test-1' container's terminal, run the migrations:

   ```bash
    php artisan migrate

Application now should be ready to use.

## Usage

1. Go to [http://localhost](http://localhost) to go to application landing page. It should look like this:

![Landing page](https://i.ibb.co/Czkcb65/Landing-Page.png)

2. You have to be registered to start making your watchlist. Press the login button on the top right corner. Now comes the log in page.

![Log in page](https://i.ibb.co/vcW0YB0/Login-Page.png)

3. After you have successfully registered your profile (or logged in), you should be able to see search movies navigation button on the top. Go ahead and click it.

![Logged in](https://i.ibb.co/FJD8JzB/Logged-in.png)

4. In this page you can start by either making a search for a certain movie or pick one from the trending movies. In the movie card, click the "+" button on the bottom right to add this movie to your list.

![Search movies](https://i.ibb.co/jVb3j6X/Search-movie.png)

5. Now the movie should be saved to your watchlist. Add whatever movie you like and then navigate to your list by clicking My List on the navigation bar i have mentioned earlier.

![Movie saved](https://i.ibb.co/jR21PWw/Movie-saved.png)

6. In here you can manage your list by sorting, making a search or deleting. Enjoy!

   ![My list](https://i.ibb.co/XZYZdFW/my-list.png)
