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

app.controller('historial', function($scope, $http) {
  $http.get("../php/historial.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var tamano = $scope.categoria.length;
      console.log(tamano);
      console.log(response.data[0].precio);
      var sum=0;
      response.data.forEach(function(item,index){
        sum += parseInt(item.precio);
      });
      console.log(sum);
      $scope.cantidad=tamano;
      $scope.total_precio = sum;

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

      $scope.tamanioSala = categorias[4];
      $scope.tamanioRecamara = categorias[5];
      $scope.tamanioCocina = categorias[6];
      $scope.tamanioBanio = categorias[7];
      $scope.cantidad=tamano;      
      $scope.porcentaje='%';
  });
})


app.controller('delCtrl',function($scope, $http){
  var vm = this;
  var urlQuery=window.location.search;
  urlQuery = urlQuery.substring(1);
  var urlQuery2=urlQuery.split("%20");
  console.log(urlQuery2);
  var dato1 = urlQuery2[0].split("=");
  var dato2 = urlQuery2[1].split("=");
  var id = parseInt(dato1[1]);
  var nombre = dato2[1];
  vm.fdatos={};
  vm.fdatos.id=id;
  vm.fdatos.nombre=nombre;

  $("#mensaje").append("<strong>id:   "+id+" <br />producto: "+nombre+"</strong>");
  vm.cancelar=function(){
      location.href='categorias.html';
  }

  vm.eliminar=function(){
    var pr=$("#precio").val();
    if(pr == ""){

      alert('debes ingresar el monto. Si no se obtuvo un monto, debe ingresar 0.0');
      location.reload(true);
      return;
    }
    vm.fdatos.precio=pr;
    console.log(id + nombre);
    console.log(vm.fdatos);
    $http.post("../php/eliminar.php", vm.fdatos)
            .success(function(res){
              var a = res.substring(0);
              if (a == 'eliminado') {
                alert('Se ha eliminado correctamente');
                location.href='categorias.html';
                
              }else{
                alert('Ocurrio un error al eliminar.!!');
                location.href="categorias.html";
              }
              console.log(a);
              //por supuesto podrás volcar la respuesta al modelo con algo como vm.res = res;
            });
  }
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
      //console.log(response);
      $scope.articulo = response.data;
      var name = response.data[0];
      //$(document).ready(function(){
      $("#nombre").val(name.nombre);
      $('#precio').val(name.precio);
      $('#fecha_compra').val(name.fecha_compra);
      console.log(name.fecha_compra);
      $('#vencimiento').val(name.fecha_vencimiento);
      $('#tipo').val(name.tipo);
      $('#categoria').val(name.categoria);
      $('#profundidad').val(name.profundidad);
      $('#estado').val(name.estado);
      $('#ubicacion').val(name.ubicacion);
      });


    //console.log(vm);

  vm.modificar = function(){
          console.log($("#nombre").val());
          vm.fdatos.nombre=$("#nombre").val();
          vm.fdatos.precio=$("#precio").val();
          vm.fdatos.fecha_compra=new Date($("#fecha_compra").val());
          vm.fdatos.vencimiento=new Date($("#vencimiento").val());
          vm.fdatos.tipo=$("#tipo").val();
          vm.fdatos.categoria=$("#categoria").val();
          vm.fdatos.profundidad=parseInt($("#profundidad").val());
          vm.fdatos.estado=$("#estado").val();
          vm.fdatos.ubicacion=$("#ubicacion").val();
          console.log(vm.fdatos);
          $http.post("../php/modificar.php", vm.fdatos)
            .success(function(res){
              var a = res.substring(1);

              if (a == 'modificado') {
                alert('Se ha modificado correctamente');
                console.log(location);
                location.href='categorias.html';
                //location.reload(true);
                
              }else{
                alert('Ocurrio un error al modificar.!!');
                location.href="categorias.html";
              }
              console.log(a);
              //por supuesto podrás volcar la respuesta al modelo con algo como vm.res = res;
            });  

  }
});

