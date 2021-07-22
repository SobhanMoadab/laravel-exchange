@include('User.Layout.Header')

<section class=" mt-5 mb-4">
    <div class="container bg-white">
        <div class="row p-4 shadow-lg rounded-2">
            <p class=" mt-5 mb-5">Ticket</p>
            <form action="{{route('user_store_ticket')}}" method="POST">
                @csrf
                @include('flash-message')
                <input name="title" class="form-control d-inline w-25" placeholder="title">
                <input name="content" class="form-control d-inline w-25" placeholder="content">
                <select name="priority" class="form-select d-inline w-25">
                    <option value="high">high</option>
                    <option value="medium">medium</option>
                    <option value="low">low</option>
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
    
</section>

@include('User.Layout.Footer')