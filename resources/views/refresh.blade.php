
@if ($data->count() == 0)
    <h5 class="m-5 text-secondary text-center">Data kosong, silahkan tambah data dengan form disamping</h5>    
@else
    

<table class="table table-hover">
<thead>
    <tr>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>    
    @foreach ($data as $item)
    
    <tr>
        <td>{{ $item["name"] }}</td>
        <td>{{ $item["email"] }}</td>
        <td>
            <a href="#" 
                onclick="APICONTROLL.update(event)"
                user_id="{{ $item["id"] }}" 
                user_name="{{ $item["name"] }}" 
                user_email="{{ $item["email"] }}"
            >update</a>
            <br>
            <a href="#"
            onclick="APICONTROLL.delete(event)"
            user_id="{{ $item["id"] }}" >delete</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

@endif
