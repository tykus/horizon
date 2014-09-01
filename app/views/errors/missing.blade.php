@extends('layouts.site')

@section('content')
	<div id="content" class="container">
		<h1>Oops!</h1>
		<p class="lead">
			It looks like you have been mis-directed, or taken a wrong turn, because the requested url was not found:<br><samp>{{ $url }}</samp>
		</p>
		<p class="lead">Perhaps you have followed an old link, or typed the url incorrectly.</p>
		<p class="lead">Here is our sitemap to help you back find what you were looking for:</p>
		<ul class="tree">
			<li>
				{{ HTML::link('/#home', 'Home') }}
				<ul>
					<li>
						{{ HTML::link('/#services', 'Services') }}
						<ul>
							@foreach($services as $service)
								<li>{{ HTML::linkRoute('service_path', $service->title, $service->slug) }}</li>
							@endforeach
						</ul>
					</li>
					<li>{{ HTML::link('/#about', 'About / Bio') }}</li>
					<li>{{ HTML::link('/#location', 'Location') }}</li>
					<li>{{ HTML::link('/#contact', 'Contact') }}</li>
					<li>
						{{ HTML::linkRoute('articles_path', 'Articles') }}
						<ul>
							@foreach($articles as $article)
								<li>{{ HTML::linkRoute('article_path', $article->title, $article->slug) }}</li>
							@endforeach
						</ul>
					</li>
					<li>{{ HTML::linkRoute('faqs_path', 'FAQs') }}</li>
				</ul>
			</li>
		</ul>
	</div>
@stop