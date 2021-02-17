<?php

namespace App\Controller;

class ApplicationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Return all applications with internships and users
        $this->paginate = [
            'contain' => ['Internships', 'Users'],
        ];
        $applications = $this->paginate($this->Applications);

        $this->set(compact('applications'));
    }

    /**
     * View method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // Return application of $id with internships and users
        $application = $this->Applications->get($id, [
            'contain' => ['Internships', 'Users'],
        ]);

        $this->set(compact('application'));
    }

    /**
     * Add method
     * This cannot be ran directly from /applications/add
     * This has to has a param of id in order to continue.
     * This is to stop random applications being created outside of an internship.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     * 
     * https://book.cakephp.org/authentication/2/en/authentication-component.html
     * 
     */
    public function add($id = null)
    {
        // Create empty application entity
        $application = $this->Applications->newEmptyEntity();
        if ($this->request->is('post')) {
            // Assign internship id and user id manually.
            $application->internship_id = $id;
            $application->user_id = $this->Authentication->getIdentity()->get('id');
            if ($this->Applications->save($application)) {
                // Application created successfully
                $this->Flash->success(__('The application has been submitted.'));

                return $this->redirect(['action' => 'index']);
            }
            // Application creation failed
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        
        $internships = $this->Applications->Internships->findById($id)->all();
        $this->set(compact('application', 'internships'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Get applications by $id
        $application = $this->Applications->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Fill entity with request data
            $application = $this->Applications->patchEntity($application, $this->request->getData());
            if ($this->Applications->save($application)) {
                // Application updated successfully
                $this->Flash->success(__('The application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Application update failed
            $this->Flash->error(__('The application could not be saved. Please, try again.'));
        }
        $internships = $this->Applications->Internships->find('list', ['limit' => 200]);
        $users = $this->Applications->Users->find('list', ['limit' => 200]);
        $this->set(compact('application', 'internships', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // Get application by $id
        $application = $this->Applications->get($id);
        if ($this->Applications->delete($application)) {
            // Application deleted successfully
            $this->Flash->success(__('The application has been deleted.'));
        } else {
            // Application delection failed
            $this->Flash->error(__('The application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
