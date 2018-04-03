<form action="/home/{{$post->id}}" method="post">
                    <input type="hidden" name="_method" value="DELETE" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-danger form-control" value="DELETE" >
</form>