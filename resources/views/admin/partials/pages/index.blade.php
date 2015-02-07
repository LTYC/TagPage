@foreach(TagPage\TagPage::where('lft', '>', 1)->orderBy('lft')->get() as $tagPage)
    <div class="row">
        <div class="col-sm-{{ 12 - ($tagPage->depth - 1) }} col-sm-offset-{{ ($tagPage->depth - 1) }}">
            <a href="{{ URL::to($tagPage->perma_link)  }}">{{ $tagPage->perma_link  }}</a>
        </div>
    </div>
@endforeach