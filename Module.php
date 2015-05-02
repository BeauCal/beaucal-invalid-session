<?php

namespace InvalidSession;

use Zend\Mvc\MvcEvent;
use Zend\Session\Container;
use Zend\Session\AbstractManager;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e) {
        $sessionManager = $e->getApplication()->getServiceManager()
        ->get('Zend\Session\SessionManager');
        $this->forgetInvalidSession($sessionManager);
    }

    protected function forgetInvalidSession(AbstractManager $sessionManager) {
        try {
            $sessionManager->start();
            Container::setDefaultManager($sessionManager);
            return;
        } catch (\Exception $e) {

        }
        /**
         * Session validation failed: toast it and carry on.
         */
        // @codeCoverageIgnoreStart
        session_unset();
        // @codeCoverageIgnoreEnd
    }

}
