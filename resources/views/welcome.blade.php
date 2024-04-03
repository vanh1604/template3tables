@extends('layout.app')
@section('centent')
    @include('components.messages')
    <button onclick="openCreateForm()">Create</button>
    <table>
        <thead>
            <th>id</th>
            <th>Number</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>

            @foreach ($rooms as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->number }}</td>
                    <td>{{ $r->type }}</td>
                    <td>{{ $r->status }}</td>
                    <td colspan="2">
                        <a href="{{ route('rooms.show', $r->id) }}" class="btn btn-info">Show</a>
                        <button class="btn btn-danger p-2 rounded-2" onclick="showMessage({{ $r->id }})">
                            @csrf
                            Delete</button>
                        <div id="confirm-{{ $r->id }}"
                            class="fixed-top fixed-bottom model justify-content-center align-items-center modal d-none">
                            <div class="bg-light w-50 p-5 rounded-2">
                                <p class="text-black">Are you sure you want to delete this shop?</p>
                                <button type="button" class="btn btn-danger rounded p-2"
                                    onclick="document.getElementById('confirm-{{ $r->id }}').classList.add('d-none');
                                    document.getElementById('confirm-{{ $r->id }}').classList.remove('d-flex'); ">Cancel</button>
                                <form action="{{ route('rooms.destroy', $r->id) }}" method="POST">
                                    <button type="submit" class="btn btn-primary rounded p-2">
                                        @csrf
                                        @method('DELETE')
                                        Delete</button>
                                </form>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $rooms->links('components.pagination') }}
    <div id="form-create" class=" fixed-bottom fixed-top model d-none justify-content-center align-items-center">
        <form action="{{ route('rooms.store') }}" method="post" class="p-5 bg-white rounded">
            @csrf
            <div class="mb-3">
                <label for="number">number:</label>
                <input type="text" name="number">
            </div>
            <div class="mb-3">
                <label for="type">Type:</label>
                <select name="type" id="">
                    <option value="standard">standard</option">
                    <option value="deluxe">deluxe</option>
                    <option value="suite">suite</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="status">Status:</label>
                <select name="status" id="">
                    <option value="available">available</option>
                    <option value="occupied">occupied</option>
                    <option value="under maintaince">under maintaince</option>
                </select>

            </div>
            <div class="d-flex w-60 justify-content-between">
                <button type="button" onclick="closeCreateModel()" class="btn btn-danger rounded p-2">Cancel</button>
                <button type="submit" class="btn btn-success rounded p-2">Create</button>
            </div>
        </form>
    </div>
    <script>
        function openCreateForm() {
            document.getElementById('form-create').classList.add("d-flex");
            document.getElementById('form-create').classList.remove("d-none");
        }

        function closeCreateModel() {
            document.getElementById('form-create').classList.remove("d-flex");
            document.getElementById('form-create').classList.add("d-none");
        }

        function showMessage(id) {
            document.getElementById(`confirm-${id}`).classList.remove("d-none");
            document.getElementById(`confirm-${id}`).classList.add("d-flex");
        }
    </script>
@endsection
