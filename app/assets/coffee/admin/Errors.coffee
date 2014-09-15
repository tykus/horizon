class Errors
  constructor: ->
    $('#errors input[type=checkbox]').click (e) => @deleteError(e)

  deleteError: (e) ->
    checkbox = $(e.target)
    if checkbox.prop('checked')
      id = $(e.target).data('id')
      $.ajax
        type: "DELETE"
        url: "/admin/errors/#{id}"
        success: =>
          @removeError(checkbox)

  removeError: (elem) ->
    elem.closest('tr').fadeOut(500)
