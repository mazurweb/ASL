loading('start');
angular.module('EmployeeList', ['datatables', 'ngResource'])
    .controller('EmployeeController', EmployeeController);

loading('end');
function EmployeeController($resource) {
    var vm = this;
    $resource('/api/employee-list').query().$promise.then(function(employees) {
        vm.employees = employees;
        $.jTimeout.reset();
    });
}