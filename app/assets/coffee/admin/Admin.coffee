class Admin
  constructor: ->
    console.log "Admin javascripts loaded"
    new Enquiries if $("#enquiries").length
    new Articles if $("#articles").length

$ ->
  new Admin if $("#admin").length
