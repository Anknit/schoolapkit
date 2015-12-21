(function () {
    "use strict";
    var app = angular.module('schoolap', ['ngRoute']);
    app.config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                controller: 'homeController',
                templateUrl: 'template/home.html'
            })
            .when('/schools/:basic', {
                controller: 'schoolController',
                templateUrl: 'template/school.html'
            })
/*
            .when('/result/class/10', {
                controller: '',
                templateUrl: ''
            })
            .when('/result/class/12', {
                controller: '',
                templateUrl: ''
            })
            .when('/result/internal', {
                controller: '',
                templateUrl: ''
            })
            .when('/compare', {
                controller: '',
                templateUrl: ''
            })
            .when('/ranking', {
                controller: '',
                templateUrl: ''
            })
            .when('/admission/process', {
                controller: '',
                templateUrl: ''
            })
            .when('/admission/apply', {
                controller: '',
                templateUrl: ''
            })
            .when('/scholarship/central', {
                controller: '',
                templateUrl: ''
            })
            .when('/scholarship/state', {
                controller: '',
                templateUrl: ''
            })
            .when('/scholarship/private', {
                controller: '',
                templateUrl: ''
            })
            .when('/joblist', {
                controller: '',
                templateUrl: ''
            })
            .when('/appStatus', {
                controller: '',
                templateUrl: ''
            })
            .when('/signup', {
                controller: '',
                templateUrl: ''
            })
*/
            .otherwise({ redirectTo: '/'});
    });
}());