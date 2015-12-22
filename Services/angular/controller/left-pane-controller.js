(function () {
    "use strict";
    var leftPaneController  =   function ($scope, $http) {
        $scope.schoolSearchState    =   '0';
        $scope.schoolSearchCity     =   '0';
        $scope.cities   =   [];
        $scope.states   =   JSON.parse(stateJSON);
        $scope.getStateCity = function () {
            var data  =   {'action': 'act_01', 'data': {'stateId': $scope.schoolSearchState}}, successCallback =   function (response) {
                $scope.cities   =   response.data.data;
            }, config = {}, errorCallback =   function (response) {
                console.log(response);
                $scope.cities   =   [];
            };
            $http.post('./php/requestHandler.php', data).then(successCallback, errorCallback);
        };
    };
    leftPaneController.$inject  =   ['$scope', '$http'];
    angular.module('schoolap').controller('leftPaneController', leftPaneController);
}());