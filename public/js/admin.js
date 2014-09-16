// Generated by CoffeeScript 1.6.3
(function() {
  var Admin, ArticleForm, Articles, Contents, Enquiries, Errors, Faqs, Restfulizer, Services, Settings, Users;

  Admin = (function() {
    function Admin() {
      console.log("Admin javascripts loaded");
      if ($('[data-method=delete]').length) {
        new Restfulizer;
      }
      if ($("#enquiries").length) {
        new Enquiries;
      }
      if ($("#articles").length) {
        new Articles;
      }
      if ($("#settings").length) {
        new Settings;
      }
      if ($("#services").length) {
        new Services;
      }
      if ($("#users").length) {
        new Users;
      }
      if ($("#faqs").length) {
        new Faqs;
      }
      if ($("#contents").length) {
        new Contents;
      }
      if ($("#errors").length) {
        new Errors;
      }
    }

    return Admin;

  })();

  $(function() {
    if ($("#admin").length) {
      return new Admin;
    }
  });

  ArticleForm = (function() {
    function ArticleForm() {
      this.inputTitle = $('input[name=title]');
      this.inputDisabledSlug = $('input[name=slug_disabled]');
      this.inputHiddenSlug = $('input[name=slug]');
      this.articleForm = $('#article-form');
      this.bindEvents();
      this.attachRichTextEditor();
    }

    ArticleForm.prototype.attachRichTextEditor = function() {
      return $('textarea[name=content]').summernote({
        height: 300,
        codemirror: {
          theme: 'monokai'
        }
      });
    };

    ArticleForm.prototype.bindEvents = function() {
      var _this = this;
      this.inputTitle.keyup(function() {
        return _this.updateSlug(_this.inputTitle.val());
      });
      return this.inputTitle.change(function() {
        return _this.updateSlug(_this.inputTitle.val());
      });
    };

    ArticleForm.prototype.updateSlug = function(str) {
      this.inputDisabledSlug.val(this.toSlug(str));
      return this.inputHiddenSlug.val(this.toSlug(str));
    };

    ArticleForm.prototype.toSlug = function(str) {
      var from, i, to, _i, _ref;
      str = str.replace(/^\s+|\s+$/g, "").toLowerCase();
      from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
      to = "aaaaeeeeiiiioooouuuunc------";
      for (i = _i = i, _ref = from.length; i <= _ref ? _i <= _ref : _i >= _ref; i = i <= _ref ? ++_i : --_i) {
        str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
      }
      return str.replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-");
    };

    return ArticleForm;

  })();

  Articles = (function() {
    function Articles() {
      this.allCheckboxes = $("#articles input:checkbox");
      this.checkboxSelectAll = $("#select-all");
      this.buttonDelete = $("#delete-button");
      this.buttonPublish = $("#publish-selected-button");
      this.buttonUnpublish = $("#unpublish-selected-button");
      if ($("#article-form").length) {
        new ArticleForm;
      }
      this.bindEvents();
    }

    Articles.prototype.bindEvents = function() {
      var _this = this;
      this.checkboxSelectAll.click(function() {
        return _this.allCheckboxes.prop('checked', _this.checkboxSelectAll.prop('checked'));
      });
      this.buttonDelete.click(function() {
        return _this.deleteSelected();
      });
      this.buttonPublish.click(function() {
        return _this.publishSelected(true);
      });
      this.buttonUnpublish.click(function() {
        return _this.publishSelected(false);
      });
      return this.allCheckboxes.on('click', function() {
        return _this.checkboxClicked();
      });
    };

    Articles.prototype.deleteSelected = function() {
      var _this = this;
      return this.checkedCheckboxes().each(function(idx, checkbox) {
        var id;
        id = $(checkbox).data('id');
        $(checkbox).closest('tr').fadeOut(500);
        return $.ajax({
          type: "delete",
          url: "/admin/articles/" + id,
          success: function() {
            return console.log("Deleted!");
          },
          error: function() {
            return console.log("Problem :(");
          }
        });
      });
    };

    Articles.prototype.publishSelected = function(publish) {
      var _this = this;
      return this.checkedCheckboxes().each(function(idx, checkbox) {
        var id;
        id = $(checkbox).data('id');
        $.ajax({
          type: "put",
          url: "/admin/articles/publish/" + id,
          data: {
            publish: publish
          },
          success: function(data) {
            var chkbox, row;
            chkbox = $(checkbox);
            chkbox.prop('checked', false);
            row = chkbox.closest('tr');
            row.find('.published_date').html(data.published_date);
            if (publish) {
              return row.removeClass('info');
            } else {
              return row.addClass('info');
            }
          },
          error: function(data) {
            return console.log("An error occurred in the AJAX call");
          }
        });
        return _this.checkboxSelectAll.prop('checked', false);
      });
    };

    Articles.prototype.checkboxClicked = function() {
      if (this.allCheckboxes.not(':checked').length) {
        return this.checkboxSelectAll.prop("checked", false);
      } else {
        return this.checkboxSelectAll.prop("checked", true);
      }
    };

    Articles.prototype.checkedCheckboxes = function() {
      return $("input[name='article[]']:checked");
    };

    Articles.prototype.formatDate = function(date) {
      return date.toISOString().replace(/\..+$|[^\d]/g, '');
    };

    return Articles;

  })();

  Contents = (function() {
    function Contents() {
      this.form = $('#edit-content-form');
      this.spinner = this.form.find('.fa-spinner');
      this.textarea = $('textarea[name=content]');
      this.bindEvents();
      this.attachRichTextEditor();
    }

    Contents.prototype.bindEvents = function() {
      var _this = this;
      return this.form.submit(function(e) {
        return _this.submitForm(e);
      });
    };

    Contents.prototype.attachRichTextEditor = function() {
      return this.textarea.summernote({
        height: 300,
        codemirror: {
          theme: 'monokai'
        },
        toolbar: [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']]]
      });
    };

    Contents.prototype.submitForm = function(e) {
      var formData,
        _this = this;
      e.preventDefault();
      this.spinner.show();
      this.textarea.val($('.note-editable').code());
      formData = this.form.serialize();
      return $.ajax({
        type: "put",
        url: this.form.attr('action'),
        data: formData,
        success: function() {
          return _this.spinner.hide().closest('button').addClass('btn-success').disable();
        }
      });
    };

    return Contents;

  })();

  Enquiries = (function() {
    function Enquiries() {
      this.allCheckboxes = $("#enquiries input:checkbox");
      this.checkboxSelectAll = $("#select-all");
      this.buttonDelete = $("#delete-button");
      this.buttonMarkAsRead = $("#mark-read-button");
      this.buttonMarkAsUnread = $("#mark-unread-button");
      this.enquiryReplyForm = $("#enquiry-reply-form");
      this.bindEvents();
    }

    Enquiries.prototype.bindEvents = function() {
      var _this = this;
      this.checkboxSelectAll.click(function() {
        return _this.selectAllClicked();
      });
      this.buttonDelete.click(function() {
        return _this.deleteSelected();
      });
      this.buttonMarkAsRead.click(function() {
        return _this.markSelected(true);
      });
      this.buttonMarkAsUnread.click(function() {
        return _this.markSelected(false);
      });
      this.allCheckboxes.click(function() {
        return _this.checkboxClicked();
      });
      return this.enquiryReplyForm.submit(function(e) {
        return _this.sendReply(e);
      });
    };

    Enquiries.prototype.selectAllClicked = function() {
      return this.allCheckboxes.prop('checked', this.checkboxSelectAll.prop('checked'));
    };

    Enquiries.prototype.checkboxClicked = function() {
      if (this.allCheckboxes.not(':checked').length) {
        return this.checkboxSelectAll.prop("checked", false);
      } else {
        return this.checkboxSelectAll.prop("checked", true);
      }
    };

    Enquiries.prototype.selectAllCheckboxes = function() {
      return this.allCheckboxes.prop('checked', true);
    };

    Enquiries.prototype.unselectAllCheckboxes = function() {
      return this.allCheckboxes.prop('checked', false);
    };

    Enquiries.prototype.deleteSelected = function() {
      var _this = this;
      return this.checkedCheckboxes().each(function(idx, checkbox) {
        var id;
        id = $(checkbox).data('id');
        $(checkbox).closest('tr').fadeOut(500);
        return $.ajax({
          type: "delete",
          url: "/admin/enquiries/" + id,
          success: function() {
            return console.log("Deleted!");
          },
          error: function() {
            return console.log("Problem :(");
          }
        });
      });
    };

    Enquiries.prototype.markSelected = function(viewed) {
      var _this = this;
      return this.checkedCheckboxes().each(function(idx, checkbox) {
        var id;
        id = $(checkbox).data('id');
        if (viewed) {
          $(checkbox).closest('tr').removeClass('info');
        } else {
          $(checkbox).closest('tr').addClass('info');
        }
        _this.unselectAllCheckboxes();
        _this.checkboxSelectAll.prop('checked', false);
        return $.ajax({
          type: "put",
          url: "/admin/enquiries/" + id,
          data: {
            viewed: viewed
          },
          success: function(data) {
            return console.log("Success!");
          },
          error: function() {
            return console.log("There was a problem updating the record(s)");
          }
        });
      });
    };

    Enquiries.prototype.checkedCheckboxes = function() {
      return $("input[name='enquiry[]']:checked");
    };

    Enquiries.prototype.sendReply = function(e) {
      var data,
        _this = this;
      this.showSending();
      data = this.enquiryReplyForm.serialize();
      $.ajax({
        type: "POST",
        url: "/admin/enquiries/reply",
        data: data,
        success: function(data) {
          return _this.showSendSuccess();
        }
      });
      return e.preventDefault();
    };

    Enquiries.prototype.showSending = function() {
      var btn;
      btn = this.enquiryReplyForm.find('input:submit');
      return btn.attr('disabled', 'disabled').val("Sending");
    };

    Enquiries.prototype.showSendSuccess = function() {
      var btn;
      btn = this.enquiryReplyForm.find('input:submit');
      return btn.addClass('btn-success').val("Sent!");
    };

    return Enquiries;

  })();

  Errors = (function() {
    function Errors() {
      var _this = this;
      $('#errors input[type=checkbox]').click(function(e) {
        return _this.deleteError(e);
      });
    }

    Errors.prototype.deleteError = function(e) {
      var checkbox, id,
        _this = this;
      checkbox = $(e.target);
      if (checkbox.prop('checked')) {
        id = $(e.target).data('id');
        return $.ajax({
          type: "DELETE",
          url: "/admin/errors/" + id,
          success: function() {
            return _this.removeError(checkbox);
          }
        });
      }
    };

    Errors.prototype.removeError = function(elem) {
      return elem.closest('tr').fadeOut(500);
    };

    return Errors;

  })();

  Faqs = (function() {
    function Faqs() {
      this.form = $('#faq-form');
      this.spinner = $('.fa-spinner');
      this.bindEvents();
    }

    Faqs.prototype.bindEvents = function() {
      var _this = this;
      $("#sortable").sortable({
        helper: this.fixHelperModified,
        axis: "y"
      });
      $("#sortable").on("sortupdate", function(event, ui) {
        return _this.updateSortOrder();
      });
      $("#sortable").disableSelection();
      return $('.delete-resource').submit(function(e) {
        var form;
        form = $(e.target);
        e.preventDefault();
        return $.ajax({
          type: 'delete',
          url: form.attr('action'),
          success: function(data) {
            return form.closest('tr').fadeOut(500);
          }
        });
      });
    };

    Faqs.prototype.updateSortOrder = function($elem) {
      var sort_order,
        _this = this;
      this.displayUpdateSort($('#success'));
      sort_order = $('#sortable').sortable("serialize");
      return $.ajax({
        type: "post",
        url: "/admin/faqs/sort",
        data: sort_order,
        success: function() {
          return _this.displayUpdateSuccess($('#success'));
        }
      });
    };

    Faqs.prototype.displayUpdateSort = function($placeholderDiv) {
      return $placeholderDiv.fadeIn(500).html("<i class=\"fa fa-cog fa-spin\"></i> Updating the order");
    };

    Faqs.prototype.displayUpdateSuccess = function($placeholderDiv) {
      return $placeholderDiv.delay(2000).html("<strong>Success:</strong> New order of sectors saved successfully!").delay(1000).fadeOut(500);
    };

    Faqs.prototype.fixHelperModified = function(e, tr) {
      var $helper, $originals;
      $originals = tr.children();
      $helper = tr.clone();
      $helper.children().each(function(index) {
        return $(this).width($originals.eq(index).width()).css("background-color", "#9cf").css("border-bottom", "1px solid #dddddd");
      });
      return $helper;
    };

    return Faqs;

  })();

  Restfulizer = (function() {
    function Restfulizer() {
      var _this = this;
      this.buildForm();
      $('.delete-resource').submit(function() {
        return _this.displayDeleteConfirmation();
      });
    }

    Restfulizer.prototype.buildForm = function() {
      $('[data-method]').append(function() {
        return "<form action=\"" + ($(this).attr('href')) + "\" method=\"POST\" style=\"display:none\" class=\"delete-resource\">\n\n   <input type=\"hidden\" name=\"_method\" value=\"" + ($(this).attr('data-method')) + "\">\n\n</form>\n";
      });
      return $('[data-method]').removeAttr('href').attr('style', 'cursor:pointer;').attr('onclick', '$(this).find("form").submit();');
    };

    Restfulizer.prototype.displayDeleteConfirmation = function() {
      return confirm("Are you sure you want to delete this item?");
    };

    return Restfulizer;

  })();

  Services = (function() {
    function Services() {
      if ($('textarea').length) {
        this.displayRichTextEditor();
      }
      this.makeTableSortable();
    }

    Services.prototype.displayRichTextEditor = function() {
      return $('textarea').summernote({
        height: 300,
        codemirror: {
          theme: 'monokai'
        },
        toolbar: [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']]]
      });
    };

    Services.prototype.makeTableSortable = function() {
      var _this = this;
      if ($('#sortable').length) {
        this.sortable = $('#sortable');
        this.sortable.sortable({
          helper: this.fixHelperModified,
          axis: "y"
        });
        this.sortable.on("sortupdate", function(event, ui) {
          return _this.updateSortOrder();
        });
        return this.sortable.disableSelection();
      }
    };

    Services.prototype.updateSortOrder = function() {
      var sort_order,
        _this = this;
      sort_order = this.sortable.sortable("serialize");
      this.displayUpdateSuccess();
      return $.ajax({
        type: "put",
        url: "/admin/services/sort",
        data: sort_order,
        success: function() {
          return _this.hideUpdateSuccess();
        }
      });
    };

    Services.prototype.displayUpdateSuccess = function() {
      return $('#success').html("Updating").show();
    };

    Services.prototype.hideUpdateSuccess = function() {
      return $('#success').text("Updated successfully").delay(2500).fadeOut(500);
    };

    Services.prototype.fixHelperModified = function(e, tr) {
      var $helper, $originals;
      $originals = tr.children();
      $helper = tr.clone();
      $helper.children().each(function(index) {
        return $(this).width($originals.eq(index).width()).css("background-color", "#9cf").css("border-bottom", "1px solid #dddddd");
      });
      return $helper;
    };

    return Services;

  })();

  Settings = (function() {
    function Settings() {
      this.form = $("#edit-setting-form");
      this.bindEvents();
    }

    Settings.prototype.bindEvents = function() {
      var _this = this;
      this.form.submit(function(e) {
        return _this.submitForm(e);
      });
      return this.attachRichTextEditor();
    };

    Settings.prototype.attachRichTextEditor = function() {
      return $('textarea[name=value]').summernote({
        height: 300,
        codemirror: {
          theme: 'monokai'
        }
      });
    };

    Settings.prototype.submitForm = function(e) {
      var btn, spinner;
      btn = this.form.find('button[type=submit]');
      spinner = btn.find('i');
      spinner.show();
      $.ajax({
        type: "put",
        url: this.form.attr('action'),
        data: this.form.serialize(),
        success: function() {
          console.log(spinner);
          return spinner.delay(300).hide(function() {
            return btn.html("Updated!").addClass('btn-success disabled');
          });
        }
      });
      return e.preventDefault();
    };

    return Settings;

  })();

  Users = (function() {
    function Users() {
      this.form = $('#user-form');
      this.name = $('input[name="name"]');
      this.email = $('input[name="email"]');
      this.password = $('input[name="password"]');
      this.passwordConfirmation = $('input[name="password-confirmation"]');
      if (this.form.find('input[name=_method]').length) {
        this.updatingProfile = true;
      }
      if (this.updatingProfile) {
        this.getOldValues();
      }
      this.passwordRegex = new RegExp(/^[a-zA-Z0-9]{6,10}$/);
      this.nameRegex = this.lastNameRegex = new RegExp(/^.{1,30}$/);
      this.emailRegex = new RegExp(/^([a-zA-Z0-9_\-])([a-zA-Z0-9_\-\.]*)@(\[((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}|((([a-zA-Z0-9\-\_]+)\.)+))([a-zA-Z]{2,}|(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\])$/);
      this.bindEvents();
    }

    Users.prototype.getOldValues = function() {
      return this.oldEmail = this.email.val();
    };

    Users.prototype.bindEvents = function() {
      var _this = this;
      this.name.blur(function(e) {
        return _this.checkName();
      });
      this.email.blur(function(e) {
        return _this.checkEmail();
      });
      this.password.blur(function(e) {
        return _this.checkPassword();
      });
      this.passwordConfirmation.blur(function(e) {
        return _this.checkPasswordsAgree();
      });
      return this.form.submit(function(e) {
        return _this.validateForm();
      });
    };

    Users.prototype.validateForm = function() {
      var ok;
      ok = true;
      ok = this.checkName() && ok;
      ok = this.checkEmail() && ok;
      if (!((this.updatingProfile != null) && this.updatingProfile && this.password.val().length === 0)) {
        ok = this.checkPassword() && ok;
        ok = this.checkPasswordsAgree() && ok;
      }
      return ok;
    };

    Users.prototype.checkName = function() {
      var val;
      val = $.trim(this.name.val());
      if (this.nameRegex.test(val)) {
        this.markConfirm(this.name);
        return true;
      } else {
        this.markError(this.name);
        return false;
      }
    };

    Users.prototype.checkEmail = function() {
      var val,
        _this = this;
      val = $.trim(this.email.val());
      if ((this.updatingProfile != null) && val === this.oldEmail) {
        this.markConfirm(this.email);
        return true;
      } else {
        if (this.emailRegex.test(val)) {
          return $.ajax({
            type: "post",
            url: "/admin/users/checkEmailExists",
            data: {
              email: val
            },
            success: function(data) {
              if (data.match_found) {
                _this.markError(_this.email);
                return false;
              } else {
                _this.markConfirm(_this.email);
                return true;
              }
            }
          });
        } else {
          this.markError(this.email);
          return false;
        }
      }
    };

    Users.prototype.checkPassword = function() {
      var val;
      val = $.trim(this.password.val());
      if (((this.updatingProfile != null) && val.length === 0) || this.passwordRegex.test(val)) {
        this.markConfirm(this.password);
        return true;
      } else {
        this.markError(this.password);
        return false;
      }
    };

    Users.prototype.checkPasswordsAgree = function(e) {
      var pwd, pwdConfirm;
      pwd = $.trim(this.password.val());
      pwdConfirm = $.trim(this.passwordConfirmation.val());
      if (pwd === pwdConfirm && this.checkPassword()) {
        this.markConfirm(this.passwordConfirmation);
        return true;
      } else {
        this.markError(this.passwordConfirmation);
        return false;
      }
    };

    Users.prototype.markConfirm = function(elem) {
      elem.closest('.form-group').find('.text-success').show();
      return elem.closest('.form-group').find('.text-danger').hide();
    };

    Users.prototype.markError = function(elem) {
      elem.closest('.form-group').find('.text-success').hide();
      return elem.closest('.form-group').find('.text-danger').show();
    };

    return Users;

  })();

}).call(this);
