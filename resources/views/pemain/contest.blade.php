@extends('pemain.layout.layout', ['title' => 'Contest'])

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('styles')
    <style>
        body {
            background: url("{{ asset('asset2024') }}/main/peserta-contest.png") no-repeat center;
            background-size: cover;
        }
        .action:hover {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="grid grid-cols-1 gap-10 w-full max-w-7xl">
        {{--   Introduction    --}}
        <div class="card rounded-lg shadow-md data">
            <img
                src="{{ asset('asset2024') }}/main/viking-head.png"
                alt=""
                class="absolute w-32 top-[-4.3rem] left-[-4rem] animate-pulse"
                draggable="false"
            >
            <h1 class="text-xl bg-base-300 p-5 font-bold rounded-t-lg">Contest Maniac XIII 🏆</h1>
            <div class="card-body bg-base-200 rounded-b-lg">
                <p class="pb-3 sm:pb-0 break-words">
                    Anda dapat melihat <strong>Available Contest</strong>, <strong>Upcoming Contest</strong>, and <strong>Finished Contest</strong> di sini.
                </p>
                <div role="alert" class="alert alert-success rounded-md py-2">
                    <span>Mohon lakukan refresh page untuk update data contest.</span>
                </div>
                <div role="alert" class="alert alert-warning rounded-md py-2">
                    <span><strong>Deadline</strong> pengumpulan tugas penyisihan adalah <strong>30 menit sebelum jadwal selesai!</strong></strong></span>
                </div>
                <div role="alert" class="alert alert-error rounded-md py-2">
                    <span><strong>Jadwal Selesai</strong> adalah jadwal <strong>pengumpulan akhir</strong> untuk penyisihan!</span>
                </div>
            </div>
        </div>

        {{--   Available Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-base-300 p-5 font-bold rounded-t-lg">Available Contest</h1>
            <div class="card-body bg-base-200 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="30%" class="text-center">Jadwal Mulai</th>
                            <th width="30%" class="text-center">jadwal Selesai</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-white bg-accent">
                        @if(count($available_contests) != 0)
                            @foreach($available_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="30%" class="text-center">{{ $contest->open_date }} WIB</td>
                                    <td width="30%" class="text-center">{{ $contest->close_date }} WIB</td>
                                    @php($action = ($contest->join_date) ? 'Rejoin' : 'Join')
                                    <td width="10%" class="text-center">
                                        <a
                                            class="btn btn-outline btn-info btn-sm rounded-md px-5 py-0 w-full font-bold action"
                                            href="{{ route('team.contest.submission', $contest) }}"
                                            >
                                            {{ $action }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Active Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--   Upcoming Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-base-300 p-5 font-bold rounded-t-lg">Upcoming Contest</h1>
            <div class="card-body bg-base-200 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="30%" class="text-center">Jadwal Mulai</th>
                            <th width="30%" class="text-center">jadwal Selesai</th>
                        </tr>
                        </thead>
                        <tbody class="bg-accent text-white">
                        @if(count($upcoming_contests) != 0)
                            @foreach($upcoming_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="30%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="30%" class="text-center">{{ $contest->close_date }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Upcoming Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--   Finished Contest    --}}
        <div class="card rounded-lg shadow-md data">
            <h1 class="text-xl bg-base-300 p-5 font-bold rounded-t-lg">Finished Contest</h1>
            <div class="card-body bg-base-200 rounded-b-lg">
                <div class="overflow-x-auto">
                    <table class="table table-pin-cols">
                        <thead>
                        <tr class="">
                            <th width="15%" class="text-center">Nama</th>
                            <th width="15%" class="text-center">Tipe</th>
                            <th width="30%" class="text-center">Jadwal Mulai</th>
                            <th width="30%" class="text-center">jadwal Selesai</th>
                        </tr>
                        </thead>
                        <tbody class="text-white bg-accent">
                        @if(count($finished_contests) != 0)
                            @foreach($finished_contests as $contest)
                                <tr>
                                    <td width="15%" class="text-center">{{ $contest->name }}</td>
                                    <td width="15%" class="text-center">{{ $contest->type }}</td>
                                    <td width="30%" class="text-center">{{ $contest->open_date }}</td>
                                    <td width="30%" class="text-center">{{ $contest->close_date }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5"><p class="font-medium text-slate-200 text-center">No Finished Contest</p></td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const datas = gsap.utils.toArray('.data');
        datas.forEach(data => {
            const anim = gsap.fromTo(
                data,
                {
                    autoAlpha: 0,
                    y: 100,
                },
                {
                    duration: 0.6,
                    autoAlpha: 1,
                    y: 0,
                    x: 0,
                }
            );
            ScrollTrigger.create({
                trigger: data,
                animation: anim,
            });
        });
    </script>
@endsection
