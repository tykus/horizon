class Settings
  constructor: ->
    @form = $("#edit-setting-form")
    @bindEvents()

  bindEvents: ->
    @form.submit (e) => @submitForm(e)
    @attachRichTextEditor()

  attachRichTextEditor: ->
    $('textarea[name=value]').summernote
      height: 300
      codemirror:
        theme: 'monokai'

  submitForm:(e) ->
    btn = @form.find('button[type=submit]')
    spinner = btn.find('i')
    spinner.show()
    $.ajax
      type: "put"
      url: @form.attr('action')
      data: @form.serialize()
      success: ->
        console.log spinner
        spinner.delay(300).hide ->
          btn.html("Updated!").addClass('btn-success disabled')
    e.preventDefault()
