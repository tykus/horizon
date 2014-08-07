class Admin
  constructor: ->
    console.log "Admin javascripts loaded"

$ ->
  new Admin if $("#admin").length
