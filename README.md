# Bootstrap 5 with sass and gulp 4

A Bootstrap v5.2.3, sass, gulp 4.

## Pre-requisite

- [Node.js](https://nodejs.org/en/download/ "Node Js") >= 17.0.0
- NPM (Comes with Node.js)
- [Gulp 4](https://gulpjs.com/ "Gulp")

If you don`t have gulp -> Install Gulp cli

npm install --global gulp-cli

## Getting started

1. Install all dependencies and libraries:
   `npm install`

2. Run Gulp Task:

- `gulp dev` - Starts a local server with browserSync and hot reloading on changes to files (HTML, SCSS, JS).
<!-- - `gulp` - Start Compiling files for production. -->

3. Add JS Files

- If you need to add another js file, you need to add it in the gulpfile.js, in the minifyjs function
