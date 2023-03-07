//Run scripts added in global no global.js
var app = {};

/* eslint-disable */
'use strict';

let theme = {
    init: () => {
        console.log("Scripts Ejected")
        //Add your custom scripts
        theme.appScripts();
    },
    // Some specific function
    appScripts: function () {
        console.log("Some specific function");
    }
}
/**
 * Init theme core
 */
theme.init();