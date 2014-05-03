<?php

/**
 * Main Plugin Class
 *
 * @author Serge Rodovnichenko <sergerod@gmail.com>
 */
class shopSyrredirPlugin extends shopPlugin
{
    
    /**
     * Модель
     * @var shopSyrredirPluginModel 
     */
    private $SyrRedir;
    
    public function __construct($info) {
        parent::__construct($info);
        
        $this->SyrRedir = new shopSyrredirPluginModel();
    }
    
    public function frontendError($params) {
        
        if($params->getCode() == 404) {

            $url = waSystem::getInstance()->getRouting()->getCurrentUrl();

            $new_route = $this->SyrRedir->findRedirectFrom($url);

            if($new_route) {
                waSystem::getInstance()->getResponse()->redirect(waSystem::getInstance()->getRootUrl() . $new_route, 301);
            }
        }
    }
}
