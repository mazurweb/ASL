/**
 * Created by mikem on 6/19/2016.
 */
angular.module('home', ['ngResource'])
    .controller('AnnouncementCtrl', function($resource, $scope) {
        var vm = this;
        loading('start');
        $resource('/api/get-announcements').query().$promise.then(function (announcements) {
           vm.announcements = announcements;
           $.jTimeout.reset();
        });
        loading('end');
    });