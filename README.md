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
- Navigate to [http://localhost:8080](http://localhost:8080){:target="_blank"}
- Create a new database and import the SQL dump file

## Website
- Navigate to [http://localhost:8000](http://localhost:8000){:target="_blank"}

# Development

## Gulp
- Install Gulp globally `$ npm install -g gulp`

## Browser Sync
- Navigate to the theme folder
- Install dependencies `$ npm install`
- Run `$ gulp`

## PHP Coding Standards Fixer
- Install VS Code extension `php cs fixer`
- Configure the extension to execute on save
- For more info please refer to [https://github.com/FriendsOfPHP/PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer){:target="_blank"}
