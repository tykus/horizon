@section('scripts')
  {{-- The following scripts are required to render a Rich Text Editor in place of the 'content' textarea --}}
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>
  <script src="/js/summernote.min.js"></script>
@stop

@section('styles')
  {{-- The following styles are required to render a Rich Text Editor in place of the 'content' textarea --}}
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
  <link href="/css/summernote.css" rel="stylesheet">
@stop
