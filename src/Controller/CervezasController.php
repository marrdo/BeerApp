<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cervezas Controller
 *
 * @property \App\Model\Table\CervezasTable $Cervezas
 * @method \App\Model\Entity\Cerveza[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CervezasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $cervezas = $this->paginate($this->Cervezas);

        $this->set(compact('cervezas'));
    }

    /**
     * View method
     *
     * @param string|null $id Cerveza id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $cerveza = $this->Cervezas->get($id, [
            'contain' => ['Resenas'],
        ]);

        $this->set(compact('cerveza'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'get']);

        $cerveza = $this->Cervezas->newEmptyEntity();

        $this->Authorization->authorize($cerveza);

        if ($this->request->is('post')) {
            $cerveza = $this->Cervezas->patchEntity($cerveza, $this->request->getData());
            if ($this->Cervezas->save($cerveza)) {
                $this->Flash->success(__('The cerveza has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cerveza could not be saved. Please, try again.'));
        }
        $this->set(compact('cerveza'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cerveza id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cerveza = $this->Cervezas->get($id, [
            'contain' => [
                'Resena'
            ],
        ]);

        $this->Authorization->authorize($cerveza);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $cerveza = $this->Cervezas->patchEntity($cerveza, $this->request->getData());
            if ($this->Cervezas->save($cerveza)) {
                $this->Flash->success(__('The cerveza has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cerveza could not be saved. Please, try again.'));
        }
        $this->set(compact('cerveza'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cerveza id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $cerveza = $this->Cervezas->get($id);

        $this->Authorization->authorize($cerveza);
        
        if ($this->Cervezas->delete($cerveza)) {
            $this->Flash->success(__('The cerveza has been deleted.'));
        } else {
            $this->Flash->error(__('The cerveza could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
