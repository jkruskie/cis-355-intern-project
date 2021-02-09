<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship[]|\Cake\Collection\CollectionInterface $internships
 */
?>
<div class="internships index content">
    <?= $this->Html->link(__('New Internship'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Internships') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('company_location') ?></th>
                    <th><?= $this->Paginator->sort('job_type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($internships as $internship): ?>
                <tr>
                    <td><?= h($internship->company_name) ?></td>
                    <td><?= h($internship->company_location) ?></td>
                    <td><?= h($internship->job_type) ?></td>
                    <td class="actions">
                        <?php
                            if($this->request->getAttribute('identity')['user_type'] == 0) {
                                // Student
                                echo $this->Html->link(__('Apply'), ['action' => 'view', $internship->id]);   
                            } else {
                                // Employer
                                echo $this->Html->link(__('Edit'), ['action' => 'edit', $internship->id]);
                                echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $internship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internship->id)]);
                            }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
