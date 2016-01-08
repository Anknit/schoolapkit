(function () {
    var nextDayController  =   function ($scope, $routeParams, $http) {
        $('#menu-navbar-collapse-1 li.active').removeClass('active');
        $('#next-day-option-menu-item').addClass('active');
        var data    =   {'action':'nextdayoptions','data':{}},config={},successCallback = function (response) {
            $scope.nextDayOptionList   =   response.data.data;
        }, errorCallback = function (response) {
            console.log(response);
            $scope.nextDayOptionList   =   [];
        };
        $http.post('./php/requestHandler.php', data).then(successCallback, errorCallback);
        $scope.confirmSelection =   function (event) {
            var data  =   {'action': 'nextDayOptionSelect', 'data': {'optionId': $(event.currentTarget).attr('data-optionval')}}, successCallback =   function (response) {
                $scope.nextDayOptionList   =   response.data.data;
            }, config = {}, errorCallback =   function (response) {
                console.log(response);
            };
            $http.post('./php/requestHandler.php', data).then(successCallback, errorCallback);
        };
    };
    nextDayController.$inject  =   ['$scope', '$routeParams', '$http'];
    angular.module('snacksapp').controller('nextDayController', nextDayController);
}());