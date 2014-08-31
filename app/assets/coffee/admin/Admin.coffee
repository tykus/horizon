class Admin
  constructor: ->
    console.log "Admin javascripts loaded"
    new Restfulizer if $('[data-method=delete]').length
    new Enquiries if $("#enquiries").length
    new Articles if $("#articles").length
    new Settings if $("#settings").length
    new Users if $("#users").length
    new Faqs if $("#faqs").length
    new Contents if $("#contents").length

$ ->
  new Admin if $("#admin").length
