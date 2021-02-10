<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
$this->loadHelper('Authentication.Identity');

?>
<div class="row text-center">
    <div class="column-responsive column-100">
        <div class="applications form content">
            <?= $this->Form->create($application) ?>
            <fieldset>
                <legend><?= __('Apply for Internship') ?></legend>
                <?php
                    $user = $this->Identity;
                    $name = $user->get('first_name') . " " . $user->get('last_name');
                    echo $this->Form->control('company_name', ['value' => $internships->first()->get('company_name')]);
                    echo $this->Form->control('company_location', ['value' => $internships->first()->get('company_location')]);
                    echo $this->Form->control('job_type', ['value' => $internships->first()->get('job_type')]);
                    echo $this->Form->control('name', ['value' => $name ]);
                    echo $this->Form->control('years_of_college', ['value' => $this->Identity->get('school_years') ]);
                    echo $this->Form->control('major', ['value' => $this->Identity->get('major') ]);

                    if($internships->first()->get('pdf_url')) {
                        // Has PDF
                        echo('<a target="_blank" href="/pdf/' . $internships->first()->get('pdf_url') . '"><button type="button">Job Description</button></a>');
                    }
                        // No PDF
                
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
