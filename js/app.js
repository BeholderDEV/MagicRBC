angular.module('app', [ 'isteven-multi-select', 'ngAnimate', 'toastr' ])
.controller('DocCtrl', function ($scope,$http) {
  var vm = this
  $http({
    method: 'GET',
    url: 'api/types.php'
  }).then(function successCallback (response) {
    console.log('sa')
    vm.types = response
  })
  $http({
    method: 'GET',
    url: 'api/supertypes.php'
  }).then(function successCallback (response) {
    console.log('sa')
    vm.supertypes = response
  })
  $http({
    method: 'GET',
    url: 'api/colors.php'
  }).then(function successCallback (response) {
    vm.colors = response
  })
  $http({
    method: 'GET',
    url: 'api/rarities.php'
  }).then(function successCallback (response) {
    vm.rarities = response
  })
  $http({
    method: 'GET',
    url: 'api/sets.php'
  }).then(function successCallback (response) {
    vm.sets = response
  })
  $http({
    method: 'GET',
    url: 'api/cards.php'
  }).then(function successCallback (response) {
    vm.cards = response
    console.log(response)
  })
})
.controller('MainCtrl', function ($scope, $http) {
  function validateWeights () {
    var colorWeight = parseFloat(angular.element('#color_weight').val())
    var typeWeight = parseFloat(angular.element('#type_weight').val())
    var supertypeWeight = parseFloat(angular.element('#supertype_weight').val())
    var rarityWeight = parseFloat(angular.element('#rarity_weight').val())
    var cmcWeight = parseFloat(angular.element('#cmc_weight').val())

    if (colorWeight + typeWeight + supertypeWeight + rarityWeight + cmcWeight !== 1.0) {
      toastr.error('A soma dos pesos deve ser igual a 1.0', 'Error');
      return false
    }
    if (isNaN(colorWeight) || colorWeight < 0) {
      return false
    }
    if (isNaN(typeWeight) || typeWeight < 0) {
      return false
    }
    if (isNaN(supertypeWeight) || supertypeWeight < 0) {
      return false
    }
    if (isNaN(rarityWeight) || rarityWeight < 0) {
      return false
    }
    if (isNaN(cmcWeight) || cmcWeight < 0) {
      return false
    }
    toastr.success('Calculando', 'Aguarde porfavor');
    return true
  }

  $scope.cards=undefined;
  $scope.searchCard = function()
  {
    if($scope.colorsSelected.length == 0){
      return;
    }
    var cmc = $scope.cmcSelected[0].name
    if(cmc == 'maior que 9')
    {
      cmc='10';
    }

    if(!validateWeights()){
      return;
    }
    $http({
      method: 'POST',
      url: 'api/full_cards.php',
      data: {
              'color_weight'      : angular.element('#color_weight').val(),
              'type_weight'       : angular.element('#type_weight').val(),
              'supertype_weight'  : angular.element('#supertype_weight').val(),
              'rarity_weight'     : angular.element('#rarity_weight').val(),
              'cmc_weight'        : angular.element('#cmc_weight').val(),

              'colors'            : $scope.colorsSelected[0].name,
              'type'              : $scope.typeSelected[0].name,
              'supertype'         : $scope.superTypeSelected[0].name,
              'rarity'            : $scope.raritySelected[0].name,
              'cmc'               : cmc
            },
      headers: {
                  'Content-Type': 'application/json; charset=utf-8'
                }
    }).then(function successCallback (response) {
      $scope.cards = response;
      // console.log(response)
      console.log("SUCESSO")
    })
  }
  $scope.atualizarTabela = function () {
    $scope.colors = ''
    for (var i = 0; i < $scope.colorsSelected.length; i++) {
      $scope.colors = $scope.colors + $scope.colorsSelected[i].name
      if (i < $scope.colorsSelected.length - 1) {
        $scope.colors = $scope.colors + ', '
      }
    }
    $scope.type = $scope.typeSelected[0].name
    $scope.superType = $scope.superTypeSelected[0].name
    $scope.rarity = $scope.raritySelected[0].name
    $scope.cmc = $scope.cmcSelected[0].name
  }

  $scope.colorsModel = [
    { icon: '<img src="http://gatherer.wizards.com/Handlers/Image.ashx?size=medium&name=C&type=symbol">', name: 'Colorless', ticked: true },
    { icon: '<img src="http://gatherer.wizards.com/Handlers/Image.ashx?size=medium&name=B&type=symbol">', name: 'Black', ticked: false },
    { icon: '<img src="http://gatherer.wizards.com/Handlers/Image.ashx?size=medium&name=W&type=symbol">', name: 'White', ticked: false },
    { icon: '<img src="http://gatherer.wizards.com/Handlers/Image.ashx?size=medium&name=U&type=symbol">', name: 'Blue', ticked: false },
    { icon: '<img src="http://gatherer.wizards.com/Handlers/Image.ashx?size=medium&name=R&type=symbol">', name: 'Red', ticked: false },
    { icon: '<img src="http://gatherer.wizards.com/Handlers/Image.ashx?size=medium&name=G&type=symbol">', name: 'Green', ticked: false }
  ]
  $scope.typeModel = [
    { name: 'Creature', ticked: true },
    { name: 'Land', ticked: false },
    { name: 'Artifact', ticked: false },
    { name: 'Enchantment', ticked: false },
    { name: 'Planeswalker', ticked: false },
    { name: 'Sorcery', ticked: false },
    { name: 'Instant', ticked: false }
  ]
  $scope.superTypeModel = [
    { name: 'Untyped', ticked: true },
    { name: 'Basic', ticked: false },
    { name: 'Legendary', ticked: false },
    { name: 'Ongoing', ticked: false },
    { name: 'Snow', ticked: false },
    { name: 'World', ticked: false }
  ]
  $scope.rarityModel = [
    { name: 'Common', ticked: true },
    { name: 'Uncommon', ticked: false },
    { name: 'Rare', ticked: false },
    { name: 'Mythic Rare', ticked: false },
    { name: 'Special', ticked: false },
    { name: 'Basic Land', ticked: false }
  ]
  $scope.cmcModel = [
    { name: '0', ticked: false },
    { name: '1', ticked: true },
    { name: '2', ticked: false },
    { name: '3', ticked: false },
    { name: '4', ticked: false },
    { name: '5', ticked: false },
    { name: '6', ticked: false },
    { name: '7', ticked: false },
    { name: '8', ticked: false },
    { name: '9', ticked: false },
    { name: 'maior que 9', ticked: false }
  ]
})
