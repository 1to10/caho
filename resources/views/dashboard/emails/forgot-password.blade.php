<h1>Hello</h1>

<p>Please click the following link to reset your password.


<a href="{{ env('APP_URL') }}/dashboard/reset/{{$user->email}}/{{$code}}">Click here!</a>
</p>