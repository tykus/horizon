class ContactForm
  constructor: ->
    @getJQueryObjects()
    @bindEvents()

  getJQueryObjects: ->
    @contactForm = $("#contact-form")
    @formURL = @contactForm.attr("action")
    @submitButton = @contactForm.find("button[type=submit]")
    @name = $('input[name=name]')
    @email = $('input[name=email]')
    @telephone = $('input[name=telephone]')
    @message = $('textarea[name=message]')
    @alert = $('.alert')
    @alert_message = $('span#message')
    @spinner = $("#spinner")

  bindEvents: ->
    @contactForm.submit (e) => @submitForm(e)
    @name.blur => @checkName()
    @email.blur => @checkEmail()
    @telephone.blur => @checkTelephone()
    @name.focus => @removeFieldError(@name)
    @email.focus => @removeFieldError(@email)
    @telephone.focus => @removeFieldError(@telephone)

  submitForm: (e) ->
    e.preventDefault()
    failure_message = "Your enquiry was not sent"
    @alert.addClass('alert-info').show()
    if @validate()
      formData = @contactForm.serialize()
      @showSpinner()
      $.ajax
        url: @formURL
        type: "POST"
        data : formData
        success: (data, textStatus, jqXHR) =>
          @hideSpinner()
          @markSubmitSuccess(data.message)
        error: (jqXHR, textStatus, errorThrown) =>
          @hideSpinner()
          @markSubmitError(failure_message)
    else
      @alert_message.text(failure_message)
      @alert.addClass('alert-warning').fadeIn(500)

  validate: ->
    ok = true
    ok = @checkName() and ok
    ok = @checkEmail() and ok
    ok = @checkTelephone() and ok
    return ok

  checkName: ->
    nameRegex = new RegExp /^.{1,30}$/
    @validateField @name, nameRegex    

  checkEmail: ->
    emailRegex = new RegExp /^([a-zA-Z0-9_\-])([a-zA-Z0-9_\-\.]*)@(\[((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}|((([a-zA-Z0-9\-\_]+)\.)+))([a-zA-Z]{2,}|(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\])$/
    @validateField @email, emailRegex

  checkTelephone: ->
    phoneRegex = new RegExp /^\({0,1}\d{2,4}\){0,1}[-]{0,1}\s{0,1}\d{5,7}$/
    @validateField @telephone, phoneRegex

  validateField: (field, regexp) ->
    val = field.val()
    ok = regexp.test(val)
    if ok 
      @removeFieldError(field) 
    else
      @markFieldError(field) 
    ok

  showSpinner: ->
    @spinner.removeClass("hidden")

  hideSpinner: ->
    @spinner.addClass("hidden")

  markSubmitSuccess: (message) ->
    @resetAlert()
    @alert_message.text(message)
    @alert.addClass('alert-success').fadeIn(500)
    @contactForm[0].reset()
    @hideAlert()

  markSubmitError: (message) ->
    @resetAlert()
    @alert_message.text(message)
    @alert.addClass('alert-warning').fadeIn(500)

  resetAlert: ->
    @alert.removeClass('alert-success')
          .removeClass('alert-info')
          .removeClass('alert-warning')
    @alert_message.text('')

  markFieldError: (elem) ->
    elem.addClass('form-error')

  removeFieldError: (elem) ->
    elem.removeClass('form-error')

  hideAlert: ->
    @alert.delay(2000).fadeOut(1000, => @resetAlert())
