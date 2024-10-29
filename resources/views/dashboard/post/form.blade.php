

@csrf  {{--TOken--}}
        <label for="">title</label>
        <input type="text" name="title" value="{{old('title',$post->title)}}">

        <label for="">slug</label>
        <input type="text" name="slug" value="{{old('slug',$post->slug)}}">

        <label for="">Content</label>
        <textarea name="content">{{old('content',$post->content)}}</textarea>



        <label for="">Category</label>
        <select name="category_id" >

            {{----- como ya hicimos un get, nos trae todas las categorías, y nadamas las ponemos en un option con un foreach----
            @foreach ($categories as $c)
                <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach--}}
            @foreach ($categories as $id => $title)
              <option {{old('category_id',$post->category_id) == $id ? 'selected' : ''}} value="{{ $id }}">{{ $title }}</option>
            @endforeach
            
        </select>


        <label for="">Description</label>
        <textarea name="description">{{old('description',$post->description)}}</textarea>

        <label for="">Posted</label>
        <select name="posted" id="">
            <option {{old('posted',$post->posted)=='not' ? 'selected':''}} value="not">no</option>
            <option {{old('posted',$post->posted)=='yes' ? 'selected':''}} value="yes">yes</option>
        </select>
    
        {{--Acá lo que hay en el if() es lo que estamos importando de la vista edit.blade... Lo que dice la linea 10--}}
        @if (isset($task)&&$task=='edit')
        <label for="">Image</label>
            <input type="file" name="image">
        @endif

        <button type="submit">send</button>