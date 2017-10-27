<?php

// No direct access to this file
defined('_JEXEC') or die;
?>
<tr>
	<th width="5">
		<?php echo JText::_('COM_TRAVEL_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>
    <th width="5%">
        <?php echo JText::_('COM_TRAVEL_HEADING_PUBLISHED'); ?>
    </th>
    <th>
        <?php echo JText::_('COM_TRAVEL_HEADING_IMAGE'); ?>
    </th>
	<th>
		<?php echo JText::_('COM_TRAVEL_HEADING_TITLE'); ?>
	</th>
    <th>
        <?php echo JText::_('COM_TRAVEL_HEADING_PLACE'); ?>
    </th>
    <th>
        <?php echo JText::_('COM_TRAVEL_HEADING_START_DATE'); ?>
    </th>
    <th>
        <?php echo JText::_('COM_TRAVEL_HEADING_END_DATE'); ?>
    </th>
    <th>
		<?php echo JText::_('COM_TRAVEL_HEADING_DESCRIPTION'); ?>
	</th>
</tr>