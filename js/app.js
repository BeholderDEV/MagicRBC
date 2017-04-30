angular.module('app', [ "isteven-multi-select" ])
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
.controller('MainCtrl', function ($scope) {
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
