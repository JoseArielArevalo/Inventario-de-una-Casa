var app = angular.module('misCategorias', []);
app.controller('misArticulos', function($scope, $http) {
  $http.get("../php/productos.php")
  .then(function(response) {
      $scope.categoria = response.data;
  });
});





