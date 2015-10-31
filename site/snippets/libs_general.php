<?

function load_thirdparty_classes() {
    // Load required third-party classes
    $classes = dirname(__DIR__) . DS . 'classes' . DS;
    load(
        array(
            'github\\api\\abstractapi' => $classes . 'Github' . DS . 'Api' . DS . 'AbstractApi.php',
            'github\\api\\apiinterface' => $classes . 'Github' . DS . 'Api' . DS . 'ApiInterface.php',
            'github\\api\\user' => $classes . 'Github' . DS . 'Api' . DS . 'User.php',
            'github\\api\\repo' => $classes . 'Github' . DS . 'Api' . DS . 'Repo.php',
            'github\\client' => $classes . 'Github' . DS . 'Client.php',
            'github\\httpclient\\httpclient' => $classes . 'Github' . DS . 'HttpClient' . DS . 'HttpClient.php',
            'github\\httpclient\\httpclientinterface' => $classes . 'Github' . DS . 'HttpClient' . DS . 'HttpClientInterface.php',
            'github\\httpclient\\listener\\errorlistener' => $classes . 'Github' . DS . 'HttpClient' . DS . 'Listener' . DS . 'ErrorListener.php',
            'github\\httpclient\\message\\responsemediator' => $classes . 'Github' . DS . 'HttpClient' . DS . 'Message' . DS . 'ResponseMediator.php',
            'github\\exception\\apilimitexceedexception' => $classes . 'Github' . DS . 'Exception' . DS . 'ApiLimitExceedException.php',
            'github\\exception\\runtimeexception' => $classes . 'Github' . DS . 'Exception' . DS . 'RuntimeException.php',
            'github\\exception\\exceptioninterface' => $classes . 'Github' . DS . 'Exception' . DS . 'ExceptionInterface.php',
            'guzzle\\common\\abstracthasdispatcher' => $classes . 'Guzzle' . DS . 'Common' . DS . 'AbstractHasDispatcher.php',
            'guzzle\\common\\abstracthasdispatcherinterface' => $classes . 'Guzzle' . DS . 'Common' . DS . 'AbstractHasDispatcherInterface.php',
            'guzzle\\common\\collection' => $classes . 'Guzzle' . DS . 'Common' . DS . 'Collection.php',
            'guzzle\\common\\exception\\exceptioncollection' => $classes . 'Guzzle' . DS . 'Common' . DS . 'Exception' . DS . 'ExceptionCollection.php',
            'guzzle\\common\\exception\\guzzleexception' => $classes . 'Guzzle' . DS . 'Common' . DS . 'Exception' . DS . 'GuzzleException.php',
            'guzzle\\common\\hasdispatcherinterface' => $classes . 'Guzzle' . DS . 'Common' . DS . 'HasDispatcherInterface.php',
            'guzzle\\common\\toarrayinterface' => $classes . 'Guzzle' . DS . 'Common' . DS . 'ToArrayInterface.php',
            'guzzle\\common\\version' => $classes . 'Guzzle' . DS . 'Common' . DS . 'Version.php',
            'guzzle\\http\\curl\\curlmultiproxy' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Curl' . DS . 'CurlMultiProxy.php',
            'guzzle\\http\\curl\\curlversion' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Curl' . DS . 'CurlVersion.php',
            'guzzle\\http\\curl\\curlhandle' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Curl' . DS . 'CurlHandle.php',
            'guzzle\\http\\curl\\curlmulti' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Curl' . DS . 'CurlMulti.php',
            'guzzle\\http\\curl\\curlmultiinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Curl' . DS . 'CurlMultiInterface.php',
            'guzzle\\http\\curl\\requestmediator' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Curl' . DS . 'RequestMediator.php',
            'guzzle\\http\\client' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Client.php',
            'guzzle\\http\\clientinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'ClientInterface.php',
            'guzzle\\http\\entitybody' => $classes . 'Guzzle' . DS . 'Http' . DS . 'EntityBody.php',
            'guzzle\\http\\exception\\multitransferexception' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Exception' . DS . 'MultiTransferException.php',
            'guzzle\\http\\message\\header\\cachecontrol' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header' . DS . 'CacheControl.php',
            'guzzle\\http\\message\\header\\link' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header' . DS . 'Link.php',
            'guzzle\\http\\message\\response' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Response.php',
            'guzzle\\http\\message\\requestfactory' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'RequestFactory.php',
            'guzzle\\http\\message\\requestfactoryinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'RequestFactoryInterface.php',
            'guzzle\\http\\redirectplugin' => $classes . 'Guzzle' . DS . 'Http' . DS . 'RedirectPlugin.php',
            'guzzle\\http\\url' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Url.php',
            'guzzle\\http\\entitybodyinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'EntityBodyInterface.php',
            'guzzle\\http\\queryaggregator\\phpaggregator' => $classes . 'Guzzle' . DS . 'Http' . DS . 'QueryAggregator' . DS . 'PhpAggregator.php',
            'guzzle\\http\\queryaggregator\\queryaggregatorinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'QueryAggregator' . DS . 'QueryAggregatorInterface.php',
            'guzzle\\stream\\stream' => $classes . 'Guzzle' . DS . 'Stream' . DS . 'Stream.php',
            'guzzle\\stream\\streaminterface' => $classes . 'Guzzle' . DS . 'Stream' . DS . 'StreamInterface.php',
            'guzzle\\common\\event' => $classes . 'Guzzle' . DS . 'Common' . DS . 'Event.php',
            'guzzle\\parser\\parserregistry' => $classes . 'Guzzle' . DS . 'Parser' . DS . 'ParserRegistry.php',
            'guzzle\\parser\\uritemplate\\uritemplate' => $classes . 'Guzzle' . DS . 'Parser' . DS . 'UriTemplate' . DS . 'UriTemplate.php',
            'guzzle\\parser\\uritemplate\\uritemplateinterface' => $classes . 'Guzzle' . DS . 'Parser' . DS . 'UriTemplate' . DS . 'UriTemplateInterface.php',
            'guzzle\\http\\querystring' => $classes . 'Guzzle' . DS . 'Http' . DS . 'QueryString.php',
            'guzzle\\http\\message\\request' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Request.php',
            'guzzle\\http\\message\\abstractmessage' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'AbstractMessage.php',
            'guzzle\\http\\message\\messageinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'MessageInterface.php',
            'guzzle\\http\\message\\requestinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'RequestInterface.php',
            'guzzle\\http\\message\\header' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header.php',
            'guzzle\\http\\message\\header\\headerfactory' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header' . DS . 'HeaderFactory.php',
            'guzzle\\http\\message\\header\\headerfactoryinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header' . DS . 'HeaderFactoryInterface.php',
            'guzzle\\http\\message\\header\\headerinterface' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header' . DS . 'HeaderInterface.php',
            'guzzle\\http\\message\\header\\headercollection' => $classes . 'Guzzle' . DS . 'Http' . DS . 'Message' . DS . 'Header' . DS . 'HeaderCollection.php',
            'instagram' => $classes . 'Instagram.php',
            'symfony\\component\\eventdispatcher\\event' => $classes . 'Symfony' . DS . 'Component' . DS . 'EventDispatcher' . DS . 'Event.php',
            'symfony\\component\\eventdispatcher\\eventdispatcher' => $classes . 'Symfony' . DS . 'Component' . DS . 'EventDispatcher' . DS . 'EventDispatcher.php',
            'symfony\\component\\eventdispatcher\\eventdispatcherinterface' => $classes . 'Symfony' . DS . 'Component' . DS . 'EventDispatcher' . DS . 'EventDispatcherInterface.php',
            'symfony\\component\\eventdispatcher\\eventsubscriberinterface' => $classes . 'Symfony' . DS . 'Component' . DS . 'EventDispatcher' . DS . 'EventSubscriberInterface.php'
        )
    );
}

function date_human($item_date){
    // Create a human friendly date
    // Example: 'date_human("1 Sep 14");' would return 'today', 'yesterday', '10 days ago', etc
    $interval = date_diff(date_create(date('j M y')), date_create($item_date));
    $date_diff = $interval->format('%a');
    $date_data = str_replace('+', '', $interval->format('%R%a'));
    $date = '';
    if($date_data == 0){
        $date = 'today';
    }elseif($date_data == -1){
        $date = 'yesterday';
    }elseif($date_data < -1 && $date_data > -15){
        $date = $interval->format('%a').' day';
        if($date_diff != 1){
            $date .= 's';
        }
        $date .= ' ago';
    }else{
        $date .= $item_date;
    }
    return $date;
}

?>
