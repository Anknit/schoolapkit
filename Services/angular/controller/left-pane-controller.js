(function () {
    "use strict";
    var leftPaneController  =   function ($scope, $http) {
        $scope.states   =   JSON.parse(stateJson);
        $scope.getStateCity = function () {
            $scope.cities   =   [];
            $scope.locations   =   [];
            if ($scope.schoolSearchState !== '') {
                var data  =   {'action': 'act_01', 'data': {'stateId': $scope.schoolSearchState}}, successCallback =   function (response) {
                    $scope.cities   =   response.data.data;
                }, config = {}, errorCallback =   function (response) {
                    console.log(response);
                };
                $http.get('./php/requestHandler.php', {params: {'data': JSON.stringify(data)}}).then(successCallback, errorCallback);
            }
        };
        $scope.getCityLocation = function () {
            var data  =   {'action': 'act_02', 'data': {'cityId': $scope.schoolSearchCity}}, successCallback =   function (response) {
                $scope.locations   =   response.data.data;
            }, config = {}, errorCallback =   function (response) {
                console.log(response);
                $scope.locations   =   [];
            };
            $http.get('./php/requestHandler.php', {params: {'data': JSON.stringify(data)}}).then(successCallback, errorCallback);
        };
    };
    leftPaneController.$inject  =   ['$scope', '$http'];
    angular.module('schoolap').controller('leftPaneController', leftPaneController);
}());