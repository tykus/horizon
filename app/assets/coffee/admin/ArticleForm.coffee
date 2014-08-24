class ArticleForm
  constructor: ->
    @inputTitle = $('input[name=title]')
    @inputDisabledSlug = $('input[name=slug_disabled]')
    @inputHiddenSlug = $('input[name=slug]')
    @articleForm = $('#article-form')
    @bindEvents()
    @attachRichTextEditor()

  attachRichTextEditor: ->
    $('textarea[name=content]').summernote
      height: 300
      codemirror:
        theme: 'monokai'

  bindEvents: ->
    @inputTitle.keyup => @updateSlug( @inputTitle.val() )
    @inputTitle.change => @updateSlug( @inputTitle.val() )

  updateSlug: (str) ->
    @inputDisabledSlug.val( @toSlug(str) )
    @inputHiddenSlug.val( @toSlug(str) )

  toSlug: (str) ->
    str = str.replace(/^\s+|\s+$/g, "").toLowerCase()
    from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;"
    to   = "aaaaeeeeiiiioooouuuunc------"
    for i in [i..from.length]
      str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i))
    str.replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-")
