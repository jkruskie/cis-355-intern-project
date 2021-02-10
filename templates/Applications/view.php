<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<div class="row text-center">
    <div class="column-responsive column-100">
        <div class="applications view content">
            <table>
                <tr>
                    <th><?= __('Internship') ?></th>
                    <td><?= $application->has('internship') ? $this->Html->link($application->internship->company_name, ['controller' => 'Internships', 'action' => 'view', $application->internship->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= $application->has(
                        'user') ? $this->Html->link($application->user->first_name . " " . $application->user->last_name, ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($application->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
