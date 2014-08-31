class Contents
  constructor: ->
    @form = $('#edit-content-form')
    @spinner = @form.find('.fa-spinner')
    @textarea = $('textarea[name=content]')
    @bindEvents()
    @attachRichTextEditor()

  bindEvents: ->
    @form.submit (e) => @submitForm(e)

  attachRichTextEditor: ->
    @textarea.summernote
      height: 300
      codemirror:
        theme: 'monokai'
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
      ]

  submitForm: (e) ->
    e.preventDefault()
    @spinner.show()
    @textarea.val( $('.note-editable').code() )
    formData = @form.serialize()
    $.ajax
      type: "put"
      url: @form.attr('action')
      data: formData
      success: =>
        @spinner.hide().closest('button').addClass('btn-success').disable()

