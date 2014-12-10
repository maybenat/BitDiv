
app.controller("TabsParentController", function ($scope) {
    var setAllInactive = function() {
        angular.forEach($scope.workspaces, function(workspace) {
            workspace.active = false;
        });
    };
    var addNewWorkspace = function() {
        var id = $scope.workspaces.length + 1;
        $scope.workspaces.push({
            id: id,
            name: "Portfolio " + id,
            active: true
        });
    };
    $scope.workspaces =
    [
        { id: 1, name: "Portfolio 1", active:true  },
        { id: 2, name: "Portfolio 2", active:false }
    ];
    $scope.addWorkspace = function () {
        setAllInactive();
        addNewWorkspace();
    };
    
});

app.controller ("TabsChildController", function($scope, $log){
});

