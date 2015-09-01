// This example creates a simple polygon representing the Bermuda Triangle.
// When the user clicks on the polygon an info window opens, showing
// information about the polygon's coordinates.

var map;
var infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 8,
    center: {lat: -27.56300, lng: -53.18200},
    //mapTypeId: google.maps.MapTypeId.TERRAIN
    mapTypeId: 'roadmap'
  });

  // Define the LatLng coordinates for the polygon.
  var triangleCoords = [
      {lat: -28.26300, lng: -52.40700},
      {lat: -28.39600, lng: -52.69100},
      {lat: -28.28400, lng: -52.78600},
      {lat: -28.11300, lng: -52.90900},
      {lat: -28.05500, lng: -53.06800},
      {lat: -27.89900, lng: -53.31400},
      {lat: -27.71600, lng: -53.70100},
      {lat: -27.66400, lng: -53.63800},
      {lat: -27.49400, lng: -53.68600},
      {lat: -27.37100, lng: -53.75800},
      {lat: -27.26500, lng: -53.86100},
      {lat: -27.19200, lng: -53.71000},
      {lat: -27.21000, lng: -53.61200},
      {lat: -27.16200, lng: -53.40500},
      {lat: -27.19400, lng: -53.25100},
      {lat: -27.24900, lng: -53.03500},
      {lat: -27.30000, lng: -52.84100},
      {lat: -27.36200, lng: -52.77100},
      {lat: -27.44400, lng: -52.91800},
      {lat: -27.52200, lng: -52.89400},
      {lat: -27.61500, lng: -52.84100},
      {lat: -27.76700, lng: -52.80200},
      {lat: -27.99400, lng: -52.77100},
      {lat: -28.05900, lng: -52.67700}
  ];

  // Construct the polygon.
  var bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });
  bermudaTriangle.setMap(map);

  // Add a listener for the click event.
  bermudaTriangle.addListener('click', showArrays);

  infoWindow = new google.maps.InfoWindow;
}

/** @this {google.maps.Polygon} */
function showArrays(event) {
  // Since this polygon has only one path, we can call getPath() to return the
  // MVCArray of LatLngs.
  var vertices = this.getPath();

  var contentString = '<b>Bermuda Triangle polygon</b><br>' +
      'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
      '<br>';

  // Iterate over the vertices.
  for (var i =0; i < vertices.getLength(); i++) {
    var xy = vertices.getAt(i);
    contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
        xy.lng();
  }

  // Replace the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(event.latLng);

  infoWindow.open(map);
}