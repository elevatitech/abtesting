<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AccessLog Controller
 *
 * @property \App\Model\Table\AccessLogTable $AccessLog
 * @method \App\Model\Entity\AccessLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccessLogController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $accessLog = $this->paginate($this->AccessLog);

        $this->set(compact('accessLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accessLog = $this->AccessLog->newEmptyEntity();
        if ($this->request->is('post')) {
            $accessLog = $this->AccessLog->patchEntity($accessLog, $this->request->getData());
            if ($this->AccessLog->save($accessLog)) {
                $this->Flash->success(__('The access log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access log could not be saved. Please, try again.'));
        }
        $this->set(compact('accessLog'));
    }
    
    public function report()
    {
        $accessLog = $this->paginate($this->AccessLog);

        $this->set(compact('accessLog'));
    }
}
