// Brendan Page controller
murtyApp.controller('brendanPageCtrl', ['$scope', '$rootScope', '$routeParams', 'pageSvc', function ($scope, $rootScope, $routeParams, pageSvc) {
    $rootScope.site_title = 'Brendan Murty';
    $rootScope.site_description = 'Brendan is a Project Manager and Senior Web Developer';
    $rootScope.site_author = 'Brendan Murty';
    $rootScope.site_index_link = '/brendan';

    $rootScope.icon_shortcut = 'images/brendan/favicon.png';
    $rootScope.icon_touch = 'images/brendan/apple-touch-icon-precomposed.png';

    $rootScope.class_page = 'brendan brendan_' + $routeParams.page_name;
    $rootScope.class_container = '';

    $rootScope.init();

    var page_name = $routeParams.page_name;

    if (page_name == 'about') {
        // Use "index.md" for content when the "about" page is requested
        page_name = 'index';
    }

    // Extract the Markdown content and send it to the template
    pageSvc.getPageContent('brendan/' + page_name + '.md').then(function(content) {
        $rootScope.page_title = pageSvc.getPageTitle($routeParams.page_name) + ' - ' + $rootScope.site_title;

        $rootScope.page_content = content.data;

        $rootScope.page_loading = false;
    });
}]);
