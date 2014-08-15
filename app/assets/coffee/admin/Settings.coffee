class Settings
	constructor: ->
		@form = $("#edit-setting-form")
		@bindEvents()

	bindEvents: ->
		@form.submit (e) => @submitForm(e)
			
	submitForm:(e) ->
		console.log @form.attr('action')
		btn = @form.find('button[type=submit]')
		btn.find('i').show()
		$.ajax
			type: "put"
			url: @form.attr('action')
			data: @form.serialize()
			success: ->
				btn.find('i').delay(300).hide ->
					btn.html("Updated!").addClass('btn-success disabled')
		e.preventDefault()
