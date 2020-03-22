<?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
<div class="page-header">
    <h2><?= t('Sort-settings for the project-board') . ' "' .   $project['name'] . '"' ?></h2>
</div>
<form method="post" action="<?= $this->url->href('SortBoardByDatesConfigController', 'save', array('plugin' => 'SortBoardByDates','project_id' => $project['id'])) ?>" autocomplete="off">


    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>

    <fieldset>
        <legend><?= t('Sort method') ?></legend>
        <?= $this->form->radios('SortBoardBy_Method', array(
                'sortboardby_kb_default' => t('Show tasks in board order (Kanboard Default-method)'),
                'sortboardby_date_due' => t('Show tasks sorted by due date'),
                'sortboardby_date_started' => t('Show tasks sorted by start date'),
                'sortboardby_date_creation' => t('Show tasks sorted by the date they were created'),
                'sortboardby_date_modification' => t('Show tasks sorted by the date they were last modified'),
                'sortboardby_date_moved' => t('Show tasks sorted by the date they were last moved'),
                'sortboardby_date_completed' => t('Show tasks sorted by the date they were closed'),
            ),
            $values
        ) ?>
    </fieldset>
    <fieldset>
        <legend><?= t('Sort method for other tasks') ?></legend>
        <?= $this->form->radios('SortBoardBy_UndatedOrder', array(
                'sortboardby_undatedorder_before' => t('Show other tasks BEFORE the tasks sorted by date'),
                'sortboardby_undatedorder_after' => t('Show other tasks AFTER the tasks sorted by date'),
            ),
            $values
        ) ?>
        <hr><i class="fa fa-fw fa-question-circle-o aria-hidden="true"></i>
        <?= t('Defines where to display tasks, that have no date-information for the method selected above'); ?>
        <em>(<?= t('Has no effect, if sort-method is set to "board order"'); ?>)</em>
    </fieldset>


    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>
<?php endif ?>
