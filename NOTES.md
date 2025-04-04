Here we can add some notes or useful commands.

- Create a new controller:
  - symfony console make:controller NameOfTheComponentController
    - ***Note:*** the suffix "Controller" must be added.

- Recompile all assets (custom composer command)
  - symfony composer run-script compile-assets

- Load default users *** DEV ONLY ***
  - symfony console doctrine:fixtures:load
