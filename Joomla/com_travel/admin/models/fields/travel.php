<?php

// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Partner Form Field class for the Travel component
 */
class JFormFieldTravel extends JFormFieldList
{
    /**
     * The field type.
     *
     * @var		string
     */
	protected $type = 'Travel';

    /**
     * Method to get a list of options for a list input.
     *
     * @return	array		An array of JHtml options.
     */
	protected function getOptions() 
	{
		// Получаем объект базы данных.
		$db = JFactory::getDBO();

		// Конструируем SQL запрос.
		$query = $db->getQuery(true);
		$query->select('id, title, image, image_thumb, image_full, place, start_date, end_date, description, lat, lng, published')
				->from('#__travel');
		$db->setQuery($query);
		$travels = $db->loadObjectList();

		// Массив JHtml опций.
		$options = array();
		if ($travels)
		{
			foreach($travels as $travel)
			{
				$options[] = JHtml::_('select.option',
                    $travel->id, $travel->title, $travel->image,
                    $travel->image_thumb, $travel->image_full, $travel->place,
                    $travel->start_date, $travel->end_date, $travel->description,
                    $travel->lat, $travel->lng, $travel->published);
            }
		}
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}