<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $currentUser = $this->getRequest()->getAttribute('authentication')->getIdentity();
        $user = $this->Users->find()
        ->where(['Users.id' => $currentUser->id])
        ->contain(['Roles'])
        ->first();
        
        $isAdmin = false;
        if (!empty($user->roles)) {
            foreach ($user->roles as $role) {
                if ($role->nombre === 'admin') {
                    $isAdmin = true;
                    break;
                }
            }
        }
        $this->Authorization->skipAuthorization();
        $users = $this->paginate($this->Users);

        $this->set(compact('users', 'isAdmin'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => [
                'Resenas',
                'Roles'
            ],
        ]);
        $isAdmin = false;
        if (!empty($user->roles)) {
            foreach ($user->roles as $role) {
                if ($role->nombre === 'admin') {
                    $isAdmin = true;
                    break;
                }
            }
        }

        $this->set(compact('user', 'isAdmin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $usersRolesTable = $this->getTableLocator()->get('UsersRoles');
                $userRole = $usersRolesTable->newEmptyEntity();
                $userRole->user_id = $user->id;
                $userRole->roles_id = '40d46abf-15ce-11ef-b038-08002796b452';

                $usersRolesTable->save($userRole);

                $this->Flash->success(__('Se ha guardado el usuario.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no ha sido guardado. Pruebe de nuevo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [
                'Resenas',
                'Roles'
            ],
        ]);
        $this->Authorization->authorize($user, 'edit');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Se actualizaron los datos del usuario.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Los datos del usuario no han podido ser guardado. Inténtelo de nuevo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El usuario no ha podido ser eliminado. Inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'plugin' => null,
                'controller' => 'Pages',
                'action' => 'display'
            ]);
            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Email o contraseña no válidos');
        }
    }

    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function beforeFilter(EventInterface $event)
    {
        // Con el filtro este, hacemos que el authenticator no afecte a login y a add para que s epuedan agregar usuarios y acceder al login
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }
}
