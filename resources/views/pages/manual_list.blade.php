@extends('layouts.default')

@section('head')
<meta name="robots" content="index, nofollow">
@stop

@section('breadcrumb')
	<li><a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
	<li><a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/{{ $type->id }}/{{ $type->name_url_encoded }}/" alt="Manuals for '{{$brand->name}} {{ $type->name }}'" title="Manuals for '{{$brand->name}} {{ $type->name }}'">{{ $type->name }}</a></li>
@stop

@section('content')

<h1>{{ $brand->name }} - {{ $type->name }}</h1>

<p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name, 'type'=>$type->name]) }}</p>


	@foreach ($manuals as $manual)
	
		@if ($manual->locally_available)
		<div>
			<a class="linkButton" href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/{{ $type->id }}/{{ $type->name_url_encoded }}/{{ $manual->id }}/" alt="{{ __('misc.view_manual_alt') }}" title="{{ __('misc.view_manual_alt') }}"><p><span class="bg"></span><span class="base"></span><span class="text">{{ __('misc.view_manual') }}</span></p></a> 
		</div>
			({{$manual->filesize_human_readable}})
		@else
		<div class="button">
			<a class="linkButton" href="{{ $manual->url }}" target="new" alt="{{ __('misc.download_manual_alt') }}" title="{{ __('misc.download_manual_alt') }}"><p><span class="bg"></span><span class="base"></span><span class="text">{{ __('misc.download_manual') }}</span></p></a>
		</div>
		@endif
		
		<br />
	@endforeach
 
@stop