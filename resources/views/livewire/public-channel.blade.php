<div class="alert alert-info">
    <h5>Canal público</h5>
    <div>
        <ul>
            @foreach($mensagens as $item)
            <li>
                {{ $item }}
            </li>
            @endforeach
        </ul>
    </div>
</div>