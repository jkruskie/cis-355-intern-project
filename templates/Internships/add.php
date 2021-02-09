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
            <?= $this->Html->link(__('List Internships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="internships form content">
            <?= $this->Form->create($internship) ?>
            <fieldset>
                <legend><?= __('Add Internship') ?></legend>
                <?php
                    echo $this->Form->control('user_id');
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('company_location');
                    echo $this->Form->control('job_type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
