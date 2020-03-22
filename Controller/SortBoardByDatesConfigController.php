<?php

namespace Kanboard\Plugin\SortBoardByDates\Controller;
use Kanboard\Controller\BaseController;

class SortBoardByDatesConfigController extends BaseController
{
    public function show(array $values = array(), array $errors = array())
    {
        // Need to find out how to protect this from being accessible via direct url to non-project-managers ...
        // for now I solved it by showing a blank page in settings.php
        $project = $this->getProject();
        $this->response->html($this->helper->layout->project('SortBoardByDates:settings', array(
            'owners' => $this->projectUserRoleModel->getAssignableUsersList($project['id'], true),
            'values' => array(
                'SortBoardBy_Method' => $this->projectMetadataModel->get($project['id'], 'SortBoardBy_Method', 'sortboardby_kb_default'),
                'SortBoardBy_UndatedOrder' => $this->projectMetadataModel->get($project['id'], 'SortBoardBy_UndatedOrder', 'sortboardby_undatedorder_before'),
                'project_id' => $project['id'],
                ),
            'errors' => $errors,
            'project' => $project,
            'title' => t('Edit project')
        )));

    }


    public function save()
    {
        $values =  $this->request->getValues();
        $errors = array();
        $project = $this->getProject();

        $this->projectMetadataModel->save($project['id'], array('SortBoardBy_Method' => $values["SortBoardBy_Method"]));
        $this->projectMetadataModel->save($project['id'], array('SortBoardBy_UndatedOrder' => $values["SortBoardBy_UndatedOrder"]));

        return $this->show($values, $errors);
    }

}
