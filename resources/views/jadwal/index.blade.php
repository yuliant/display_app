@extends('layouts.backend')

@section('content')
   <div class="col-md-12">
        <form action="{{ route('jadwal.index') }}" method="GET" class="mb-3">
            <div class="row g-3">
                <div class="col-sm-3">
                    <select class="form-control" name="hari">
                        <option value="Senin" @if($selectedHari=='Senin') selected @endif>Senin</option>
                        <option value="Selasa" @if($selectedHari=='Selasa') selected @endif>Selasa</option>
                        <option value="Rabu" @if($selectedHari=='Rabu') selected @endif>Rabu</option>
                        <option value="Kamis" @if($selectedHari=='Kamis') selected @endif>Kamis</option>
                        <option value="Jumat" @if($selectedHari=="Jumat") selected @endif>Jumat</option>
                        <option value="Sabtu" @if($selectedHari=='Sabtu') selected @endif>Sabtu</option>
                        <!-- Tambahkan opsi-opsi hari lainnya sesuai dengan kebutuhan Anda -->
                    </select>
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-sm btn-info">Tampilkan Data</button>    
                </div>
            </div>
        </form>     
       <form method="POST" action="{{ route('simpan.jadwal') }}">
           @csrf
           <table class="table table-bordered">
               <thead>
                   <tr>
                       <th colspan="2" class="text-center">Jam Ke</th>
                       @foreach($rombels as $rombel)
                           <th class="text-center">{{ $rombel->nama }}</th>
                       @endforeach
                   </tr>
               </thead>
               <tbody>
                @if(count($hariAktif)>0)
                @foreach($hariAktif as $hari => $dataHari)
                    <tr>
                        <td rowspan="{{count($dataHari)}}">{{ $hari }}</td>
                        <td>{{$dataHari[0]->nama_jam}}</td>
                        @foreach($rombels as $rombel)
                        <td class="text-center">
                            <input type="text" name="kode_guru[{{ $hari }}][{{ $dataHari[0]->id }}][{{ $rombel->id }}]" maxlength="2" style="width: 30px;"
                            value="{{ $jadwalPelajaran->where('jamke_id', $dataHari[0]->id)->where('rombel_id', $rombel->id)->first() ? $jadwalPelajaran->where('jamke_id', $dataHari[0]->id)->where('rombel_id', $rombel->id)->first()->kode_guru : '' }}">
                        </td>
                        @endforeach                            
                    </tr>                
                    @for($i=1;$i<count($dataHari);$i++)
                    <tr>
                        <td>{{$dataHari[$i]->nama_jam}}</td>
                        @foreach($rombels as $rombel)
                        <td class="text-center">
                            <input type="text" name="kode_guru[{{ $hari }}][{{ $dataHari[$i]->id }}][{{ $rombel->id }}]" maxlength="2" style="width: 30px;"
                            value="{{ $jadwalPelajaran->where('jamke_id', $dataHari[$i]->id)->where('rombel_id', $rombel->id)->first() ? $jadwalPelajaran->where('jamke_id', $dataHari[$i]->id)->where('rombel_id', $rombel->id)->first()->kode_guru : '' }}">
                        </td>
                        @endforeach                        
                    </tr>
                    @endfor                  
                @endforeach
                @endif
               </tbody>
           </table>
           <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
       </form>
   </div>
@endsection
