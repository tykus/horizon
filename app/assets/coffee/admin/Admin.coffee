class Admin
  constructor: ->
    console.log "Admin javascripts loaded"
    new Enquiries if $("#enquiries").length

$ ->
  new Admin if $("#admin").length
