class Articles
  constructor: ->
    @allCheckboxes = $("#articles input:checkbox")
    @checkboxSelectAll = $("#select-all")
    @buttonDelete = $("#delete-button")
    @buttonPublish = $("#publish-selected-button")
    @buttonUnpublish = $("#unpublish-selected-button")
    new ArticleForm if $("#article-form").length
    @bindEvents()

  # Events
  bindEvents: ->
    @checkboxSelectAll.click => @allCheckboxes.prop('checked', @checkboxSelectAll.prop('checked'))
    @buttonDelete.click => @deleteSelected()
    @buttonPublish.click => @publishSelected(true)
    @buttonUnpublish.click => @publishSelected(false)
    @allCheckboxes.on 'click', => @checkboxClicked()

  deleteSelected: ->
    @checkedCheckboxes().each (idx, checkbox) =>
      id = $(checkbox).data('id')
      $(checkbox).closest('tr').fadeOut 500
      $.ajax
        type: "delete"
        url: "/admin/articles/#{id}"
        success: ->
          console.log "Deleted!"
        error: ->
          console.log "Problem :("

  publishSelected: (publish) ->
    @checkedCheckboxes().each (idx, checkbox) =>
      id = $(checkbox).data('id')
      $.ajax
        type: "put"
        url: "/admin/articles/publish/#{id}"
        data:
          publish: publish
        success: (data) =>
          chkbox = $(checkbox)
          chkbox.prop('checked', false)
          row = chkbox.closest('tr')
          row.find('.published_date')
                .html data.published_date
          if publish
            row.removeClass('info')
          else
            row.addClass('info')
        error: (data) ->
          console.log "An error occurred in the AJAX call"
      @checkboxSelectAll.prop('checked', false)

  checkboxClicked: ->
    if @allCheckboxes.not(':checked').length
      @checkboxSelectAll.prop("checked", false)
    else
      @checkboxSelectAll.prop("checked", true)

  checkedCheckboxes: ->
    $("input[name='article[]']:checked")

  formatDate: (date) ->
    date.toISOString().replace /\..+$|[^\d]/g, ''
