# Installation

## GIT
- Clone the repository `$ git clone <repository>`

## Rsync
- Download folders plugins / uploads `$ rsync -Phvrt <user>@<host>:/path/to/wordpress/wp-content/plugins|uploads/ wp-content/plugins|uploads/`
- Use FTP client if you don't have the SSH access

## Environment constants
- Update `.env` file according to your needs

## Docker
- Build an image & run Docker container `$ docker-compose up`
- List all containers `$ docker container ls -a`
- Enter running container `$ docker container exec -it <container_name> bash`
- Restart containers `$ docker-compose restart`
- Shut down running containers `$ docker-compose down`
- Delete all persisted data within containers `$ docker-compose down --volume`

## Database
- Navigate to [http://localhost:8080](http://localhost:8080)
- Create a new database and import the SQL dump file.

## Website
- Navigate to [http://localhost:8000](http://localhost:8000)

# Developing with Gulp and Browser Sync

## Gulp
- Install Gulp globally `$ npm install -g gulp`

## Browser Sync
- Navigate to theme folder
- Install dependencies `$ npm install`
- Run `$ gulp`
