@extends('auth.layouts')

@section('content')
<div class="flex justify-center mt-5">
    <div class="w-1/2 bg-white p-4 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
        @if ($message = Session::get('success'))
        <div class="bg-white p-4 rounded shadow-md">

        <h1 class="text-3xl font-semibold">Saidil Halim</h1>
        <p class="text-gray-600">Mahasiswa</p>
        
        <hr class="my-2 border-t-2 border-gray-300">
        
        <div class="mt-4">
            <h2 class="text-xl font-semibold">Contact Information</h2>
            <p>Email: saidilhalim@mail.ugm.ac.id</p>
            <p>Phone: (123) 456-7890</p>
        </div>
        
        <div class="mt-4">
            <h2 class="text-xl font-semibold">Pendidikan</h2>
            <p class="font-semibold">SMAS Unggulan Ar-Rahman</p>
            <p>2019-2022</p>
            <p class="font-semibold">D4 Software Engineering Eechnology</p>
            <p>Gadjah Mada University</p>
            <p>2022-now</p>

            
        </div>
        
        <div class="mt-4">
            <h2 class="text-xl font-semibold">Pengalaman</h2>
            <p class="font-semibold">Januari 2020 ANTARIKSA Ar-Rahman 2020</p>
            <p>Menjadi Panitia ANTARIKSA Ar-Rahman tahun 2020, sebagai penaggung jawab lomba olimpiade IPA dan lomba memanah.</p>
            <p class="font-semibold">Januari 2021 ANTARIKSA Ar-Rahman 2021</p>
            <p>Menjadi Panitia ANTARIKSA Ar-Rahman tahun 2021, sebagai ketua penaggung jawab lomba olimpiade Sains .</p> 
        </div>

        <div class="mt-4">
            <h2 class="text-xl font-semibold">Pencapaian</h2>
            <li>Agustus 2018 semifinalis (8 Besar) Line Follower Robot-Sukabumi Robotic Competititon.</li>
            <li>September 2019 Juara 3 Kelas Menengah Kejuaraan Pencak Silat Paku Bumi Open VIII..</li>
            <li>Februari 2020 Juara 2 Kelas Menengah Kejuaraan Nasional APEC Pencak Silat II.</li>    
        </div>
        
        <div class="mt-4">
            <h2 class="text-xl font-semibold">Skills</h2>
            <ul class="list-disc list-inside">
                <li>HTML, CSS, JavaScript</li>
                <li>Android, Kotlin</li>
                <li>Version Control (Git)</li>
                <li>UI/UX Design</li>
            </ul>
        </div>
    </div>
        @else
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Info!</strong>
            <span class="block sm:inline">You are logged in!</span>
        </div>
        @endif
    </div>
</div>
@endsection
