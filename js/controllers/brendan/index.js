// Brendan Index controller
murtyApp.controller('brendanIndexCtrl', ['$scope', '$rootScope', '$routeParams', 'pageSvc', function ($scope, $rootScope, $routeParams, pageSvc) {
    $rootScope.site_title = 'Brendan Murty';
    $rootScope.site_description = 'Brendan is a Project Manager and Senior Web Developer';
    $rootScope.site_author = 'Brendan Murty';
    $rootScope.site_index_link = '/brendan';

    $rootScope.icon_shortcut = 'images/brendan/favicon.png';
    $rootScope.icon_touch = 'images/brendan/apple-touch-icon-precomposed.png';

    $rootScope.class_page = 'brendan brendan_index';
    $rootScope.class_container = '';

    $rootScope.init();

    $rootScope.page_title = $rootScope.site_title;

    // Default to Brendan's index content
    var page_content_url = 'brendan/index.md';

    if ($routeParams.page_name) {
        // Page request
        page_content_url = 'brendan/' + $routeParams.page_name + '.md';
        $rootScope.class_page = 'brendan brendan_' + $routeParams.page_name;
    } else if ($routeParams.post_name) {
        // Post request
        page_content_url = 'brendan/posts/' + $routeParams.post_name + '.md';
        $rootScope.class_page = 'brendan brendan_post';
    }

    // Extract the Markdown content and send it to the template
    if (page_content_url) {
        pageSvc.getPageContent(page_content_url).then(function(content) {
            $rootScope.page_content = content.data;
            $rootScope.page_loading = false;
        });
    }

    $scope.list_navigation = [
        { title: 'Home', link: '/brendan' },
        { title: 'About', link: '/brendan/about' },
        { title: 'Resumé', link: '/brendan/resume' },
        { title: 'Posts', link: '/brendan/posts' }
    ];
}]);