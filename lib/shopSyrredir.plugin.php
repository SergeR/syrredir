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
        
        if($params->getCode() != 404) {
            return ;
        }
        
        $url = waSystem::getInstance()->getRouting()->getCurrentUrl();
        
        waLog::log("URL: $url", 'syrredir.log');
        
        $new_route = $this->SyrRedir->getByField('old_route', $url);
        
        if(!$new_route) {
            return ;
        }
        
        waSystem::getInstance()->getResponse()->redirect($new_route, 301);
    }
}
