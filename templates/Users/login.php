<div class="row">
    <div class="column-responsive column-100 text-center">
        <div class="users form content">
            <?= $this->Form->create() ?>
                <fieldset>
                    <legend><?= __('Please enter your email and password') ?></legend>
                    <?= $this->Form->control('email') ?>
                    <?= $this->Form->control('password') ?>
                </fieldset>
                <?= $this->Form->button(__('Login')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
