
<div align="center">## About Watchlist</div>

This application is a watchlist application that has been assigned as a task from the company xenovo.com. All of its functions have been configured according to the documentation provided by xenovo.com. With this application, you can: 

- Browse through trending movies.
- Search your favourite movies.
- Make your own wathclist.
- Create and edit your profile.

<div align="center">## Installation</div>

To perform the installation, you will need the following requirements:

- [Docker Desktop](https://www.docker.com/products/docker-desktop).
- [WSL 2](https://learn.microsoft.com/en-us/windows/wsl/install) Up and running with a Linux distro
- [PhpStorm](https://www.jetbrains.com/phpstorm/) or An IDE Compatible with Php Laravel framework.



  <div align="center">### Installation Steps</div>

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
   ./vendor/bin/sail up -d

6. Once the containers are up and running, you can access the Watchlist application in your web browser at http://localhost. The application should now be ready to use.

