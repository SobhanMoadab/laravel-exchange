<!DOCTYPE html>
<html lang="en">
@if(!session()->has('verification_code'))
<form class="text-left" action="{{route('order_verify')}}" method="POST">
    @include('flash-message')
    @csrf
    <input name="email" placeholder="email">
    <button type="submit">ثبت</button>
</form>
@endif
<form class="text-left" action="{{route('verify_code')}}" method="POST">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="password_confirmation" placeholder="password">
    <button type="submit"> تایید رمز عبور</button>
</form>

</html>