<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Menu
        </li>

        @foreach($category as $cate)
        <li href="#" class="list-group-item menu1">
            {{$cate->Name}}
        </li>
        <ul>
            @foreach($cate->category as $child)
                <li class="list-group-item">
                    <a href="category/{{$child->Id}}">{{$child->Name}}</a>
                </li>
            @endforeach
        </ul>
        @endforeach
</div>