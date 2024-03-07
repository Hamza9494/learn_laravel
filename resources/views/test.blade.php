@foreach ($data as $person)
<h1> the name is: {{$person["name"]}}</h1>
<h2> the role is: {{$person["job"]}}</h2>
@endforeach