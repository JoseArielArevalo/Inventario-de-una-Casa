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

app.controller('productosVencidos', function($scope, $http) {
  $http.get("../php/productos_vencidos.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var tamano = $scope.categoria.length;
      console.log(tamano);
      $scope.cantidad=tamano;      
  });
})

app.controller('appCtrl', function($scope, $http) {
  var vm = this;
  vm.fdatos = {};
  var valores;

  var urlQuery=window.location.search;
  urlQuery = urlQuery.substring(1);
  var datos = urlQuery.split("=");
  var dato = parseInt(datos[1]);
  vm.fdatos.id=dato;
  
  var dato={id:dato};
  

  $http.get("../php/modifGet.php",{params:dato})
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
  //console.log(vm);
  vm.modificar = function(){
          vm.fdatos.nombre=$("#nombre").val();
          vm.fdatos.precio=$("#precio").val();
          vm.fdatos.fecha_compra=$("#fecha_compra").val();
          vm.fdatos.vencimiento=$("#vencimiento").val();
          vm.fdatos.tipo=$("#tipo").val();
          vm.fdatos.categoria=$("#categoria").val();
          vm.fdatos.profundidad=$("#profundidad").val();
          vm.fdatos.estado=$("#estado").val();
          vm.fdatos.ubicacion=$("#ubicacion").val();
          console.log(vm.fdatos);
          $http.post("../php/modificar.php", vm.fdatos)
            .success(function(res){
              var a = res.substring(1);

              if (a == 'modificado') {
                alert('Se ha modificado correctamente');
                location.reload(true);
                
              }else{
                alert('Ocurrio un error al modificar.!!');
              }
              console.log(a);
              //por supuesto podrás volcar la respuesta al modelo con algo como vm.res = res;
            });  
        }
  
});


