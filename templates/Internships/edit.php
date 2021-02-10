<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="row text-center">
    <div class="column-responsive column-100">
        <div class="internships form content">
            <?= $this->Form->create($internship, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Internship') ?></legend>
                <?php
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('company_location');
                    echo $this->Form->control('job_type');
                    echo $this->Form->label('PDF File');
                    echo $this->Form->input('file',array( 'type' => 'file', 'accept' => 'application/pdf'));
                    ?>
            </fieldset>
            <?= $this->Form->button(__('Upload', true)) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
