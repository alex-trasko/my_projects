<?php

// No direct access to this file
defined('_JEXEC') or die;
?>
<?php if (isset($this->issetId)) { ?>
<div class="travel">
    <div><img src ="/<?php echo $this->data[0]->image_full; ?>" ></div>
    <div><?php echo $this->data[0]->title; ?></div>
    <div><?php echo $this->data[0]->description; ?></div>
</div>
<?php exit; }  else { ?>
<?php if ($this->params->get('show_page_heading')) : ?>
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>

<script type="text/javascript">
//<![CDATA[
var map = null;
var mapMarkers = [];
var markerClusterer = null;
var mapHTMLS = [];
var mapInfoboxes = [];


function initialize() {

    var styles = [
        {
            featureType: "administrative",
            elementType: "labels",
            stylers: [
                { visibility: "off" }
            ]
        }
        , {
            featureType: "administrative",
            elementType: "geometry.fill",
            stylers: [
                { visibility: "off" }
            ]
        }
        , {
            featureType: "administrative",
            elementType: "geometry.stroke",
            stylers: [
                { color: "#ffffff" },
                { weight: "1.0" },
                { visibility: "on" }
            ]
        }
        , {
            featureType: "landscape",
            elementType: "all",
            stylers: [
                { color: "#21ace1" },
                { lightness: 0 },
                { saturation: 0 }
            ]
        }
        , {
            featureType: "poi",
            elementType: "all",
            stylers: [
                { visibility: "off" }
            ]
        }
        , {
            featureType: "road",
            elementType: "all",
            stylers: [
                { visibility: "off" }
            ]
        }
        , {
            featureType: "transit",
            elementType: "all",
            stylers: [
                { visibility: "off" }
            ]
        }
        , {
            featureType: "water",
            elementType: "all",
            stylers: [
                { color: "#efefef" },
                { lightness: 0 },
                { saturation: 0 },
                { visibility: "simplified" }
            ]
        }
    ];

    var latLng = new google.maps.LatLng(40, -100);

    var mapOptions = {
        zoom: 4,
        minZoom: 2,
        maxZoom: 8,
        center: latLng,
        disableDefaultUI: true,
        zoomControl: true,
        mapTypeControlOptions: {
            mapTypeIds: [ google.maps.MapTypeId.ROADMAP, 'dsfltravel' ]
        }
    }

    map = new google.maps.Map(document.getElementById("travel-map"), mapOptions);

    var styledMapOptions = {
        name: "DSFL Travel"
    }

    var jayzMapType = new google.maps.StyledMapType(styles, styledMapOptions);

    map.mapTypes.set('dsfltravel', jayzMapType);
    map.setMapTypeId('dsfltravel');

    loadMarker();
}

function loadInfo(id){
    $('#travel-info').html('<img src ="/media/com_travel/images/ajax-loader.gif" >');
    $.ajax({
        url: '/index.php?option=com_travel&tmpl=component',
        cache: false,
        type: 'GET',
        data: 'id='+id,
        dataType: 'html',
        success: function(html){
            //alert(html);
            $('#travel-info').html(html);
        }
    });
}

/**
 * Called when JSON is loaded. Creates sidebar if param_sideBar is true.
 * Sorts rows if param_rankColumn is valid column. Iterates through worksheet rows,
 * creating marker and sidebar entries for each row.
 * @param {JSON} json Worksheet feed
 */
function loadMarker() {

//    var bounds = new google.maps.LatLngBounds();

    if (markerClusterer) {
        markerClusterer.clearMarkers();
    }

    <?php foreach($this->data as $item) { ?>

        var id = <?php echo $item->id; ?>;
        var lat = <?php echo $item->lat; ?>;
        var lng = <?php echo $item->lng; ?>;
        var point = new google.maps.LatLng(lat,lng);
        var title = "<?php echo $item->place; ?>";
        var html = "<div style='font-size:12px'>";
        html += "<strong>" + "<?php echo $item->place; ?>" + "</strong>" + "<br />";
        html += "<?php echo $item->start_date; ?>"+" "+"<?php echo $item->end_date; ?>";
        html += "</div>";

        // create the marker
        var marker = createMarker(map,point,title,html,id);
        // map.addOverlay(marker);
        mapMarkers.push(marker);
        mapHTMLS.push(html);
//        bounds.extend(point);

    <?php } ?>

//    map.fitBounds(bounds);
//    map.setCenter(bounds.getCenter());

    var mcOptions = {gridSize: 50, maxZoom: 15};
    var markerClusterer = new MarkerClusterer(map, mapMarkers, mcOptions);

}

function createMarker(map, latlng, title, html, id) {
    var iconSize = new google.maps.Size(38, 38);
    var iconShadowSize = new google.maps.Size(38, 38);
    var iconHotSpotOffset = new google.maps.Point(19, 19);
    var iconPosition = new google.maps.Point(0, 0);

    var iconShadowUrl = "/media/com_travel/images/map-icon.png";
    var iconImageOutUrl = "/media/com_travel/images/map-icon.png";
    var iconImageOverUrl = "/media/com_travel/images/map-icon.png";
    var iconImageUrl = iconImageOutUrl;

    var markerShape = {coords: [19,19,19], type: "circle"}

    var markerShadow =
            new google.maps.MarkerImage(iconShadowUrl, iconShadowSize,
                    iconPosition, iconHotSpotOffset);

    var markerImage =
            new google.maps.MarkerImage(iconImageUrl, iconSize,
                    iconPosition, iconHotSpotOffset);

    var markerImageOver =
            new google.maps.MarkerImage(iconImageOverUrl, iconSize,
                    iconPosition, iconHotSpotOffset);

    var markerImageOut =
            new google.maps.MarkerImage(iconImageOutUrl, iconSize,
                    iconPosition, iconHotSpotOffset);

    var markerOptions = {
        title: title,
        shape: markerShape,
        icon: markerImage,
        shadow: markerShadow,
        position: latlng,
        map: map
    }

    var marker = new google.maps.Marker(markerOptions);

    google.maps.event.addListener(marker, "click", function() {

        loadInfo(id);

        mapInfoboxes.forEach(function(infobox, index) {
            // делаем что-то с элементом element, у которого индекс index
            if (infobox) infobox.close();
        });

        var options = {
            content: html,
            disableAutoPan: false,
            pixelOffset: new google.maps.Size(-30, -20),
            zIndex: null,
            boxStyle: {
                background: "url('/media/com_travel/images/map-infobox-bg.png') no-repeat",
                width: "95px",
                height: "35px",
                padding: "10px 10px 5px 45px",
                // color: "#30b2e3"
                color: "#ff0000"
            },
            closeBoxMargin: "0",
            closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false
        };
        var infobox = new InfoBox(options);
        infobox.open(map, marker);
        mapInfoboxes.push(infobox);
        marker.setIcon(markerImageOut);
    });
    google.maps.event.addListener(marker, "mouseover", function() {
        marker.setIcon(markerImageOver);
    });
    google.maps.event.addListener(marker, "mouseout", function() {
        marker.setIcon(markerImageOut);
    });

    return marker;
}

google.maps.event.addDomListener(window, 'load', initialize);
//]]>

</script>

<div id="travel-map" style="width:450px; height:450px"></div>
<div id="travel-info"></div>

<?php } ?>
