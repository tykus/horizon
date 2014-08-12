class Enquiries
  constructor: ->
    @allCheckboxes = $("#enquiries input:checkbox")
    @checkboxSelectAll = $("#select-all")
    @buttonDelete = $("#delete-button")
    @buttonMarkAsRead = $("#mark-read-button")
    @buttonMarkAsUnread = $("#mark-unread-button")
    @bindEvents()

  # Events
  bindEvents: ->
    @checkboxSelectAll.click => @selectAllClicked()
    @buttonDelete.click => @deleteSelected()
    @buttonMarkAsRead.click => @markSelected(true)
    @buttonMarkAsUnread.click => @markSelected(false)
    @allCheckboxes.click => @checkboxClicked()

  selectAllClicked: ->
    if @checkboxSelectAll.prop('checked')
      @selectAllCheckboxes()
    else
      @unselectAllCheckboxes()

  checkboxClicked: () ->
    if @allCheckboxes.not(':checked').length
      @checkboxSelectAll.prop("checked", false)
    else
      @checkboxSelectAll.prop("checked", true)

  # Actions
  selectAllCheckboxes: ->
    @allCheckboxes.each -> $(@).prop('checked', true)

  unselectAllCheckboxes: ->
    @allCheckboxes.each -> $(@).prop('checked', false)

  deleteSelected: ->
    @checkedCheckboxes().each ->
      $(@).closest('tr').remove()

  markSelected: (enquiryIsRead) ->
    @checkedCheckboxes().each (idx, chk) =>
      if (enquiryIsRead)
        $(chk).closest('tr').removeClass('info')
        viewed = enquiryIsRead
      else
        $(chk).closest('tr').addClass('info')
        viewed = !enquiryIsRead
      $(chk).prop('checked', false)
      @checkboxSelectAll.prop('checked', false)
      @makeRequest 'PUT', {
        id: $(chk).val()
        viewed: viewed
      }

  checkedCheckboxes: ->
    $("input[name='enquiry[]']:checked")

  makeRequest: (method, data) ->
    $.ajax
      url: "/admin/enquiries/#{data.id}"
      type: method
      data: data
      success: ->
        console.log "Success"
      error: ->
        console.log "Problem"

  serialize: ->
    # need to write a function to serialize a collection of jQuery objects based on their data-id properties

