class Faqs
  constructor: ->
    @form = $('#faq-form')
    @spinner = $('.fa-spinner')
    @bindEvents()

  bindEvents: ->
    $("#sortable").sortable
      helper: @fixHelperModified
      axis: "y"
    $("#sortable").on "sortupdate", (event, ui) =>
      @updateSortOrder()
    $("#sortable").disableSelection()

  updateSortOrder: ($elem) ->
    @displayUpdateSort( $('#success') )
    sort_order = $('#sortable').sortable("serialize")
    $.ajax
      type: "post"
      url: "/admin/faqs/sort"
      data: sort_order
      success: =>
        @displayUpdateSuccess( $('#success') )

  displayUpdateSort: ($placeholderDiv) ->
    $placeholderDiv.fadeIn(500).html("<i class=\"fa fa-cog fa-spin\"></i> Updating the order")

  displayUpdateSuccess: ($placeholderDiv) ->
    $placeholderDiv.delay(2000).html("<strong>Success:</strong> New order of sectors saved successfully!").delay(1000).fadeOut(500)


  # This helper maintains <tr> widths when using the jQuery UI sortable method
  fixHelperModified: (e, tr) ->
    $originals = tr.children()
    $helper = tr.clone()
    $helper.children().each (index) ->
      $(this).width($originals.eq(index).width())
             .css("background-color", "#9cf")
             .css("border-bottom", "1px solid #dddddd")
    return $helper
