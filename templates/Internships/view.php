<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="row text-center">
    <div class="column-responsive column-100">
        <div class="internships view content">
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
                    <th><?= __('PDF Download') ?></th>
                    <td><a target="_blank" href="/pdf/<?= h($internship->pdf_url) ?>"><input class='myclass' type='button' value='Download'/></a></td>
                </tr>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Applications') ?></h4>
                <?php if (!empty($internship->applications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($internship->applications as $applications) : ?>
                        <tr>
                            <td><?= h($applications->user_id) ?></td>
                            <td><?= h($applications->created_at) ?></td>
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
