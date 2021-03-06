<!DOCTYPE html>
<html>
    <head>
        <title>Peta</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px
            }
            #legend {
                font-family: Arial, sans-serif;
                background: #fff;
                padding: 10px;
                margin: 10px;
                border: 3px solid #000;
            }
            #floating-panel {
                position: absolute;
                top: 10px;
                left: 15%;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
                text-align: center;
                font-family: 'Roboto','sans-serif';
                line-height: 30px;
                padding-left: 10px;
            }
            body {font-family: Arial, Helvetica, sans-serif;}

            /* The Modal (background) */
            .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              padding-top: 100px; /* Location of the box */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
              position: relative;
              background-color: #fefefe;
              margin: auto;
              padding: 0;
              border: 1px solid #888;
              width: 60%;
              box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
              -webkit-animation-name: animatetop;
              -webkit-animation-duration: 0.4s;
              animation-name: animatetop;
              animation-duration: 0.4s
            }

            /* Add Animation */
            @-webkit-keyframes animatetop {
              from {top:-300px; opacity:0}
              to {top:0; opacity:1}
            }

            @keyframes animatetop {
              from {top:-300px; opacity:0}
              to {top:0; opacity:1}
            }

            /* The Close Button */
            .close {
              color: white;
              float: right;
              font-size: 28px;
              font-weight: bold;
            }

            .close:hover,
            .close:focus {
              color: #000;
              text-decoration: none;
              cursor: pointer;
            }

            .modal-header {
              padding: 2px 16px;
              background-color: #5cb85c;
              color: white;
            }

            .modal-body {padding: 2px 16px;}

            .modal-footer {
              padding: 2px 16px;
              background-color: #5cb85c;
              color: white;
            }

        </style>
        <script src="<?php echo base_url(); ?>assets/backend/js/jquery.js"></script>
        <script>
            var item;
            var tipe;
            var data;
            var pos;
            var gmarker = [];
            var delay = 3000; // 10 second delay

            function initialize() {

                var myLatlng = new google.maps.LatLng(-6.4328061,106.806266);
                var mapOptions = {
                    center: myLatlng,
                    zoom: 11.5,
                    zoomControl: true,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.DEFAULT,
                    },
                    disableDoubleClickZoom: true,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    },
                    scaleControl: true,
                    scrollwheel: true,
                    streetViewControl: true,
                    draggable: true,
                    overviewMapControl: true,
                    overviewMapControlOptions: {
                        opened: false,
                    },
                    mapTypeId: 'roadmap',
                };
                var Coords = [
                    {lat: -6.362254, lng: 106.770072},
                    {lat: -6.462254, lng: 106.780072},
                    {lat: -6.3362254, lng: 106.78072},
                    {lat: -6.4562254, lng: 106.7570072}
                   ];


                var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
                var icons = {
                    online: {
                        name: 'Online',
                        //icon: iconBase + 'library_maps.png'
                        icon: '<?php echo base_url(); ?>assets/backend/images/map/on.png'
                    },
                    offline: {
                        name: 'Offline',
                        //icon: iconBase + 'library_maps.png'
                        icon: '<?php echo base_url(); ?>assets/backend/images/map/off2.png'
                    },
                    tinggi: {
                        name: 'Zona Tinggi',
                        //icon: iconBase + 'library_maps.png'
                        icon: '<?php echo base_url(); ?>assets/backend/images/map/4.png'
                    },
                    sedang: {
                        name: 'Zona Sedang',
                        //icon: iconBase + 'library_maps.png'
                        icon: '<?php echo base_url(); ?>assets/backend/images/map/5.png'
                    },
                    rendah: {
                        name: 'Zona Rendah',
                        //icon: iconBase + 'library_maps.png'
                        icon: '<?php echo base_url(); ?>assets/backend/images/map/3.png'
                    }
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var legend = document.getElementById('legend');
                for (var key in icons) {
                    var type = icons[key];
                    var name = type.name;
                    var icon = type.icon;
                    var div = document.createElement('div');
                    div.innerHTML = '<img src="' + icon + '"> ' + name;
                    legend.appendChild(div);
                }
                map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('legend'));


                setMapOnAll(null);
                  gmarker = [];
                  $.getJSON('<?php echo site_url()."backend/peta/data"; ?>', function(data) {
                    // marker.setMap(null);
                    setMarkers(map, data);
                  });
                  $.getJSON('<?php echo site_url()."backend/peta/data2"; ?>', function(data2) {
                    // marker.setMap(null);
                    setMarkers2(map, data2);
                  });

                setInterval(function(){
                  setMapOnAll(null);
                  gmarker = [];
                  $.getJSON('<?php echo site_url()."backend/peta/data"; ?>', function(data) {
                    // marker.setMap(null);
                    setMarkers(map, data);
                  });
                  $.getJSON('<?php echo site_url()."backend/peta/data2"; ?>', function(data2) {
                    // marker.setMap(null);
                    setMarkers2(map, data2);
                  });
                }, 30000);

                var overlay = new google.maps.Polygon({
                   paths: Coords,
                   strokeColor: '#FF0000',
                   strokeOpacity: 0.8,
                   strokeWeight: 2,
                   fillColor: '#FF0000',
                   fillOpacity: 0.35
                 });
                 // overlay.setMap(map);
            }

            function setMapOnAll(map) {
              for (var i = 0; i < gmarker.length; i++) {
                gmarker[i].setMap(map);
              }
            }


              function setMarkers(map, locations) {
                  var shape = {
                      coord: [1, 1, 1, 20, 18, 20, 18, 1],
                      type: 'poly'
                  };
                  for (var i = 0; i < locations.length; i++) {
                      item = locations[i];
                      var myLatLng = new google.maps.LatLng(parseFloat(item[1]), parseFloat(item[2]));
                      tipe = item[5];
                      var simbol = {
                          online: {
                            icon: '<?php echo base_url(); ?>assets/backend/images/map/on.png'
                          },
                          offline: {
                            icon: '<?php echo base_url(); ?>assets/backend/images/map/off2.png'
                          }
                      };
                      var image = {
                          url: simbol[tipe].icon,
                          size: new google.maps.Size(35, 32),
                          origin: new google.maps.Point(0, 0),
                          anchor: new google.maps.Point(0, 32)
                      };
                      var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map,
                          icon: image,
                          //icon: icons[tipe].icon,
                          category:item[5],
                          shape: shape,
                          title: "Petugas " + item[0],
                          zIndex: Number(item[3])
                      });

                      gmarker.push(marker);

                      var infowindow = new google.maps.InfoWindow({
                          maxWidth: 320,
                          maxHeight: 320,
                          content: '<center><img src="<?php echo base_url('assets/upload/'); ?>'+ item[7] +'" style="width:100px"><h3>' + item[0] + '</h3> <p><b>Presensi:</b> '+item[6]+'</p><p><b>Lokasi:</b> '+item[8]+'</p></center>'
                      });
                      makeInfoWindowEvent(map, infowindow, marker);
                  }
              }

              function setMarkers2(map, locations) {
                  var shape = {
                      coord: [1, 1, 1, 20, 18, 20, 18, 1],
                      type: 'poly'
                  };
                  for (var i = 0; i < locations.length; i++) {
                      item = locations[i];
                      var myLatLng = new google.maps.LatLng(parseFloat(item[1]), parseFloat(item[2]));
                      tipe = item[3];
                      var simbol = {
                          tinggi: {
                            icon: '<?php echo base_url(); ?>assets/backend/images/map/4.png'
                          },
                          sedang: {
                            icon: '<?php echo base_url(); ?>assets/backend/images/map/5.png'
                          },
                          rendah: {
                            icon: '<?php echo base_url(); ?>assets/backend/images/map/3.png'
                          }
                      };
                      var image = {
                          url: simbol[tipe].icon,
                          size: new google.maps.Size(35, 32),
                          origin: new google.maps.Point(0, 0),
                          anchor: new google.maps.Point(0, 32)
                      };
                      var marker = new google.maps.Marker({
                          position: myLatLng,
                          map: map,
                          icon: image,
                          //icon: icons[tipe].icon,
                          category:item[3],
                          shape: shape,
                          title: "Lokasi " + item[0],
                          zIndex: Number(item[3])
                      });

                      gmarker.push(marker);

                      var infowindow = new google.maps.InfoWindow({
                          maxWidth: 320,
                          maxHeight: 320,
                          content: '<center><h3>' + item[0] + '</h3> <p><b>Zona :</b> '+item[3]+'</p><p><b>Jenis :</b> '+item[4]+'</p></center>'
                      });
                      makeInfoWindowEvent(map, infowindow, marker);
                  }
              }

            function makeInfoWindowEvent(map, infowindow, marker) {
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            filterMarkers = function (category) {
                for (i = 0; i < pos.length; i++) {
                   lokasi=gmarker[i];
                   alert(category);
                    if (lokasi.category == category || category.length === 0) {
                        lokasi.setVisible(true);
                    }
                    else {
                        lokasi.setVisible(false);
                    }
                }
            }


            function loadScript() {
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4&callback=initialize";
                document.body.appendChild(script);
            }
            window.onload = loadScript;

        </script>
    </head>
    <body>
        <!--<div id="floating-panel">-->
        <!--    <input type="button" value="Semua Tipe" onclick="filterMarkers('')"></input>-->
        <!--    <input type="button" value="Online" onclick="filterMarkers('online')"></input>-->
        <!--    <input type="button" value="Offline" onclick="filterMarkers('offline')"></input>-->
        <!--</div>-->
        <div id="map-canvas"></div>
        <div id="legend">
            Legenda
        </div>
    </body>
</html>
