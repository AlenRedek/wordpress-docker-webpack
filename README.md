# Setup

## Installation

- Clone the repository `$ git clone <repository>`
- Download plugins & uploads folders from the remote `$ rsync -Phvrt <user>@<host>:/path/to/wordpress/wp-content/plugins|uploads/ wp-content/plugins|uploads/`

## Environment constants

- Update `.env` file

## Docker

- Build an image & run Docker container `$ docker-compose up`
- List all containers `$ docker container ls -a`
- Enter running container `$ docker container exec -it <container_name> bash`
- Restart containers `$ docker-compose restart`
- Shut down running containers `$ docker-compose down`
- Delete all persisted data within containers `$ docker-compose down --volume`

## Database

- Navigate to [http://localhost:8080](http://localhost:8080)
- Create a new database and import the SQL dump file

## Website

- Navigate to [http://localhost:8000](http://localhost:8000)

# Development

## Dependencies

- Navigate to the theme folder
- Install NPM dependencies `$ yarn install`
- Install Composer dependencies `$ composer install`

## Webpack

- Start watching for the file changes `$ yarn start`
- BrowserSync is listening on [http://localhost:3000](http://localhost:3000)

## iTermocil

- Alternatively, start the project by executing the specified commands `$ itermocil`
- Requires iTerm2 and iTermocil plugin

## VS Code

- `.vscode/extensions.json` contains the list of recommended extensions (ESLint, StyleLint, Prettier, PHPCS)

## Docs

- For more info please refer to [https://docs.google.com/document/d/1WquaBOUj46LQmYtc3Z6TriccGV0WkLQ11ix-Te9BgcM/edit?usp=sharing](https://docs.google.com/document/d/1WquaBOUj46LQmYtc3Z6TriccGV0WkLQ11ix-Te9BgcM/edit?usp=sharing)
