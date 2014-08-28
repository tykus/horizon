class Services
	constructor: ->
		@introduction = $('input[name=introduction]')
		@description = $('input[name=description]')
		@sortable = $("#sortable")
		@bindEvents()

	bindEvents: ->
		@sortable.sortable
		  helper: @fixHelperModified
		  axis: "y"
		@sortable.on "sortupdate", (event, ui) =>
		  @updateSortOrder()
		@sortable.disableSelection()

		@introduction.summernote
      height: 300
      codemirror:
        theme: 'monokai'
    @description.summernote
      height: 300
      codemirror:
        theme: 'monokai'

   updateSortOrder: ->
   	# @displayUpdateSort( $('#success') )
   	sort_order = @sortable.sortable("serialize")
   	console.log sort_order
   	# $.ajax
   	#   type: "post"
   	#   url: "/admin/services/sort"
   	#   data: sort_order
   	#   success: =>
   	#     @displayUpdateSuccess( $('#success') )

  # This helper maintains <tr> widths when using the jQuery UI sortable method
  fixHelperModified: (e, tr) ->
    $originals = tr.children()
    $helper = tr.clone()
    $helper.children().each (index) ->
      $(this).width($originals.eq(index).width())
             .css("background-color", "#9cf")
             .css("border-bottom", "1px solid #dddddd")
    return $helper