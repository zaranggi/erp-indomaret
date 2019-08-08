                <h4  > INDOMARET CABANG JEMBER<br/></h4>
                <h5  >Cab. Jember <br/>Periode : {{ $tanggal }}</h5>

            TANGGAL	NIK	NAMA	BAGIAN	LEMBUR				KETERANGAN
            AWAL	AKHIR	 O.T 	 L.N

                    <table border="1">

                        <tr style="background-color:aqua;font-weight: bold;background-color: #0a6ebd;text-align: center">
                            <td rowspan="2">NO</td>
                            <td rowspan="2">DEPARTEMEN</td>
                            <td rowspan="2">NIK</td>
                            <td rowspan="2">NAMA</td>
                            <td rowspan="2">TANGGAL</td>
                            <td colspan="4">LEMBUR</td>
                            <td rowspan="2">KETERANGAN</td>
                        </tr>
                        <tr style="background-color:aqua;font-weight: bold;background-color: #0a6ebd;text-align: center">

                            <td>AWAL</td>
                            <td>AKHIR</td>
                            <td>O.T</td>
                            <td>LN</td>
                        </tr>

                        <?php
                            $no = 1;
                            ?>

                        @foreach($listdep as $x)

                            @foreach($data[$x->id] as $r)

                                @if( $r->TANGGAL == "" && $r->NIK <> "" )
                                    <tr>
                                    <td  align="center" colspan="7"> Total</td>
                                        <td align="center">
                                            {{ $r->TOTAL_NORMAL }}
                                        </td>
                                        <td align="center">
                                            {{ $r->TOTAL_MERAH }}
                                        </td>
                                        <td align="center"></td>
                                    </tr>
                                @elseif( $r->TANGGAL == "" && $r->NIK == "" )
                                    <tr>
                                        <td  align="center" colspan="7">Grand Total {{$r->name_department}}</td><td class="text-center">
                                            {{ $r->TOTAL_NORMAL }}
                                        </td>
                                        <td align="center">
                                            {{ $r->TOTAL_MERAH }}
                                        </td>
                                        <td align="center"></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td  align="center">{{ $no }}</td>
                                        <td align="center">{{ $r->name_department }}</td>
                                        <td align="center">{{ $r->NIK }}</td>
                                        <td  >{{ $r->NAME}}</td>
                                        <td align="center">{{ $r->TANGGAL}}</td>
                                        <td align="center">{{ $r->JAM_START }}</td>
                                        <td align="center">{{ $r->JAM_END }}</td>
                                        <td align="center">
                                            {{ $r->TOTAL_NORMAL }}
                                        </td>
                                        <td class="text-center">
                                            {{ $r->TOTAL_MERAH }}
                                        </td>

                                        <td  >{{ $r->KETERANGAN }}</td>
                                    </tr>
                                @endif

                                <?php
                                    $no++;

                                ?>
                            @endforeach

                        @endforeach

                    </table>

