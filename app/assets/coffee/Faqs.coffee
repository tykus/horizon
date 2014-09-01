class Faqs
  constructor: ->
    @bindEvents()

  bindEvents: ->
    $('.list-group-item').on 'click', (e) => @highlightSelected(e)
    $(window).scroll => @resetColors() if $(window).scrollTop() == 0

  highlightSelected: (e) ->
    anchor = $(e.target).attr('href')
    @changeColors(anchor, '#0bd7ff')

  changeColors: (elem, hex) ->
    $(elem).find('.panel')
           .css('border-color', hex)
           .find('.panel-heading')
           .css('background-color', hex)
           .css('border-color', hex)

  resetColors: ->
    $('.panel-wrapper').each (index, item) => @changeColors(item, "#1866ff")
