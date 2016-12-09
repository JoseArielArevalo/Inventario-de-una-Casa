var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "vistas/portada.html"
    })
    .when("/portada", {
        templateUrl : "vistas/portada.html"
    })
    .when("/registrar", {
        templateUrl : ""
    })
    .when("/categorias", {
        templateUrl : ""
    })
    .when("/almacen", {
        templateUrl : ""
    })
    .when("/reportes", {
        templateUrl : ""
    })
    .when("/ayuda", {
        templateUrl : ""
    });
});
