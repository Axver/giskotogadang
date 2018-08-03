<?php

include 'pr_getdata.php';


 ?>

<html>

<head>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>
  <script
  			  src="https://code.jquery.com/jquery-3.3.1.js"
  			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			  crossorigin="anonymous"></script>


  <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
   integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
   crossorigin=""></script>

   <style media="screen">
     #mapid { height: 600px; width:600px; }
   </style>
</head>

<body>

  <div id="mapid"></div>

  <script type="text/javascript">

  var mymap = L.map('mapid').setView([-0.316728, 100.357469], 15);
  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.outdoors',
    accessToken: 'pk.eyJ1IjoiYXh2ZXI3IiwiYSI6ImNqOXNxdHF4bjBzb2czM2p6cmVzZzBwcXgifQ.l38Ez-rF1XCin25iUIynoQ'
}).addTo(mymap);

var argeojson = <?php echo json_encode($hasil) ?>;

var poli;
// L.geoJSON(jsonjalan).addTo(mymap);

for (var i = 0; i < argeojson.features.length; i++) {
    if (argeojson.features[i].properties.status == 'berisi') {
        console.log(argeojson.features[i].properties.gid);
        poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
        poli.setStyle({fillColor: '#00FF00'});
        poli.setStyle({fillOpacity: 0.5});
        poli.setStyle({color: 'none'});
        // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
        poli.bindPopup("<b>ID:</b> KG"+argeojson.features[i].properties.gid+"<br/>"+argeojson.features[i].properties.status);

    }
    else if (argeojson.features[i].properties.status == 'kosong') {

      poli=L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
      poli.setStyle({fillColor: '#FF0000'});
      poli.setStyle({fillOpacity: 0.5});
      poli.setStyle({color: 'none'});
      poli.bindPopup("<b>ID:</b> KG"+argeojson.features[i].properties.gid+"<br/>"+argeojson.features[i].properties.status);
      //   // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/><img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
    }
    else {
        poli=L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
        poli.setStyle({fillColor: '#FFD700'});
        poli.setStyle({fillOpacity: 0.5});
        poli.setStyle({color: 'none'});
        poli.bindPopup("<b>ID:</b> KG"+argeojson.features[i].properties.gid+"<br/>"+argeojson.features[i].properties.status);
        // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan <br/> <img src='../image/example.jpg'> <br/>-harga (Rp.xxxxxxxx)<br/> <p>Keterangan, keterangan,keterangan </p><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
    }
}

console.log(argeojson);

  </script>


  <select id="rumah" onchange="showrumah()">

    <option> Rumah Berisi </option>
    <option> Rumah Kosong </option>
    <option> Bukan Bangunan </option>

  </select>

  <script>




   function showrumah()
   {
     var poli;
     var argeojson = <?php echo json_encode($hasil) ?>;
     var status=document.getElementById("rumah").value;
     alert(status);
     // remove();
     if(status=="Rumah Berisi")
     {
       for (var i = 0; i < argeojson.features.length; i++) {
         if (argeojson.features[i].properties.status == 'berisi') {
             // console.log(argeojson.features[i].properties.gid);
             poli = L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
             poli.setStyle({fillColor: '#00FF00'});
             poli.setStyle({fillOpacity: 0.5});
             poli.setStyle({color: 'none'});
             // poli.bindPopup("<b>Info Lahan!</b><br>Disini Info Seputar Lahan<br/> <img src='../image/example.jpg'> <br/><button class='btn btn-info'> Info Lahan </button> <button class='btn btn-info'>Booking</button>");
             poli.bindPopup("<b>ID:</b> KG"+argeojson.features[i].properties.gid+"<br/>"+argeojson.features[i].properties.status);

         }
       }
     }
     else if (status=="Rumah Kosong") {
       poli=L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
       poli.setStyle({fillColor: '#FF0000'});
       poli.setStyle({fillOpacity: 0.5});
       poli.setStyle({color: 'none'});
       poli.bindPopup("<b>ID:</b> KG"+argeojson.features[i].properties.gid+"<br/>"+argeojson.features[i].properties.status);

     }
     else {

       poli=L.geoJSON(argeojson.features[i].geometry).addTo(mymap);
       poli.setStyle({fillColor: '#FFD700'});
       poli.setStyle({fillOpacity: 0.5});
       poli.setStyle({color: 'none'});
       poli.bindPopup("<b>ID:</b> KG"+argeojson.features[i].properties.gid+"<br/>"+argeojson.features[i].properties.status);

     }


   }








  </script>


  <script type="text/javascript">

  $.getJSON("jalan.json",function(data){
  // add GeoJSON layer to the map once the file is loaded
  var datalayer = L.geoJson(data ,{
  onEachFeature: function(feature, featureLayer) {

  featureLayer.bindPopup("Info Jalan");
  featureLayer.setStyle({color: '#000000'});


  }
}).addTo(mymap);

});

  </script>


</body>

</html>
