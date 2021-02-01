@csrf

<label for="title">
    Título del proyecto
</label>

<div class="form-group">
    <input
        id="title"
        class="
            form-control
            bg-light
            shadow-sm
            @if ($errors->has('title')) is-invalid @else border-0 @endif
        "
        type="text"
        name="title"
        value="{{ old('title', $project->title) }}">
</div>

<label for="url">
    URL del proyecto
</label>

<div class="form-group">
    <input
        id="url"
        class="
            form-control
            bg-light
            shadow-sm
            @if ($errors->has('url')) is-invalid @else border-0 @endif
        "
        type="text"
        name="url"
        value="{{ old('url', $project->url) }}">
</div>

<label for="description">
    Descripción del proyecto
</label>

<div class="form-group">
    <textarea
        id="description"
        class="
            form-control
            bg-light
            shadow-sm
            @if ($errors->has('description')) is-invalid @else border-0 @endif
        "
        name="description">
        {{ old('description', $project->description) }}
    </textarea>
</div>

<button class="btn btn-primary btn-lg btn-block">
    {{ $btnText }}
</button>
