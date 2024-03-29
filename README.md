# Wordpress Docker Webpack

This project will help you build custom WordPress themes using:

- Docker environment
- Webpack automation
- ESNext latest features with Babel
- ESLint
- StyleLint
- Prettier
- PHP Code Sniffer
- Sass
- BrowserSync
- and so much more

## Setup

### Installation

- Clone the repository `$ git clone <repository>`
- Download plugins & uploads folders from the remote `$ rsync -Phvrt <user>@<host>:/path/to/wordpress/wp-content/plugins|uploads/ wp-content/plugins|uploads/`

### Environment constants

- Update `.env` file

### Docker

- Build an image & run Docker container `$ docker-compose up`
- List all containers `$ docker container ls -a`
- Enter running container `$ docker container exec -it <container_name> bash`
- Restart containers `$ docker-compose restart`
- Shut down running containers `$ docker-compose down`
- Delete all persisted data within containers `$ docker-compose down --volumes`

### Database

- Navigate to [http://localhost:8080](http://localhost:8080)
- Create a new database
- Optionally import the SQL dump file

### WordPress

- Navigate to [http://localhost:8000/wp-admin](http://localhost:8000/wp-admin)
- Activate the theme
- Update template name in `style.css` if necessary

### SMTP

- Create an account at Mailjet with your WP admin email
- Install plugin WP Mail SMTP
- Choose `Other SMTP Mailer`
- Use admin email with the option `Force From Email`
- Use SSL encryption on port 465

## Development

### Dependencies

- Navigate to the theme folder
- Install NPM dependencies `$ yarn install`
- Install Composer dependencies `$ composer install`

### Webpack

- Start watching for file changes `$ yarn start`
- BrowserSync is listening on [http://localhost:3000](http://localhost:3000)

### PHP Code Sniffer

- PHPCS does not support PHP version 8.0 and above

### VS Code

- `.vscode/extensions.json` contains the list of recommended extensions (ESLint, StyleLint, Prettier, PHPCS)

## Deployment

### Theme

- Exclude `node_modules` folder (required packages are already bundled inside the `assets/build` folder)
- Include `vendor` folder
- Upload everything else from the theme folder

### Database

- Manually export/import the modified content, settings and other data

## Upgrades

### NPM

- Navigate to the theme folder and open the `package.json` file
- Find the latest version for each dependency at [https://www.npmjs.com/](https://www.npmjs.com/)
- Change the dependency version number
- Update the dependencies with `$ yarn install`
- Check if all the scripts from the `package.json` file are working correctly
- Don't use the `~` and `^` identifiers
- Don't use the `$ yarn upgrade` command
- The dependencies installed in `node_modules` should strictly match the versions defined in `package.json`

### Composer

- Navigate to the theme folder and open the `composer.json` file
- Find the latest version for each dependency at [https://packagist.org/](https://packagist.org/)
- Change the dependency version number
- Update the dependencies with `$ composer update`
- Check if the PHP related scripts from the `package.json` file are working correctly

## References

### Docs

- For more info please refer to [https://medium.com/@alenredek/5dae5cc92f30](https://medium.com/@alenredek/5dae5cc92f30)

### Inspired by

- [https://www.npmjs.com/package/@wordpress/scripts/](https://www.npmjs.com/package/@wordpress/scripts/)
- [https://codeable.io/wordpress-developers-intro-to-docker-part-two/](https://codeable.io/wordpress-developers-intro-to-docker-part-two/)
