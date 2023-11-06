<x-layout>

    <div class="container-fluid d-flex justify-content-center ">
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{foreach($reviews as $review)}}
                <tr>
                    <td>{{$review->HasUser->email}}</td>
                    <td>{{$review->created_at}}</td>
                    <td><a href="">Vedi</a></td>
                </tr>
                {{endforeach}}
            </tbody>
        </table>
    </div>

</x-layout>