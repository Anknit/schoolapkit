(function () {
    var homeController  =   function ($scope, $routeParams, $http) {
        var data    =   {'action':'presentoptionstatus','data':{}},config={},successCallback = function (response) {
            $scope.presentOptionList   =   response.data.data;
        }, errorCallback = function (response) {
            console.log(response);
            $scope.presentOptionList   =   [];
        };
        $http.post('./php/requestHandler.php', data).then(successCallback, errorCallback);
        $scope.confirmSelection =   function (event) {
            var data  =   {'action': 'optionSelect', 'data': {'optionId': $(event.currentTarget).attr('data-optionval')}}, successCallback =   function (response) {
                $scope.responseData   =   response.data.data;
                alert($scope.responseData);
            }, config = {}, errorCallback =   function (response) {
                console.log(response);
                $scope.schoolInfo   =   [];
            };
            $http.post('./php/requestHandler.php', data).then(successCallback, errorCallback);
        };
        $scope.getpercentstring =   function (dataArrOpt, index) {
            dataArrOpt.percentCount    =    (Math.floor(parseInt(dataArrOpt.presentoptionvotecount)*100/30)).toString() + '%';
        };
    };
    homeController.$inject  =   ['$scope', '$routeParams', '$http'];
    angular.module('snacksapp').controller('homeController', homeController);
}());