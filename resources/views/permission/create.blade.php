<!DOCTYPE html>
<html lang="en">
@include('flash-message')

<form class="text-left" action="{{route('create_role')}}" method="POST">

    <div class="form">
        @csrf
        <div id="username-field" class="field-wrapper input">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user" style="margin-top: -30px">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input type="string" class="form-control  bg-light text-dark" name='name' placeholder='نام سطح'>
        </div>
        <button> ثبت </button>
    </div>
</form>

<form class="text-left" action="{{route('assign_permission_to_role')}}" method="POST">
    @csrf
    @if(!empty($result['roles']))
    <div class="form">
        <select id='select' name='name'>
            @foreach($result['roles'] as $role)
            <option value="$role"> {{$role}}</option>
            @endforeach
        </select>
        <label for="select">سطح</label>
    </div>
    @endif
    @if(!empty($result['permissions']))
    <div class="form">
        <select id='select' name='permission'>
            @foreach($result['permissions'] as $permission)
            <option value='$permission'>{{$permission}}</option>
            @endforeach
        </select>
        <label for="select">دسترسی</label>
    </div>
    @endif

    <button> ثبت </butto>
</form>

</html>