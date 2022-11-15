# Wordpress Front-end Boilerplate -> Sass | Gulp 4 [here](https://github.com/thecodercoder/frontend-boilerplate)

Boilerplate used for simple front-end websites that use HTML, SCSS, and JavaScript. Using Gulp 4 to compile, prefix, and minify files.

## Quickstart guide

- Clone or download this Git repo onto your computer.
- Install Node.js => Node Version Recommended => 17.3.0
- Run `npm install`
- Run `gulp` to run the default Gulp task

In this project, Gulp is configured to run the following functions:

- Compile the SCSS files to CSS
- Autoprefix and minify the CSS file
- Concatenate the JS files
- Uglify the JS files
- Move final CSS files to the `/dist/css` folder
- Move final JS files to the `/dist/js` folder

### Support Bootstrap 5

If you need Bootstrap 5 - JS, inside enqueue.php remove the commented code referring to enqueue bootstrap5. That will dynamically call the script -> (bootstrap.min.js).

All bootstrap css files components are added inside (src/scss/assets/bootstrap5), however they aren't being called, if you need to add any css component, inside bootstrap5 you will find a file called (bootstrap.scss), there uncomment the components you need.

### Library's usage

Place your library's on Vendor folder. Gulp will compile and enqueue.php dynamic call the script -> (vendor.min.js).
