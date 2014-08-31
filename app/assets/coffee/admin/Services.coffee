class Services
  constructor: ->
    @sortable = $("#sortable")
    @bindEvents()
    $('textarea').summernote
      height: 300
      codemirror:
        theme: 'monokai'

  bindEvents: ->
    @sortable.sortable
      helper: @fixHelperModified
      axis: "y"
    @sortable.on "sortupdate", (event, ui) =>
      @updateSortOrder()
    @sortable.disableSelection()

  updateSortOrder: ->
    sort_order = @sortable.sortable("serialize")
    @displayUpdateSuccess()
    $.ajax
      type: "put"
      url: "/admin/services/sort"
      data: sort_order
      success: =>
        @hideUpdateSuccess()

  displayUpdateSuccess: ->
    $('#success').html("Updating").show()

  hideUpdateSuccess: ->
    $('#success').text("Updated successfully").delay(2500).fadeOut(500)

  # This helper maintains <tr> widths when using the jQuery UI sortable method
  fixHelperModified: (e, tr) ->
    $originals = tr.children()
    $helper = tr.clone()
    $helper.children().each (index) ->
      $(this).width($originals.eq(index).width())
             .css("background-color", "#9cf")
             .css("border-bottom", "1px solid #dddddd")
    return $helper