# WordPress Starter Theme

Blank starter theme for WordPress. It has some useful pre-built functions in there and some reset CSS.

## Installation

1.  Download or clone the repo into your `wp-content/themes/your-theme-name`.
1.  `cd` into that directory and run `npm install`
1.  Run the `grunt` command to build and watch the scss and js files.

## Usage

### CSS

Grunt compiles the `scss/style.scss` file to the watches for any scss file to the `style.css` file and then minifies that file to `style.min.css`. Grunt will watch for changes to any .scss file in that folder and auto compile when you save.

The `functions.php` file enqueues the minified version of the file, but the original file is still needed so that WordPress can read the comments at the top of the non-minified file.

### JS

Grunt minifies the `js/functions.js` file to the `js/function.min.js` file. WordPress is enqueuing the minified file (`js/functions.min.js`). Grunt will watch the functions file for any changes and auto-compile on save.
