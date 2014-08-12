class ContactForm
  constructor: () ->
    @contactForm = $("#contact-form")
    @formURL = @contactForm.attr("action")
    @submitButton = @contactForm.find("button[type=submit]")
    @spinner = @submitButton.find("#spinner")
    @bindEvents()
  
  bindEvents: ->
    @contactForm.submit (e) => @submitForm(e)

  submitForm: (e) ->
    e.preventDefault()
    formData = @contactForm.serialize()
    @showSpinner()
    $.ajax
      url: @formURL
      type: "POST"
      data : formData
      success: (data, textStatus, jqXHR) =>
         @hideSpinner()
         @markSubmitSuccess()
      error: (jqXHR, textStatus, errorThrown) =>
        @hideSpinner()
        @markSubmitError()

  showSpinner: ->
    @spinner.removeClass("hidden")
  
  hideSpinner: ->
    @spinner.addClass("hidden")

  markSubmitSuccess: ->
    @submitButton.removeClass("btn-default")
                .addClass("btn-success")
                .addClass("disabled")
                .html("Your enquiry has been sent")

  markSubmitError: ->
    @submitButton.removeClass("btn-default")
                .addClass("btn-danger")
                .html("Your enquiry has not been sent")



