var app = angular.module('misCategorias', []);
app.controller('misArticulos', function($scope, $http) {
  $http.get("../php/productos.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var tamano = $scope.categoria.length;
      console.log(tamano);
      $scope.total=tamano; 
  });
})

app.controller('misAlertas', function($scope, $http) {
  $http.get("../php/productos_en_alerta.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var tamano = $scope.categoria.length;
      console.log(tamano);
      $scope.cantidad=tamano;      
  });
})

app.controller('capital', function($scope, $http) {
  $http.get("../php/capital/capital.php")
  .then(function(response) {
    $scope.categoria = response.data;    
    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var f=new Date();
    $scope.dia = f.getDate();
    $scope.mes = meses[f.getMonth()];
    $scope.anio = f.getFullYear();
  });
})

app.controller('productosVencidos', function($scope, $http) {
  $http.get("../php/productos_vencidos.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var tamano = $scope.categoria.length;
      console.log(tamano);
      $scope.cantidad=tamano;      
  });
})

app.controller('totalCategorias', function($scope, $http) {
  $http.get("../php/capital/total.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var tamano = $scope.categoria.length;
      console.log(tamano);
      var c = new Array ("sala","recamara","cocina","baño");
      $scope.categoria1 = c[0];
      $scope.categoria2 = c[1];
      $scope.categoria3 = c[2];
      $scope.categoria4 = c[3];

      var categorias = new Array();
      categorias=$scope.categoria;
      $scope.sala = categorias[0];
      $scope.recamara = categorias[1];
      $scope.cocina = categorias[2];
      $scope.bano = categorias[3];
      $scope.cantidad=tamano;      
  });
});




