@todo create a small intro

# Requirements
- A webserver (local or online) ou Symfony CLI (local)
    - For the Symfony CLI, make sure this executable and PHP 8.3.x are available in the PATH variable
- PHP 8.3.x
- SQLite 3.x
- Composer 2.x
- For more details, see https://symfony.com/doc/current/setup.html

# Instructions
- Make sure the webserver or Symfony CLI are working correctly, with PHP 8.2.x
- For development, create and edit a blank file with the name .env.dev.local, and copy the variable "DATABASE_URL" with the DB credencials. This file is yours, and it will be ignored by git
- At the command line, run:
    - symfony composer install
    - symfony local:check:requirements
        - This validates the minimum requirements for running a symfony project
    - symfony local:check:security
        - This validates the security of the environment used for running the project
    - symfony console doctrine:migrations:migrate
        - If this command fails, check the DATABASE_URL value in the .env.dev.local file. If the variable does not exists, copy it from the .env to .env.local
    - symfony console doctrine:fixtures:load
        - This initializes the data used by the app
    - symfony server:start
        - This step is used only if the Symfony CLI is not available
        - If there are more than one PHP version, create an empty file ".php-version" in the root of the project or any its parents, and write "8.2" before saving it
        - To stop the local server, run "symfony server:stop"
- To restart the database *** ONLY IN DEVELOPMENT ***, run "symfony console doctrine:fixtures:load" and type "yes"

# Demo users (username / password)
@todo create a list of users

# Here we can add some notes or useful commands.

- Create a new controller:
    - symfony console make:controller NameOfTheComponentController
        - ***Note:*** the suffix "Controller" must be added.

- Recompile all assets (custom composer command)
    - symfony composer run-script compile-assets

- Load default users *** DEV ONLY ***
    - symfony console doctrine:fixtures:load
