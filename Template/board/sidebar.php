<?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
<li <?= $this->app->checkMenuSelection('SortBoardByDatesConfigController', 'show', 'SortBoardByDates') ?>>
    <?= $this->url->link(t('Board sort-settings'), 'SortBoardByDatesConfigController', 'show', array('plugin' => 'SortBoardByDates','project_id' => $project['id'])) ?>
</li>
<?php endif ?>