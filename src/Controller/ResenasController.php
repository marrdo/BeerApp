<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Resenas Controller
 *
 * @property \App\Model\Table\ResenasTable $Resenas
 * @method \App\Model\Entity\Resena[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResenasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Cervezas'],
        ];
        $resenas = $this->paginate($this->Resenas);

        $this->Authorization->skipAuthorization();

        $this->set(compact('resenas'));
    }

    /**
     * View method
     *
     * @param string|null $id Resena id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resena = $this->Resenas->get($id, [
            'contain' => ['Users', 'Cervezas'],
        ]);

        $this->Authorization->skipAuthorization();

        $this->set(compact('resena'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resena = $this->Resenas->newEmptyEntity();

        $this->Authorization->authorize($resena, 'add');

        if ($this->request->is('post')) {
            $resena = $this->Resenas->patchEntity($resena, $this->request->getData());
            if ($this->Resenas->save($resena)) {
                $this->Flash->success(__('The resena has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resena could not be saved. Please, try again.'));
        }
        $users = $this->Resenas->Users->find('list', ['limit' => 200])->all();
        $cervezas = $this->Resenas->Cervezas->find('list', ['limit' => 200])->all();
        $this->set(compact('resena', 'users', 'cervezas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resena id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resena = $this->Resenas->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($resena, 'add');
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resena = $this->Resenas->patchEntity($resena, $this->request->getData());
            if ($this->Resenas->save($resena)) {
                $this->Flash->success(__('The resena has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resena could not be saved. Please, try again.'));
        }
        $users = $this->Resenas->Users->find('list', ['limit' => 200])->all();
        $cervezas = $this->Resenas->Cervezas->find('list', ['limit' => 200])->all();
        $this->set(compact('resena', 'users', 'cervezas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resena id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resena = $this->Resenas->get($id);

        $this->Authorization->authorize($resena, 'add');

        if ($this->Resenas->delete($resena)) {
            $this->Flash->success(__('The resena has been deleted.'));
        } else {
            $this->Flash->error(__('The resena could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
