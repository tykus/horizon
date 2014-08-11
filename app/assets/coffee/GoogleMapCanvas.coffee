class GoogleMapCanvas
	constructor: () ->
    @business_info = window.map_info
    @buildMap()
    @bindEvents()

  bindEvents: ->
    google.maps.event.addListener @marker, 'click', =>
      @infoWindow.open(@map,@marker)

  buildMap: ->
    @googleLatLng = new google.maps.LatLng( @business_info.latitude, @business_info.longitude ); 
    mapOptions =
      zoom: 16,
      center: @googleLatLng
    @map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions)
    @placeMarker()

  placeMarker: -> 
    content = """
      <img src="/img/logo_small.png"><br>
      #{@business_info.address}<br>
      #{@business_info.phone}<br>
      <a href="mailto:#{@business_info.email}">#{@business_info.email}</a>
    """
    @infoWindow = new google.maps.InfoWindow
      content: content

    @marker = new google.maps.Marker
      position: @googleLatLng,
      map: @map,
      title: @business_info.name # TODO: get this from the server side Site config