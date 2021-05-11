<?php

namespace Kanboard\Plugin\SortBoardByDates;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // Template OVERRIDES ...
        $this->template->setTemplateOverride('project_header/views', 'SortBoardByDates:project_header/views');
        $this->template->setTemplateOverride('board/table_tasks', 'SortBoardByDates:board/table_tasks');
        // make compatible with PLUGIN DelegateTask
        if (file_exists('plugins/DelegateTask')){
            $this->template->setTemplateOverride('board/table_column', 'SortBoardByDates:board/table_column_with_delegate_task');
        } else {
            $this->template->setTemplateOverride('board/table_column', 'SortBoardByDates:board/table_column_vanilla');
        }
        // Template HOOK-attachments ...
        $this->template->hook->attach('template:project:dropdown', 'SortBoardByDates:board/dropdown');
        $this->template->hook->attach('template:project:sidebar', 'SortBoardByDates:board/sidebar');
    }

    public function onStartup() {
        // load Translation
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'Sort_Board_By_Dates';
    }

    public function getPluginDescription()
    {
        return t('Allows boards to be sorted by different dates(Date due, started, created, modified, moved, closed) or in kanboard default-mode');
    }

    public function getPluginAuthor()
    {
        return 'Manfred Hoffmann';
    }

    public function getPluginVersion()
    {
        return '0.8.2';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/manne65-hd/kanboard-SortBoardByDates';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.18';
    }
}
