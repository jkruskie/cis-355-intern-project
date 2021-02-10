<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="row text-center">
    <div class="column-responsive column-100">
        <div class="internships form content">
            <?= $this->Form->create($internship) ?>
            <fieldset>
                <legend><?= __('Add Internship') ?></legend>
                <?php
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
