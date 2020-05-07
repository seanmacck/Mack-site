<div class="form-group">

<label>Title</label>
<input type="text" name="title" class="form-control"
    value="{{ old('title', $post->title ?? null) }}"/>

</div>

<p>
<label>Content</label>
<input type="text" name="content" class="form-control"
     value="{{ old('content', $post->content ?? null) }}"/>
</p>

@if($errors->any())
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
