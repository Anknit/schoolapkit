(function () {
    "use strict";
    var leftPaneController  =   function ($scope, $http) {
        $scope.schoolSearchState    =   '0';
        $scope.states   =   [{
            'name': 'Andaman and Nicobar',
            'value': '1'
        }, {
            'name': 'Andhra Pradesh',
            'value': '2'
        }, {
            'name': 'Arunachal Pradesh',
            'value': '3'
        }];
        $scope.getStateCity = function () {
            var data  =   {'action': 'act_01', 'data': {'stateId': $scope.schoolSearchState}}, successCallback =   function (response) {
                $scope.cities   =   response;
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