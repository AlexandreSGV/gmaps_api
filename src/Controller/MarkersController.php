<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Markers Controller
 *
 * @property \App\Model\Table\MarkersTable $Markers
 *
 * @method \App\Model\Entity\Marker[] paginate($object = null, array $settings = [])
 */
class MarkersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public $components = array('RequestHandler');
    public function index()
    {
        $markers = $this->paginate($this->Markers);

        $this->set(compact('markers'));
        $this->set('_serialize', ['markers']);
    }

    public function map()
    {
        
    }


    public function markersjson()
    {
        $this->autoRender = false;
        $markers = $this->Markers->find()->select(['Markers.name', 'Markers.address', 'Markers.lat', 'Markers.lng']);

        $resultJ = json_encode($markers);

        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }

    /**
     * View method
     *
     * @param string|null $id Marker id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marker = $this->Markers->get($id, [
            'contain' => []
        ]);

        $this->set('marker', $marker);
        $this->set('_serialize', ['marker']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marker = $this->Markers->newEntity();
        if ($this->request->is('post')) {
            $marker = $this->Markers->patchEntity($marker, $this->request->getData());
            if ($this->Markers->save($marker)) {
                $this->Flash->success(__('The marker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The marker could not be saved. Please, try again.'));
        }
        $this->set(compact('marker'));
        $this->set('_serialize', ['marker']);
    }


    

    /**
     * Edit method
     *
     * @param string|null $id Marker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marker = $this->Markers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marker = $this->Markers->patchEntity($marker, $this->request->getData());
            if ($this->Markers->save($marker)) {
                $this->Flash->success(__('The marker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The marker could not be saved. Please, try again.'));
        }
        $this->set(compact('marker'));
        $this->set('_serialize', ['marker']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marker = $this->Markers->get($id);
        if ($this->Markers->delete($marker)) {
            $this->Flash->success(__('The marker has been deleted.'));
        } else {
            $this->Flash->error(__('The marker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
