<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

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
        $this->Authorization->skipAuthorization();
        return $this->redirect(['controller'=>'Cervezas','action' => 'index']);
        $this->paginate = [
            'contain' => ['Users', 'Cervezas'],
        ];
        $resenas = $this->paginate($this->Resenas);

        

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
        $this->Authorization->skipAuthorization();
        $resena = $this->Resenas->get($id, [
            'contain' => ['Users', 'Cervezas'],
        ]);
        $cerveza = $this->Resenas->Cervezas->find()->where(['id' => $resena->cerveza_id])->first();
        return $this->redirect(['controller'=>'Cervezas','action' => 'view', $cerveza->id]);
        

        $this->set(compact('resena'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($related_id)
    {
        $resena = $this->Resenas->newEmptyEntity();
        $this->Authorization->authorize($resena, 'add');
        $isAdmin = $this->isAdmin();
        if ($this->request->is('post')) {

            $resena = $this->Resenas->patchEntity($resena, $this->request->getData());
            if ($this->Resenas->save($resena)) {
                $this->Flash->success(__('The resena has been saved.'));

                return $this->redirect(['controller' => 'Cervezas', 'action' => 'view', $related_id]);
            }
            $this->Flash->error(__('The resena could not be saved. Please, try again.'));
        }
        $resenas = $this->Resenas->find()->contain(['Users'])->where(['cerveza_id' => $related_id]);
        $user = $this->getRequest()->getAttribute('authentication')->getIdentity();
        $cerveza = $this->Resenas->Cervezas->find()->where(['id' => $related_id])->first();
        $this->set(compact('resena', 'user', 'cerveza', 'isAdmin', 'resenas'));
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
        $isAdmin = $this->isAdmin();
        $cerveza = $this->Resenas->Cervezas->find()->where(['id' => $resena->cerveza_id])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resena = $this->Resenas->patchEntity($resena, $this->request->getData());
            if ($this->Resenas->save($resena)) {
                $this->Flash->success(__('The resena has been saved.'));

                return $this->redirect(['controller'=>'Cervezas','action' => 'view', $cerveza->id]);
            }
            $this->Flash->error(__('The resena could not be saved. Please, try again.'));
        }
        $resenas = $this->Resenas->find()->contain(['Users'])->where(['cerveza_id' => $resena->cerveza_id]);
        $user = $this->getRequest()->getAttribute('authentication')->getIdentity();
        $this->set(compact('resena', 'user', 'cerveza', 'isAdmin', 'resenas'));
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

    protected function isAdmin()
    {
        $currentUser = $this->getRequest()->getAttribute('authentication')->getIdentity();
        $user = TableRegistry::getTableLocator()->get('Users')->find()
            ->where(['Users.id' => $currentUser->id])
            ->contain(['Roles'])
            ->first();
        if (!empty($user->roles)) {
            foreach ($user->roles as $role) {
                if ($role->nombre === 'admin') {
                    return true;
                }
            }
        }
        return false;
    }
}
