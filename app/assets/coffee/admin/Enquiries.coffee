class Enquiries
  constructor: ->
    @allCheckboxes = $("#enquiries input:checkbox")
    @checkboxSelectAll = $("#select-all")
    @buttonDelete = $("#delete-button")
    @buttonMarkAsRead = $("#mark-read-button")
    @buttonMarkAsUnread = $("#mark-unread-button")
    @enquiryReplyForm = $("#enquiry-reply-form")
    @bindEvents()

  # Events
  bindEvents: ->
    @checkboxSelectAll.click => @selectAllClicked()
    @buttonDelete.click => @deleteSelected()
    @buttonMarkAsRead.click => @markSelected(true)
    @buttonMarkAsUnread.click => @markSelected(false)
    @allCheckboxes.click => @checkboxClicked()
    @enquiryReplyForm.submit (e) => @sendReply(e)

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
    @allCheckboxes.prop('checked', true)

  unselectAllCheckboxes: ->
    @allCheckboxes.prop('checked', false)

  deleteSelected: ->
    @checkedCheckboxes().each (idx, checkbox) =>
      id = $(checkbox).data('id')
      $(checkbox).closest('tr').fadeOut 500
      $.ajax
        type: "delete"
        url: "/admin/enquiries/#{id}"
        success: ->
          console.log "Deleted!"
        error: ->
          console.log "Problem :("

  markSelected: (viewed) ->
    # Grab all of the checked checkboxes
    @checkedCheckboxes().each (idx, checkbox) =>
      id = $(checkbox).data('id')
      if viewed
        $(checkbox).closest('tr').removeClass('info')
      else
        $(checkbox).closest('tr').addClass('info')

      @unselectAllCheckboxes()
      @checkboxSelectAll.prop('checked', false)

      $.ajax
        type: "put"
        url: "/admin/enquiries/#{id}"
        data: {viewed: viewed}
        success: (data) ->
          console.log "Success!"
        error: ->
          console.log "There was a problem updating the record(s)"

  checkedCheckboxes: ->
    $("input[name='enquiry[]']:checked")

  sendReply: (e) ->
    @showSending()
    data = @enquiryReplyForm.serialize()
    $.ajax
      type: "POST"
      url: "/admin/enquiries/reply"
      data: data
      success: (data) =>
        @showSendSuccess()
    e.preventDefault()

  showSending: ->
    btn = @enquiryReplyForm.find('input:submit')
    btn.attr('disabled','disabled').val("Sending");

  showSendSuccess: ->
    btn = @enquiryReplyForm.find('input:submit')
    btn.addClass('btn-success').val("Sent!")
