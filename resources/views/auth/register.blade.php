<!DOCTYPE html>
<html lang="en">

<form class="text-left" action="{{route('register')}}" method="POST">

    <div class="form">
        @csrf
        @include('flash-message')
        <div id="username-field" class="field-wrapper input">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user" style="margin-top: -30px">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input type="email" class="form-control  bg-light text-dark" name='email' placeholder='ایمیل'>
            <input type="password" class="form-control  bg-light text-dark" name='password' placeholder='رمز عبور '>
            <input type="password" class="form-control  bg-light text-dark" name='password_confirmation' placeholder='تایید رمز عبور'>
            <select name="country_id">
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-center  btn btnlogin">
            <button type="submit" class="btn btn-secondary" value="">ثبت نام
            </button>
        </div>

</html>