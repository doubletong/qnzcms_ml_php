// Place third party dependencies in the lib folder
//
// Configure loading modules from the lib directory,
// except 'app' ones, 
requirejs.config({
     urlArgs: "bust=" + (new Date()).getTime(),
    "baseUrl": "/js/lib",
    "waitSeconds": 200,
    "paths": {
        "app": "../app",
        jquery: 'jquery-2.1.3',
        "mediaelementjs":'mediaelement/mediaelement-and-player.min',
        "toastr":'toastr/toastr',
        "notifier":"notifier.min",
        "jquery.validate":"jquery.validate.min"
    },
    "shim": {
        "jquery.appear": ["jquery"],
        "jquery.bbiSlider": ["jquery"],
        "mediaelementjs": ["jquery"],
        "toastr":["jquery"],
        "notifier":["jquery"],
        "jquery.validate":["jquery"]


    }
    
});

// Load the main app module to start the app
requirejs(["app/main"]);

