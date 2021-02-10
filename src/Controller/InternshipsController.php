<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class InternshipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $internships = null;
        if($this->request->getAttribute('identity')['user_type'] == 0) {
            // Student, return all
            $internships = $this->paginate($this->Internships->findAvailableInternships());
        } else {
            // Employer, return only theirs
            $internships = $this->paginate($this->Internships->findEmployersInternships($this->request->getAttribute('identity')['id']));
        
        }

        $this->set(compact('internships'));
    }

    /**
     * View method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // Return internship of $id /w applications
        $internship = $this->Internships->get($id, [
            'contain' => ['Applications'],
        ]);

        $this->set(compact('internship'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Create new entity
        $internship = $this->Internships->newEmptyEntity();
        if ($this->request->is('post')) { 
            // Set internship data to the request data
            $internship = $this->Internships->patchEntity($internship, $this->request->getData());
            // See if there is an attached file
            $files = $this->request->getUploadedFiles('file');
            if($files['file']->getClientFileName() != null) {
                // File is attached
                // Generate a uuid for the filename
                $uuid = Text::uuid() . ".pdf";
                // Set the directory to save the file
                $targetPath = WWW_ROOT . '/pdf/' . $uuid;
                // SAve the file
                $files['file']->moveTo($targetPath);
                $internship->pdf_url = $uuid; 
            }
            $internship['user_id'] = $this->request->getAttribute('identity')['id'];
            if ($this->Internships->save($internship)) {
                // Saved the internship
                $this->Flash->success(__('The internship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Save failed
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $this->set(compact('internship'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Get internship of $id
        $internship = $this->Internships->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            // Set internship data to the request data
            $internship = $this->Internships->patchEntity($internship, $this->request->getData());
            // See if there is an attached file
            $files = $this->request->getUploadedFiles('file');
            if($files['file']->getClientFileName() != null) {
                // File is attached
                // Generate a uuid for the filename
                $uuid = Text::uuid() . ".pdf";
                // Set the directory to save the file
                $targetPath = WWW_ROOT . '/pdf/' . $uuid;
                // SAve the file
                $files['file']->moveTo($targetPath);
                $internship->pdf_url = $uuid; 
            }

            if ($this->Internships->save($internship)) {
                // Saved successfully
                $this->Flash->success(__('The internship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // Save failed
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $this->set(compact('internship'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        // Get internship by $id
        $internship = $this->Internships->get($id);
        if ($this->Internships->delete($internship)) {
            // Delete success
            $this->Flash->success(__('The internship has been deleted.'));
        } else {
            // Delete failed
            $this->Flash->error(__('The internship could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
