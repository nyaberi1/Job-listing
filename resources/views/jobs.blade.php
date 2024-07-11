<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <ul>
    @foreach($jobs as $job)
    <li>
        <a href="/jobs/{{$job['id']}}" class="text-blue-500 hover:underline">
    <strong>{{$job['title']}} </strong>: {{$job['salary']}} Per year.
    </li></a>
    @endforeach
    </ul>

</x-layout>