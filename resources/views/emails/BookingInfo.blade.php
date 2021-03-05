@component('mail::message')
# Introduction

Room Number: {{ $cabin->cabin_number }}<br>
Total Room: {{ $cabin->total_room }}<br>
Washroom: {{ $cabin->total_bathroom }}<br>
Total Bed: {{ $cabin->total_bed }}<br>
Floor: {{ $cabin->floor }}<br>
Price: {{ $cabin->price }}<br>

@component('mail::button', ['url' => ''])
<button btn-danger>Warning!</button>
@endcomponent
<p>Please call with in 2 hours. Otherwise Your booking will be dismiss.</p>
<p>Contact: 017xxxxxxxx</p>
<p>Email: email@gamil.com</p>

Thanks<br>
@endcomponent
