class Admin
  constructor: ->
    console.log "Admin javascripts loaded"
    new Enquiries if $("#enquiries").length
    new Articles if $("#articles").length
    new Settings if $("#settings").length
    new Users if $("#users").length

$ ->
  new Admin if $("#admin").length
