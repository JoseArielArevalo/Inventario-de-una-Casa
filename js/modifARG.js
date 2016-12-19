
var app = angular.module('app', []);
app.controller('appCtrl', function($scope, $http) {
  var vm = this;
  vm.fdatos = {};
  var valores;

  var urlQuery=window.location.search;
  urlQuery = urlQuery.substring(1);
  var datos = urlQuery.split("=");
  var dato = parseInt(datos[1]);
  var dato={id:dato};

  $http.get("./php/modifGet.php",{params:dato})
  .then(function(response) {
      console.log(response);
      $scope.articulo = response.data;
      var name = response.data[0];
      //$(document).ready(function(){
      $("#nombre").val(name.nombre);
      $('#precio').val(name.precio);
      $('#fecha_compra').val(name.fecha_compra);
      $('#vencimiento').val(name.fecha_vencimiento);
      $('#tipo').val(name.tipo);
      $('#categoria').val(name.categoria);
      $('#profundidad').val(name.profundidad);
      $('#estado').val(name.estado);
      $('#ubicacion').val(name.ubicacion);
      //});
  });

  
});