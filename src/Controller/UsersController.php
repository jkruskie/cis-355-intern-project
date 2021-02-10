<?php

namespace App\Controller;

class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
    
        // Allow unathorized users to use these functions
        // This allows them to view the pages associated
        $this->Authentication->allowUnauthenticated([
            'login','register', 'registerStudent', 'registerEmployer'
            ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Return all users
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
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
        // Get user by $id with Applications and Internships
        $user = $this->Users->get($id, [
            'contain' => ['Applications', 'Internships'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Create new empty users entity
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // Fill empty user with data
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                // User saved successfully
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // User save failed
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        // Get user by $id
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Fill user with data
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // https://book.cakephp.org/2/en/models/saving-your-data.html
            if ($this->Users->save($user)) {
                // User saved successfully
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // User save failed
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        // Get user by $id
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            // User deleted successfully
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            // User delete failed
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    // Login
    public function login()
    {
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            // Send user to internships index
            $target = $this->Authentication->getLoginRedirect() ?? '/internships';
            $this->set(compact('result'));
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            // Authentication failed
            $this->Flash->error('Invalid username or password');
        }
    }

    // Logout
    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect("/");
    }

    // Register
    public function register() { }

    // Register Student
    public function registerStudent()
    {
        // Create empty user entity
        $user = $this->Users->newEmptyEntity();
        if($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // Set empty entity to data and user_type to student
            $user['user_type'] = 0;
            if($this->Users->save($user)) {
                // User registration success
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                // User registration failed
                $this->Flash->error('You are not registered');
                debug($user->getErrors());
            }
        }
        $this->set(compact($user));
    }

    // Register Employer (eliminates some fields)
    public function registerEmployer()
    {
        // Create empty user entity
        $user = $this->Users->newEmptyEntity();
        if($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // Set empty entity to data and user_type to employer
            $user['user_type'] = 1;
            if($this->Users->save($user)) {
                // User registration success
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                // User registration failed
                $this->Flash->error('You are not registered');
                debug($user->getErrors());
            }
        }
        $this->set(compact($user));
    }
}
