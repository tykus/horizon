class Admin
  constructor: ->
    console.log "Admin javascripts loaded"
    new Enquiries if $("#enquiries").length
    new Settings if $("#settings").length

$ ->
  new Admin if $("#admin").length
