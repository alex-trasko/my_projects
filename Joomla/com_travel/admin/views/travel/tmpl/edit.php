<?php

// No direct access to this file
defined('_JEXEC') or die;

// load tooltip behavior
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>

<script language="javascript" type="text/javascript">

    Joomla.submitbutton = function(task)
    {
        if (task == 'travel.cancel' || document.formvalidator.isValid(document.id('travel-form'))) {
            Joomla.submitform(task, document.getElementById('travel-form'));
        }
    }

</script>

<script type="text/javascript">
    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function(responses) {
            if (responses && responses.length > 0) {
                updateMarkerAddress(responses[0].formatted_address);
            } else {
                updateMarkerAddress('Cannot determine address at this location.');
            }
        });
    }

    function updateMarkerStatus(str) {
        document.getElementById('marker-status').innerHTML = str;
    }

    function updateMarkerPosition(latLng) {
        document.getElementById('info').innerHTML = [
            latLng.lat(),
            latLng.lng()
        ].join(', ');
        document.getElementById('jform_lat').value = latLng.lat();
        document.getElementById('jform_lng').value = latLng.lng();
    }

    function updateMarkerAddress(str) {
        document.getElementById('address').innerHTML = str;
    }

    function initialize() {

        var lat = document.getElementById('jform_lat').value;
        var lng = document.getElementById('jform_lng').value;

        if (lat!=0 && lng!=0){
            var latLng = new google.maps.LatLng(lat, lng);
        }else{
            var latLng = new google.maps.LatLng(40, -100);
        }

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 4,
            center: latLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marker = new google.maps.Marker({
            position: latLng,
            title: 'Point A',
            map: map,
            draggable: true
        });

        // Update current position info.
        updateMarkerPosition(latLng);
        geocodePosition(latLng);

        // Add dragging event listeners.
        google.maps.event.addListener(marker, 'dragstart', function() {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function() {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
        });
    }

    // Onload handler to fire off the app.
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
    #map-canvas {
        width: 500px;
        height: 400px;
    }
    #info-panel {
        margin-top: 10px;
    }
    #info-panel div {
        margin-bottom: 5px;
    }
</style>

<form action="<?php echo JRoute::_('index.php?option=com_travel&layout=edit&id='.(int)$this->item->id); ?>" method="post" name="adminForm" id="travel-form" enctype="multipart/form-data">
    <div class="width-50 fltlft">

        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_TRAVEL_TABS_DETAILS'); ?></legend>

            <ul class="adminformlist">
                <?php foreach ($this->form->getFieldset('details') as $field): ?>
                <li><?php
                    echo $field->label;
                    echo $field->input;
                    ?></li>
                <?php endforeach; ?>
            </ul>

            <div class="clr"></div>
            <?php echo $this->form->getLabel('description'); ?>
            <div class="clr"></div>
            <?php echo $this->form->getInput('description'); ?>

        </fieldset>
    </div>
    <div class="width-50 fltrt">

        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_TRAVEL_TABS_MAP'); ?></legend>

            <div class="clr"></div>
            <div id="map-canvas"></div>
            <div id="info-panel">
                <b>Marker status:</b>
                <div id="marker-status"><i>Click and drag the marker.</i></div>
                <b>Current position:</b>
                <div id="info"></div>
                <b>Closest matching address:</b>
                <div id="address"></div>
            </div>

        </fieldset>

    </div>
	<div>
		<input type="hidden" name="task" value="travel.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>