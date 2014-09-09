class App
  constructor: ->
    new GoogleMapCanvas() if $('#map-canvas').length
    new ContactForm($('#contact-form')) if $('#contact-form').length
    new Faqs if $('#faqs').length
    new CookieNotice if $('#cookies-notice').length
    @bindEvents()

  bindEvents: ->
    $('a[href*=#]:not([href=#])').click (e) => @smoothScroll(e)
    $(window).scroll (e) => @displayBackToTop(e)
    $('.navbar-brand').click (e) => @backToTop(e)
    $('.back-to-top').click (e) => @backToTop(e)

  backToTop: (e) ->
    e.preventDefault()
    $('html, body').animate(
      scrollTop: 0
    , 1000)
    return false

  displayBackToTop: (e) ->
    if $(e.target).scrollTop() > 300
      $('.back-to-top').fadeIn(500)
    else
      $('.back-to-top').fadeOut(500)

  smoothScroll: (e) ->
    elem = e.target
    if (location.pathname.replace(/^\//,'') == elem.pathname.replace(/^\//,'') && location.hostname == elem.hostname)
      target = $(elem.hash)
      target = $("[name=#{this.hash.slice(1)}]") unless target.length
      $('html,body').animate({
        scrollTop: target.offset().top - 80
      }, 1000)
      return false

$ ->
  new App if $("#horizon").length
