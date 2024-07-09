<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    @foreach($jobs as $job)
    <li>
        
    <strong>{{$job['title']}} </strong>: {{$job['salary']}} Per year.
    </li>
    @endforeach

</x-layout>