class Faqs
  constructor: ->
    @bindEvents()

  bindEvents: ->
    $('.list-group-item').click (e) => @highlightSelected

  highlightSelected: (e) ->
    console.log e.target
