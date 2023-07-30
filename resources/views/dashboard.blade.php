<x-layout>

    <x-cards  :count="$count" ></x-cards>

    <div class="details">
            {{-- <x-recentLogs :logs="$logs" ></x-recentLogs> --}}
            <x-recentLogs></x-recentLogs>

            <!-- ================= New Customers ================ -->
            <x-recentUsers :users="$users"></x-recentUsers>
    </div>



</x-layout>
