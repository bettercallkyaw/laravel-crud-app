@extends('layout.main')

@section('title','all persons')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 mt-5">
        @if (Session::has('successMsg'))
            <div class="alert alert-success">
                {{ Session::get('successMsg') }}
            </div>
        @endif

        @if (Session::has('alertMsg'))
            <div class="alert alert-danger">
                {{ Session::get('alertMsg') }}
            </div>
        @endif
        <h1 class="text-center">All Persons</h1>
         <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

               @foreach ($persons as $key=>$person )
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $person->firstName }}</td>
                    <td>{{ $person->lastName }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->city }}</td>
                    <td>
                        <a href="{{ route('person.edit',$person->id) }}" class="btn btn-info waves-effect">
                            edit
                         </a>
                    </td>

                    <td>
                        

                                <a href="{{ route('person.delete',$person->id) }}" class="btn btn-info btn-danger">
                                    delete
                                </a> 
                            

                            
                    </td>
                </tr>
                @endforeach
                
            </tbody>

        </table>
       
        {{ $persons->links() }}
    </div>
</div>
</div>
@endsection

