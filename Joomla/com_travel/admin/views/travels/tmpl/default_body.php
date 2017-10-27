<?php

// No direct access to this file
defined('_JEXEC') or die;

foreach ($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
        <td class="center">
            <?php echo JHtml::_('jgrid.published', $item->published, $i, 'travels.', true, 'cb', null, null); ?>
        </td>
        <td class="center" style=" width: 10%;">
            <img src='<?php echo '/' . $item->image_thumb; ?>'/>
        </td>
		<td>
            <a href="<?php echo JRoute::_('index.php?option=com_travel&task=travel.edit&id='.$item->id);?>">
                <?php echo $item->title; ?>
            </a>
		</td>
        <td>
            <?php echo $item->place; ?>
        </td>
        <td style=" width: 5%;">
            <?php echo $item->start_date; ?>
        </td>
        <td style=" width: 5%;">
            <?php echo $item->end_date; ?>
        </td>
        <td>
			<?php echo $item->description; ?>
		</td>
	</tr>
<?php endforeach; ?>