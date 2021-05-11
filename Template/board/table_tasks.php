<!-- task row -->

<?php
    $SortBoardBy_Method = $this->task->projectMetadataModel->get($project['id'], 'SortBoardBy_Method', 'sortboardby_kb_default');
    $SortBoardBy_UndatedOrder = $this->task->projectMetadataModel->get($project['id'], 'SortBoardBy_UndatedOrder', 'sortboardby_undatedorder_before');
    // Strip off prefix 'sortboardby_' to get the name of the date-field to be sorted by ...
    $SortBoardBy_CompareDate = substr($SortBoardBy_Method, 12);

    /* provide compatibilty with my AdvancedCardOptions-plugin
     *--------------------------------------------------------
     * The ACO-configuration-parameters have been passed into this template as $ACO_config
     * This ARRAY ... can(and will) be passed to next level of templates as $ACO!
    */
    $ACO_config = isset($ACO_config) ? $ACO_config : array();
?>

<tr class="board-swimlane board-swimlane-tasks-<?= $swimlane['id'] ?><?= $swimlane['task_limit'] && $swimlane['nb_tasks'] > $swimlane['task_limit'] ? ' board-task-list-limit' : '' ?>">
    <?php foreach ($swimlane['columns'] as $column): ?>
    <?php
        if ($SortBoardBy_Method != 'sortboardby_kb_default')  {
            uasort($column['tasks'], function($a, $b) use ($SortBoardBy_UndatedOrder, $SortBoardBy_CompareDate) {

                $datea = ( $SortBoardBy_UndatedOrder == 'sortboardby_undatedorder_before' ) ? PHP_INT_MIN : PHP_INT_MAX;
                $dateb=$datea;


                if ( !empty($a[$SortBoardBy_CompareDate]) ) {
                    $datea=$a[$SortBoardBy_CompareDate];
                }

                if ( !empty($b[$SortBoardBy_CompareDate]) ) {
                    $dateb=$b[$SortBoardBy_CompareDate];
                }

                if ($datea<=$dateb) {
                    $ret=-1;
                } else {
                    $ret=1;
                }

                return $ret;
                }
            );
        }
    ?>

        <td class="
            board-column-<?= $column['id'] ?>
            <?= $column['task_limit'] > 0 && $column['column_nb_open_tasks'] > $column['task_limit'] ? 'board-task-list-limit' : '' ?>
            "
        >

            <!-- tasks list -->
            <div
                class="board-task-list board-column-expanded <?= $this->projectRole->isSortableColumn($column['project_id'], $column['id']) ? 'sortable-column' : '' ?>"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">

                <?php foreach ($column['tasks'] as $task): ?>
                    <?= $this->render($not_editable ? 'board/task_public' : 'board/task_private', array(
                        'project' => $project,
                        'task' => $task,
                        'ACO' => $ACO_config,
                        'board_highlight_period' => $board_highlight_period,
                        'not_editable' => $not_editable,
                    )) ?>
                <?php endforeach ?>
            </div>

            <!-- column in collapsed mode (rotated text) -->
            <div class="board-column-collapsed board-task-list sortable-column"
                data-column-id="<?= $column['id'] ?>"
                data-swimlane-id="<?= $swimlane['id'] ?>"
                data-task-limit="<?= $column['task_limit'] ?>">
                <div class="board-rotation-wrapper">
                    <div class="board-column-title board-rotation board-toggle-column-view" data-column-id="<?= $column['id'] ?>" title="<?= $this->text->e($column['title']) ?>">
                        <i class="fa fa-plus-square" title="<?= t('Show this column') ?>" role="button" aria-label="<?= t('Show this column') ?>"></i> <?= $this->text->e($column['title']) ?>
                    </div>
                </div>
            </div>
        </td>
    <?php endforeach ?>
</tr>
