@props(['name'])

@if(session()->has($name))
<script>
    window.onload = function() {
        window.toast('{{session()->get($name)}}', {type: $name, position: "top-right"})
    }
</script>
@endif