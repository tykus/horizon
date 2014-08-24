class Restfulizer
  constructor: ->
    @buildForm()
    $('.delete-resource').submit => @displayDeleteConfirmation()

  buildForm: ->
    $('[data-method]').append ->
      """
      <form action="#{$(this).attr('href')}" method="POST" style="display:none" class="delete-resource">\n
         <input type="hidden" name="_method" value="#{$(this).attr('data-method')}">\n
      </form>\n
      """
    $('[data-method]').removeAttr('href')
                      .attr('style','cursor:pointer;')
                      .attr('onclick','$(this).find("form").submit();')

  displayDeleteConfirmation: ->
    confirm "Are you sure you want to delete this item?"


