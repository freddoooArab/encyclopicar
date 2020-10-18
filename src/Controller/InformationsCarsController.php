<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InformationsCars Controller
 *
 * @property \App\Model\Table\InformationsCarsTable $InformationsCars
 *
 * @method \App\Model\Entity\InformationsCar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsCarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cars', 'Informations'],
        ];
        $informationsCars = $this->paginate($this->InformationsCars);

        $this->set(compact('informationsCars'));
    }

    /**
     * View method
     *
     * @param string|null $id Informations Car id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $informationsCar = $this->InformationsCars->get($id, [
            'contain' => ['Cars', 'Informations'],
        ]);

        $this->set('informationsCar', $informationsCar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $informationsCar = $this->InformationsCars->newEntity();
        if ($this->request->is('post')) {
            $informationsCar = $this->InformationsCars->patchEntity($informationsCar, $this->request->getData());
            if ($this->InformationsCars->save($informationsCar)) {
                $this->Flash->success(__('The informations car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The informations car could not be saved. Please, try again.'));
        }
        $cars = $this->InformationsCars->Cars->find('list', ['limit' => 200]);
        $informations = $this->InformationsCars->Informations->find('list', ['limit' => 200]);
        $this->set(compact('informationsCar', 'cars', 'informations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Informations Car id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $informationsCar = $this->InformationsCars->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $informationsCar = $this->InformationsCars->patchEntity($informationsCar, $this->request->getData());
            if ($this->InformationsCars->save($informationsCar)) {
                $this->Flash->success(__('The informations car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The informations car could not be saved. Please, try again.'));
        }
        $cars = $this->InformationsCars->Cars->find('list', ['limit' => 200]);
        $informations = $this->InformationsCars->Informations->find('list', ['limit' => 200]);
        $this->set(compact('informationsCar', 'cars', 'informations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Informations Car id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $informationsCar = $this->InformationsCars->get($id);
        if ($this->InformationsCars->delete($informationsCar)) {
            $this->Flash->success(__('The informations car has been deleted.'));
        } else {
            $this->Flash->error(__('The informations car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
