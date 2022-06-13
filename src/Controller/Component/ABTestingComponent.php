<?php
declare(strict_types=1);

namespace App\Controller\Component;

use App\Model\Table\AccessLogTable;
use Cake\Event\EventInterface;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Cache\Cache;



/**
 * ABTesting component
 */
class ABTestingComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];
    protected $controller = null;

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function startup(EventInterface $event)
    {
        $this->setController($event->getSubject());
        print_r($this->controller);
        exit;
    }

    public function abTesting($path, $httpRequest)
    {
        // AB Testing
        if ($path[0] == 'home') {
            // Initialise the cache
            if (!Cache::read('hits_version_0')) {
                Cache::write('hits_version_0', 1);
                Cache::write('hits_version_1', 1);
            }

            // A or B
            $versions = ['home', 'home_1'];
            $versionA = Cache::read('hits_version_0');
            $versionB = Cache::read('hits_version_1');
            $version = $versionA > $versionB ? 1 : 0;
            $path[0] = $versions[$version];
            $key = 'hits_version_' . $version;
            Cache::increment($key, $offset = 1, $config = 'default');

            // Track impression
            $accessLogTable = new AccessLogTable();
            $page = '/';
            $versionImpression = $version == 0 ? 'A' : 'B';
            $referrer = $httpRequest->referer(false);
            $ip = $httpRequest->clientIp();
            $accessLogTable->trackImpression($page, $versionImpression, $referrer, $ip);
        }

        // Conversion
        if ($path[0] == 'thankyou') {
            // Track conversion
            $accessLogTable = new AccessLogTable();
            $page = '/thankyou';
            $versionImpression = $httpRequest->getQuery('version');
            $referrer = $httpRequest->referer(false);
            $ip = $httpRequest->clientIp();
            $accessLogTable->trackConversion($page, $versionImpression, $referrer, $ip);
        }

        return $path;
    }

}
