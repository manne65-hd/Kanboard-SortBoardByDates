Sort Board By Dates for kanboard
================================

Allows boards to be sorted by different dates
- Date due, started, created, modified, moved, closed ...
- ... or *(of course)* in kanboard default-mode
  - The new actions to reorder tasks by column *(coming with Kanboard 1.2.9 and 1.2.11)* are ONLY displayed, if the current board is set to kanboard's default sort-method!
- ONLY project-managers/admins can set the preferences via a new "Board sort-settings"-panel on a per-project base
- includes german translation

The plugin is **not** intended to provide a fast method to change the sort-method for every user, but is rather aimed to enable special workflows, by forcing a project-board to be sorted in the way, that the project-manager(s) configure that project.

Screenshots
-----------

#### Settings panel
The settings panel allows you to change the sort-method for the current project. By default this is set to *board-order*, which is basically Kanboard's default sort-method.

Alternatively you can choose to sort the tasks by **one** of the listed date-fields in ascending order. You can also define how to sort tasks, that have no date-information in the selected field.

![New ProjectSettings](https://user-images.githubusercontent.com/48651533/77249323-813a2680-6c40-11ea-9b77-a22d750b02e0.png)

#### Direct access to settings-panel via project-dropdown
Besides the option to configure this plugin in the new settings-panel via *Configure this project / Board sort-settings* , you can directly call this panel from  the project-dropdown by clicking the new option *Board sort-settings*

![New ProjectDropdown](https://user-images.githubusercontent.com/48651533/77249294-53ed7880-6c40-11ea-9e30-b9ae1fece58b.png)

#### Board-view
If any other than the default sort-method is selected, there is an icon next to the *board-TAB* indicating that sort-method. In addition you can get a plaintext-tooltip by hovering the mouse over that icon.

![New BoardView](https://user-images.githubusercontent.com/48651533/77249329-89926180-6c40-11ea-9bcd-5ab3a9800b7a.png)

#### New actions to reorder tasks by column NOT displayed!
The new actions to reorder tasks by column *(coming with Kanboard 1.2.9 and 1.2.11)* are NOT displayed, if the current board is set to a NON-default sort-method, because this plugin will overrule these settings.

If the current board is set to the Kanboard-default sort-method the new actions are of course available!

![NewKanboardSortMethods1 2 11-disabled](https://user-images.githubusercontent.com/48651533/77260730-101f6100-6c8a-11ea-9b66-55610b568985.png)

ToDo ...
--------
Need to improve the plugin to adress this issue:
https://github.com/manne65-hd/Kanboard-SortBoardByDates/issues


Credits
-------
This plugin is based on the work of [David Morlitz](https://github.com/dmorlitz), the author of the [kanboard-duedate-plugin](https://github.com/dmorlitz/kanboard-duedate)

While I was looking for a way to sort a project-board by start or due-date, I found his plugin. While it did part of what I was looking for, I was missing other features. That's why I decided to make my own version.

Author
------

- Manfred Hoffmann
- License MIT

Requirements
------------

- Kanboard >= 1.2.18

Installation
------------

You have the choice between 2 methods:

1. Download the zip file and decompress everything under the directory `plugins/SortBoardByDates`
2. Clone this repository into the folder `plugins/SortBoardByDates`

Note: Plugin folder is case-sensitive.
