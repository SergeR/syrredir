<?php

/**
 * Модель
 *
 * @author Serge Rodovnichenko <sergerod@gmail.com>
 */
class shopSyrredirPluginModel extends waModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'shop_syrredir';
    
    public function save($data) {
        
        if(isset($data['id'])) {
            return $this->updateById($id, $data);
        }

        return $this->insert($data);
    }
    
    /**
     * @param string $url
     */
    public function findRedirectFrom($url)
    {
        $route = $this->getByField('old_route', $url);
        
        if($route) {
            return $route['new_route'];
        }
        
        return NULL;
    }
}
