<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Internship'), ['action' => 'edit', $internship->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Internship'), ['action' => 'delete', $internship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internship->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Internships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Internship'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="internships view content">
            <h3><?= h($internship->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company Name') ?></th>
                    <td><?= h($internship->company_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company Location') ?></th>
                    <td><?= h($internship->company_location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Job Type') ?></th>
                    <td><?= h($internship->job_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($internship->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($internship->user_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Applications') ?></h4>
                <?php if (!empty($internship->applications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Internship Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($internship->applications as $applications) : ?>
                        <tr>
                            <td><?= h($applications->id) ?></td>
                            <td><?= h($applications->internship_id) ?></td>
                            <td><?= h($applications->user_id) ?></td>
                            <td><?= h($applications->created_at) ?></td>
                            <td><?= h($applications->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
