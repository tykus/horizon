class CookieNotice
  constructor: ->
    @notice = $("#cookies-notice")
    @button = @notice.find('.btn')
    @setupNotice()
    @bindEvents()

  setupNotice: ->
    acknowledged = Cookie.get('acknowledge')
    console.log acknowledged?
    console.log acknowledged == "true"
    unless (acknowledged? and acknowledged is "true")
      @showNotice()

  bindEvents: ->
    @button.click (e) => @acknowledgeNotice()

  acknowledgeNotice: ->
    @hideNotice()
    Cookie.set('acknowledge', 'true', 60)

  showNotice: ->
    @notice.show()

  hideNotice: ->
    @notice.fadeOut(500)
