<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 *
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $informations = $this->paginate($this->Informations);

        $this->set(compact('informations'));
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags', 'edit', 'delete'])) {
            return true;
        }
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => ['Cars'],
        ]);

        $this->set('information', $information);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->request->session()->read('Car.id') == false) {
            $this->Flash->error(__('Information must be added from a car'));
            return $this->redirect(['controller' => 'cars', 'action' => 'index']);
        } else {       
        $information = $this->Informations->newEntity();
        if ($this->request->is('post')) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            $information->car_id = $this->request->session()->read('Car.id');
            $this->request->session()->delete('Car.id');
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));
                $car_slug = $this->request->session()->read('Car.slug');
                return $this->redirect(['controller' => 'cars', 'action' => 'view', $car_slug]);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $cars = $this->Informations->Cars->find('list', ['limit' => 200]);
        $this->set(compact('information', 'cars'));
    }
            }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => ['Cars'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $cars = $this->Informations->Cars->find('list', ['limit' => 200]);
        $this->set(compact('information', 'cars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Informations->get($id);
        if ($this->Informations->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
