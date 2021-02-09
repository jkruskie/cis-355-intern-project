<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Application'), ['action' => 'edit', $application->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Application'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Applications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Application'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="applications view content">
            <h3><?= h($application->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Internship') ?></th>
                    <td><?= $application->has('internship') ? $this->Html->link($application->internship->id, ['controller' => 'Internships', 'action' => 'view', $application->internship->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $application->has('user') ? $this->Html->link($application->user->id, ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($application->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($application->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($application->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
