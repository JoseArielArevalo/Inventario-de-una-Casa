var app = angular.module('misCategorias', []);
app.controller('misArticulos', function($scope, $http) {
  $http.get("../php/productos.php")
  .then(function(response) {
      $scope.categoria = response.data;
  });
})

app.controller('misAlertas', function($scope, $http) {
  $http.get("../php/productos_en_alerta.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var len = $scope.categoria.length;
      console.log(len);
      $scope.cantidad=len;      
  });
})

app.controller('capital', function($scope, $http) {
  $http.get("../php/capital.php")
  .then(function(response) {
      $scope.categoria = response.data;      
  });
})



