
var app = angular.module('app', []);
app.controller('misAlertas', function($scope, $http) {
  $http.get("../php/productos_en_alerta.php")
  .then(function(response) {
      $scope.categoria = response.data;
      var len = $scope.categoria.length;
      console.log(len);
      $scope.cantidad=len;      
  });
})
app.controller('appCtrl', ['$http', controladorPrincipal]);
 	
 	function controladorPrincipal($http){
        var vm=this;

        //inicializo un objeto en los datos de formulario
        vm.fdatos = {};
        
        // declaro la función enviar
        vm.enviar = function(){
          console.log(vm.fdatos);
          $http.post("../php/registrar.php", vm.fdatos)
            .success(function(res){
              var a = res.substring(1);

              if (a == 'registrado') {
                alert('Gracias por registrar.!!');
                location.reload(true);
                
              }else{
                alert('Ocurrio un error al regitrar.!!');
              }
              console.log(a);
              //por supuesto podrás volcar la respuesta al modelo con algo como vm.res = res;
            });
        }    
    }