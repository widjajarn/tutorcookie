<h1>Data Mahasiswa</h1>

<form method='post' action='/simpanmhs'>
    @csrf
    <input type='text'   name='t1'  class='form-control' placeholder='Nrp Anda :'><br><br>
    <input type='text'   name='t2'  class='form-control' placeholder='Nama Anda :'><br><br>
    <input type='submit' name='b3'  class='btn btn-primary' value='Simpan Data'>
    <input type='submit' name='b4'  class='btn btn-primary' value='Clear Data'>

    <br><br>
    <h3>php Versi</h3>
    <?php 
        $arr = json_decode(Cookie::get('datamhs')) ?? []; 
        $jum = count($arr); 
        echo "<table border='1'>"; 
        for($i = 0; $i < $jum; $i++) {
            echo "<tr>"; 
                echo "<td>".$arr[$i]->nrp."</td>";
                echo "<td>".$arr[$i]->nama."</td>";
                echo "<td><a href='/hapusdata/".$i."'>Delete</a></td>";
            echo "</tr>"; 
        }
        echo "</table>"; 
    ?>
    <br><br>
    <h3>Blade Versi</h3>
    @php
        $arr = json_decode(Cookie::get('datamhs')) ?? []; 
        $jum = count($arr); 
    @endphp
        <table border='1'>
        @for($i = 0; $i < $jum; $i++)
            <tr>
                <td>{{ $arr[$i]->nrp }}</td>
                <td>{{ $arr[$i]->nama }}</td>
            </tr>
        @endfor
        </table>
</form>