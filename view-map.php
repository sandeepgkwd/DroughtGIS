<!DOCTYPE html>
<html lang="en">
  <head> 
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geomapper Ground truth entry</title>

    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="dist/css/navbar.css" rel="stylesheet">
	<link href="dist/css/custom.css" rel="stylesheet">
    <!-- Le styles -->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Norican">
     <link type="text/css" rel="stylesheet" href="assets/leaflet/leaflet.css" />
    <!--[if lte IE 8]><link type="text/css" rel="stylesheet" href="assets/leaflet/leaflet.ie.css" /><![endif]-->
    <link type="text/css" rel="stylesheet" href="assets/leaflet/plugins/leaflet.markercluster/MarkerCluster.css" />
    <link type="text/css" rel="stylesheet" href="assets/leaflet/plugins/leaflet.markercluster/MarkerCluster.Default.css" />
   
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
<style type="text/css">
      html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
        position: absolute;
        overflow:hidden;
      }
      #map {
        margin-top:40px;
        width:100%;
        height:100%;
      }
      #loading {
        position: absolute;
        width: 220px;
        height: 19px;
        top: 50%;
        left: 50%;
        margin: -10px 0 0 -110px;
        z-index: 20001;
      }
      #loading .loading-indicator {
        height: auto;
        margin: 0;
      }
      
      .leaflet-popup-content-wrapper, .leaflet-popup-tip {
        background: #f7f7f7;
      }
      .leaflet-control-geoloc {
        background-image: url(img/location.png);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
      }
.white{
    color:#000;
    background-color:#fff;
}

</style>
    
  </head>
  <body>
   
    
    <div id="map"></div>
    <div id="loading-mask" class="modal-backdrop" style="display:none;"></div>
    <div id="loading" style="display:none;">
        <div class="loading-indicator">
            <img src="img/ajax-loader.gif">
        </div>
    </div>

    <!-- Le javascript
    ================================================== -->
     <script type="text/javascript" src="assets/old-js/jquery.min.js"></script>
    
    <script type="text/javascript" src="assets/leaflet/leaflet.js"></script>
    <script type="text/javascript" src="assets/leaflet/plugins/leaflet.markercluster/leaflet.markercluster.js"></script>

    <script type="text/javascript">
  /*    var map, newUser, users, mapquest, firstLoad;

      firstLoad = true;

      //users = new L.FeatureGroup();
      users = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
      newUser = new L.LayerGroup();

      mapquest = new L.TileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 10,
        
        attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
      });

      map = new L.Map('map', {
        center: new L.LatLng(19.8762, 75.3433),
        zoom: 6,
        layers: [mapquest, users, newUser]
      });

	 
	  
	  
      // GeoLocation Control
      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }
      var geolocControl = new L.control({
        position: 'topright'
      });
      geolocControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
        div.innerHTML = '<a class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"></a>';
        return div;
      };
      
      map.addControl(geolocControl);
      map.addControl(new L.Control.Scale());

      //map.locate({setView: true, maxZoom: 3});

      $(document).ready(function() {
        $.ajaxSetup({cache:false});
        $('#map').css('height', ($(window).height() - 40));
        getUsers(); 
      });

      $(window).resize(function () {
        $('#map').css('height', ($(window).height() - 40));
      }).resize();

      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }

      function initRegistration() {
        map.addEventListener('click', onMapClick);
        $('#map').css('cursor', 'crosshair');
        return false;
      }

      function cancelRegistration() {
        newUser.clearLayers();
        $('#map').css('cursor', '');
        map.removeEventListener('click', onMapClick);
      }

      function getUsers() {
		   
        $.getJSON("farmer-map-json.php", function (data) {
          for (var i = 0; i < data.length; i++) {  
            var location = new L.LatLng(data[i].flatitude, data[i].flongitude);
			
            var name = data[i].fname;
            var pgproject = data[i].faddress;
			 
            if (data[i].fname.length > 0) {
              var title = "<div style='font-size: 18px; color: #0078A8;'><a href='"+ data[i].faddress +"' target='_blank'>"+ data[i].fname + "</a></div>";
            }
            else {
              var title = "<div style='font-size: 18px; color: #0078A8;'>"+ data[i].fname +"</div>";
            }
             
            var marker = new L.Marker(location, {
              title: name
            });
            marker.bindPopup("<div style='text-align: center; margin-left: auto; margin-right: auto;'>"+ title + pgproject +"</div>", {maxWidth: '400'});
            users.addLayer(marker);
          }
        }).complete(function() {
          if (firstLoad == true) {
            map.fitBounds(users.getBounds());
            firstLoad = false;
          };
        });
      }
*/
     // code for layer and marker from test-map.php
	 var map, newUser, users, mapquest, firstLoad, googleStreets, googleSat, googleTerrain;

      firstLoad = true;

      //users = new L.FeatureGroup();
      users = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
      newUser = new L.LayerGroup();

      mapquest = new L.TileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 20,
        
        attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
      });

     
// map for google 
	var osm = new L.TileLayer('http://{s}.tile.osmosnimki.ru/kosmo/{z}/{x}/{y}.png');
		googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
			maxZoom: 20,
			subdomains:['mt0','mt1','mt2','mt3']
	});
		
		googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
		maxZoom: 20,
		subdomains:['mt0','mt1','mt2','mt3']
	});
	
		googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
		maxZoom: 20,
		subdomains:['mt0','mt1','mt2','mt3']
	});

 map = new L.Map('map', {
        center: new L.LatLng(19.8762, 75.3433),
        zoom: 6,
		zoomControl: false 
		
      });
	  
	  var baseLayers = {
		"OSM": mapquest,
		"Google": googleStreets,
		"Imagery": googleSat,
		"Terrain": googleTerrain
	};

	var overlays = {
		"Marker": newUser,
		"Markers": users
		
	};
	
	var zoomControl= L.control.zoom({
		position: 'topright'
	});
	
	map.addControl(zoomControl); 
 	alert("map con trol added");
	//L.Control.Scale({width: 100, position: 'bottomleft'});
	  
      // GeoLocation Control
      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }
      var geolocControl = new L.control({
        position: 'bottomright'
      });
      geolocControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
        div.innerHTML = '<a class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"></a>';
        return div;
      };
      
      map.addControl(geolocControl);
      map.addControl(new L.Control.Scale());
	  L.control.layers(baseLayers, overlays, {position: 'topright'}).addTo(map);

      //map.locate({setView: true, maxZoom: 3});

      $(document).ready(function() {
        $.ajaxSetup({cache:false});
        $('#map').css('height', ($(window).height() - 40));
        getUsers(); 
		alert("ready");
      });

      $(window).resize(function () {
        $('#map').css('height', ($(window).height() - 40));
      }).resize();

      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }

       
		function getUsers() {
		   
        $.getJSON("farmer-map-json.php", function (data) {
          for (var i = 0; i < data.length; i++) {  
            var location = new L.LatLng(data[i].flatitude, data[i].flongitude);
			
            var name = data[i].fname;
            var pgproject = data[i].faddress;
			 
            if (data[i].fname.length > 0) {
              var title = "<div style='font-size: 18px; color: #0078A8;'><a href='"+ data[i].faddress +"' target='_blank'>"+ data[i].fname + "</a></div>";
            }
            else {
              var title = "<div style='font-size: 18px; color: #0078A8;'>"+ data[i].fname +"</div>";
            }
             
            var marker = new L.Marker(location, {
              title: name
            });
            marker.bindPopup("<div style='text-align: center; margin-left: auto; margin-right: auto;'>"+ title + pgproject +"</div>", {maxWidth: '400'});
            users.addLayer(marker);
          }
        }).complete(function() {
          if (firstLoad == true) {
            map.fitBounds(users.getBounds());
            firstLoad = false;
          };
        });
      }


   

      
    </script>

  </body>
</html>
