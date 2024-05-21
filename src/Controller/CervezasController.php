<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CervezasTable;
use Cake\ORM\TableRegistry;

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

        $isAdmin = $this->isAdmin();
        $cervezas = $this->paginate($this->Cervezas);
        $this->set(compact('cervezas','isAdmin'));
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
        $isAdmin = $this->isAdmin();
        
        $cerveza = $this->Cervezas->get($id, [
            'contain' => ['Resenas'],
        ]);
        $currentUser = $this->getRequest()->getAttribute('authentication')->getIdentity();
        $user = TableRegistry::getTableLocator()->get('Users')->find()
        ->where(['Users.id' => $currentUser->id])
        ->contain(['Roles'])
        ->first();
        
        $resenas = $this->Cervezas->Resenas->find()->contain(['Users'])->where(['cerveza_id' => $cerveza->id]);
        $this->set(compact('cerveza', 'isAdmin', 'resenas', 'user'));
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
        $isAdmin = $this->isAdmin();
        if ($this->request->is('post')) {
            $cerveza = $this->Cervezas->patchEntity($cerveza, $this->request->getData());
            if ($this->Cervezas->save($cerveza)) {
                $this->Flash->success(__('Se ha añadido una cerveza.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir la cerveza, prueba de nuevo.'));
        }
        $colores =array_combine( array_map('ucfirst', CervezasTable::COLORES),array_map('ucfirst', CervezasTable::COLORES)) ;
        $regionesOrigen = array_map('ucfirst', CervezasTable::REGIONES_ORIGEN);
        $familiasEstilos = array_combine(array_map('ucfirst', CervezasTable::FAMILIAS_ESTILOS),array_map('ucfirst', CervezasTable::FAMILIAS_ESTILOS));
        $sabores = array_map('ucfirst', CervezasTable::SABORES);
        $tipos =array_combine(array_map('ucfirst', CervezasTable::TIPOS), array_map('ucfirst', CervezasTable::TIPOS));
        $this->set(compact('cerveza', 'tipos', 'colores', 'regionesOrigen', 'familiasEstilos', 'sabores', 'isAdmin'));
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
                'Resenas'
            ],
        ]);

        $this->Authorization->authorize($cerveza);
        $isAdmin = $this->isAdmin();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cerveza = $this->Cervezas->patchEntity($cerveza, $this->request->getData());
            if ($this->Cervezas->save($cerveza)) {
                $this->Flash->success(__('{0}, se ha actualizado.', $cerveza->nombre));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cerveza could not be saved. Please, try again.'));
        }
        $colores =array_combine( array_map('ucfirst', CervezasTable::COLORES),array_map('ucfirst', CervezasTable::COLORES)) ;
        $regionesOrigen = array_map('ucfirst', CervezasTable::REGIONES_ORIGEN);
        $familiasEstilos = array_combine(array_map('ucfirst', CervezasTable::FAMILIAS_ESTILOS),array_map('ucfirst', CervezasTable::FAMILIAS_ESTILOS));
        $sabores = array_map('ucfirst', CervezasTable::SABORES);
        $tipos =array_combine(array_map('ucfirst', CervezasTable::TIPOS), array_map('ucfirst', CervezasTable::TIPOS));
        $this->set(compact('cerveza', 'tipos', 'colores', 'regionesOrigen', 'familiasEstilos', 'sabores','isAdmin'));
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

    protected function isAdmin(){
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
