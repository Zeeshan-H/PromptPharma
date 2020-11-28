<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
		<link rel="stylesheet" href="{{asset('frontcss/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
@if ($paginator->hasPages())
    
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><i class="fa fa-angle-double-left"></i> Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left"></i> Previous</a></li>
        @endif

        <!-- Pagination Elements -->
		@foreach ($elements as $element)
			<!-- "Three Dots" Separator -->
			@if (is_string($element))
			<li class="disabled"><span>{{ $element }}</span></li>
			@endif

			<!-- Array Of Links -->
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li class="active"><span>{{ $page }}</span></li>
					@else
						<li><a href="{{ $url }}">{{ $page }}</a></li>
					@endif
				@endforeach
			@endif
		@endforeach

		<!-- Next Page Link -->

        @if ($paginator->hasMorePages())
			<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next <i class="fa fa-angle-double-right"></i></a></li>
		@else
        
			<li class="disabled"><span>Next <i class="fa fa-angle-double-right"></i></span></li>
		@endif
    </ul>

@endif
</body>
</html>