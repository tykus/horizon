class GoogleMapCanvas
	constructor: () ->
    @business = window.map_info
    if google? 
      @buildMap()
      @bindEvents()
    else 
      console.log "No Google, are you in China?"

  bindEvents: ->
    google.maps.event.addListener @marker, 'click', =>
      @infoWindow.open(@map,@marker)

  buildMap: ->
    [longitude,latitude] = @business.location.split(",")
    @horizon = new google.maps.LatLng( longitude, latitude );
    mapOptions =
      zoom: 16,
      scrollwheel: false,
      streetViewControl: false,
      center: @horizon,
      panControl: false,
      zoomControl: true,
      scaleControl: true
    @map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions)
    @placeMarker()

  placeMarker: ->
    # TODO: can this be done with Handlebars????
    content = """
      <img src="/img/logo_small.png"><br>
      #{@business.address}<br>
      #{@business.phone}<br>
      <a href="mailto:#{@business.email}">#{@business.email}</a>
    """
    @infoWindow = new google.maps.InfoWindow
      content: content

    @marker = new google.maps.Marker
      position: @horizon,
      map: @map,
      title: @business.name
