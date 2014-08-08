class GoogleMapCanvas
	constructor: (location) ->
    console.log(location);
    myLatLng = new google.maps.LatLng( location.latitude, location.longitude ); 
    mapOptions =
      zoom: 16,
      center: myLatLng
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions)

    marker = new google.maps.Marker(
      position: myLatLng,
      map: map,
      title: 'Horizon Centre'
    )
