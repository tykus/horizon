class Users
  constructor: ->
    @form = $('#user-form')

    @name = $('input[name="name"]')
    @email = $('input[name="email"]')
    @password = $('input[name="password"]')
    @passwordConfirmation = $('input[name="password-confirmation"]')

    @updatingProfile = true if @form.find('input[name=_method]').length
    @getOldValues() if @updatingProfile

    @passwordRegex = new RegExp /^[a-zA-Z0-9]{6,10}$/
    @nameRegex = @lastNameRegex = new RegExp /^.{1,30}$/
    @emailRegex = new RegExp /^([a-zA-Z0-9_\-])([a-zA-Z0-9_\-\.]*)@(\[((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}|((([a-zA-Z0-9\-\_]+)\.)+))([a-zA-Z]{2,}|(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\])$/

    @bindEvents()

  getOldValues: ->
    @oldEmail = @email.val()

  bindEvents: ->
    @name.blur (e) => @checkName()
    @email.blur (e) => @checkEmail()
    @password.blur (e) => @checkPassword()
    @passwordConfirmation.blur (e) => @checkPasswordsAgree()
    @form.submit (e) => @validateForm()

  validateForm: ->
    ok = true
    ok = @checkName() and ok
    ok = @checkEmail() and ok
    unless (@updatingProfile? and @updatingProfile and @password.val().length == 0)
      ok = @checkPassword() and ok
      ok = @checkPasswordsAgree() and ok

    return ok

  checkName: ->
    val = $.trim @name.val()
    if @nameRegex.test(val)
      @markConfirm @name
      return true
    else
      @markError @name
      return false

  checkEmail: ->
    val = $.trim @email.val()
    if (@updatingProfile? and val == @oldEmail)
      @markConfirm @email
      return true
    else
      if @emailRegex.test(val)
        $.ajax
          type: "post"
          url: "/admin/users/checkEmailExists"
          data: {email: val}
          success: (data) =>
            if data.match_found
              @markError @email
              return false
            else
              @markConfirm @email
              return true
      else
        @markError @email
        return false

  checkPassword: ->
    val = $.trim @password.val()
    if (@updatingProfile? and val.length == 0) or @passwordRegex.test(val)
      @markConfirm @password
      return true
    else
      @markError @password
      return false

  checkPasswordsAgree: (e) ->
    pwd = $.trim @password.val()
    pwdConfirm = $.trim @passwordConfirmation.val()
    if pwd == pwdConfirm && @checkPassword()
      @markConfirm @passwordConfirmation
      return true
    else
      @markError @passwordConfirmation
      return false

  markConfirm: (elem) ->
    elem.closest('.form-group').find('.text-success').show()
    elem.closest('.form-group').find('.text-danger').hide()

  markError: (elem) ->
    elem.closest('.form-group').find('.text-success').hide()
    elem.closest('.form-group').find('.text-danger').show()

