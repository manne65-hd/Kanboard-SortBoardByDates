<style>
/* As I use 2 FontAwesome-Icons to indicate SORT-Method ... I need a way to move them closer to each other(and also pretend they are one icon) ... without messing with the general styling */
.fa-sortboardbyicon {width: 0.7em !important; background-color: #D6DBDF !important; padding: 1px 5px 1px 1px !important;}
</style>
<?php
    $SortBoardBy_Method = $this->task->projectMetadataModel->get($project['id'], 'SortBoardBy_Method', 'sortboardby_kb_default');

    if ( $SortBoardBy_Method == "sortboardby_date_due") {
        $mouseovertext = t('TASKS > Sorted by due date');
        $sorticon = 'calendar-check-o';
    } elseif ( $SortBoardBy_Method == "sortboardby_date_started") {
        $mouseovertext = t('TASKS > Sorted by start date');
        $sorticon = 'arrow-circle-right';
    } elseif ( $SortBoardBy_Method == "sortboardby_date_creation") {
        $mouseovertext = t('TASKS > Sorted by the date they were created');
        $sorticon = 'plus';
    } elseif ( $SortBoardBy_Method == "sortboardby_date_modification") {
        $mouseovertext = t('TASKS > Sorted by the date they were last modified');
        $sorticon = 'edit';
    } elseif ( $SortBoardBy_Method == "sortboardby_date_moved") {
        $mouseovertext = t('TASKS > Sorted by the date they were last moved');
        $sorticon = 'arrows';
    } elseif ( $SortBoardBy_Method == "sortboardby_date_completed") {
        $mouseovertext = t('TASKS > Sorted by the date they were closed');
        $sorticon = 'times';
    } else {
        $mouseovertext = '';
        $sorticon = '';
    }

    if ( $SortBoardBy_Method == "sortboardby_kb_default") {
        $tabtext = t('Board');
    } else {
        $tabtext = t('Board') . ' <span title="' . $mouseovertext . '"><i class="fa fa-fw fa-sortboardbyicon fa-sort-amount-asc aria-hidden="true"></i><i class="fa fa-fw fa-sortboardbyicon fa-' . $sorticon . '" aria-hidden="true"></i></span>';
    }

?>

<ul class="views">
    
    <?= $this->hook->render('template:project-header:view-switcher-before-project-overview', array('project' => $project, 'filters' => $filters)) ?>

    <li <?= $this->app->checkMenuSelection('ProjectOverviewController') ?>>
        <?= $this->url->icon('eye', t('Overview'), 'ProjectOverviewController', 'show', array('project_id' => $project['id'], 'search' => $filters['search']), false, 'view-overview', t('Keyboard shortcut: "%s"', 'v o')) ?>
    </li>

    <?= $this->hook->render('template:project-header:view-switcher-before-board-view', array('project' => $project, 'filters' => $filters)) ?>

    <li <?= $this->app->checkMenuSelection('BoardViewController') ?>>
        <?= $this->url->icon('th', $tabtext, 'BoardViewController', 'show', array('project_id' => $project['id'], 'search' => $filters['search']), false, 'view-board', t('Keyboard shortcut: "%s"', 'v b')) ?>
    </li>

    <?= $this->hook->render('template:project-header:view-switcher-before-task-list', array('project' => $project, 'filters' => $filters)) ?>

    <li <?= $this->app->checkMenuSelection('TaskListController') ?>>
        <?= $this->url->icon('list', t('List'), 'TaskListController', 'show', array('project_id' => $project['id'], 'search' => $filters['search']), false, 'view-listing', t('Keyboard shortcut: "%s"', 'v l')) ?>
    </li>

    <?= $this->hook->render('template:project-header:view-switcher', array('project' => $project, 'filters' => $filters)) ?>
</ul>
