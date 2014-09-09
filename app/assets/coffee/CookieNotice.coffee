class CookieNotice
  constructor: ->
    @notice = $("#cookies-notice")
    @button = @notice.find('.btn')
    # Get the cookie for cookies notice acknowledgement
    @acknowledged = Cookie.get('acknowledge')
    @showNotice()
    @bindEvents()

  bindEvents: ->
    @button.click (e) => @acknowledgeNotice()
    $(window).scroll (e) =>
      if $(e.target).scrollTop() > 200
        @hideNotice()
      else
        @showNotice()

  acknowledgeNotice: ->
    @hideNotice()
    Cookie.set('acknowledge', 'true', 60)

  showNotice: ->
    @notice.show() unless (@acknowledged? and @acknowledged is "true")

  hideNotice: ->
    @notice.fadeOut(500)
