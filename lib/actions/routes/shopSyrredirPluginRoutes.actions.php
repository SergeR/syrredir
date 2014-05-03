<?php

class shopSyrredirPluginRoutesActions extends waViewActions
{
    /**
     *
     * @var shopSyrredirPluginModel
     */
    private $SyrRedyr;


    protected function preExecute()
    {
        $this->SyrRedyr = new shopSyrredirPluginModel();
    }

    /**
     * Список все роутов
     */
    public function indexAction() {

        $this->view->assign('routes', $this->SyrRedyr->getAll());

    }

    /**
     * Сохранение переадресации. Если "старый" роут уже есть в БД,
     * то обновляем, нет — просто добавляем новый
     * @todo Какой-нибудь уонинг, если "старый" уже есть
     */
    public function saveAction() {

        $from = waRequest::post('old_route');
        $to = waRequest::post('new_route');

        $result = array();
        
        try {
            
            if(!$from || !$to) {
                throw new waException('Invalid routes');
            }
            
            if(substr($from, -1) != '/') {
                $from .= '/';
            }

            if(substr($to, -1) != '/') {
                $to .= '/';
            }

            $row = $this->SyrRedyr->getByField('old_route', $from);
            
            $data = array('old_route'=>$from, 'new_route'=>$to);
            
            if($row) {
            
                $id = waRequest::post('id');

                if(!$id || ($id != $row['id'])) {
                    throw new waException("Redirect rule from '$from' already exists. Edit or delete it.");
                }
                
                $data['id'] = $id;
                
            }
            
            $this->SyrRedyr->save($data);

        } catch (waException $exc) {
            $result['error']=$exc->getMessage();
        }

        $this->getResponse()->addHeader('Content-type', 'application/json');
        $this->view->assign('data', $result);

    }

    /**
     * Удаление записи по ID
     */
    public function deleteAction()
    {
        $id = waRequest::post('id', 0);

        $data = array();

        try {
            if(!$id) {
                throw new waException(_wp('Invalid record ID'));
            }

            if(!$this->SyrRedyr->deleteById($id)) {
                throw new waException(_wp("Error deleting record #") . $id);
            }

            $data['id']=$id;

        } catch (Exception $exc) {
            $data['error'] = $exc->getMessage();
        }

        $this->getResponse()->addHeader('Content-type', 'application/json');
        $this->view->assign('data', $data);
    }

}