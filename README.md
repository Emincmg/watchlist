
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

Go to [http://localhost](http://localhost) to go to application landing page. It should look like this:
(https://ibb.co/Vt71gxW)
