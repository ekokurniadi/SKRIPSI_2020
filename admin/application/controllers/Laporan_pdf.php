  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for all logged in users
 */
class Laporan_pdf extends MY_Controller {

   

   function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->setTopMargin(30);
        $pdf->setLeftMargin(10);
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $no=1;
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(50); $pdf->Image('image/telkom_logo.png',20,10,-700);$pdf->Cell(190,7,'Telkom Indonesia Area Provinsi Jambi',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50);$pdf->Cell(190,5,'Jl. Prof. Dr. Sumantri Brojonegoro No.54 Sungai Putri, Telanai Pura, Kota Jambi',0,1,'C');
        $pdf->Cell(50);$pdf->Cell(190,5,'No.Telp : 07414141 Email : telkomjambi@telkom.co.id  Fax : 07414141',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,7,'DATA BARANG',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->setTopMargin(30);
        $pdf->setLeftMargin(20);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(80,6,'KODE BARANG',1,0);
        $pdf->Cell(85,6,'NAMA BARANG',1,0);
        $pdf->Cell(83,6,'STOK',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('barang')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(10,6,$no++,1,0,'C');
            $pdf->Cell(80,6,$row->kode_barang,1,0);
            $pdf->Cell(85,6,$row->nama_barang,1,0);
            $pdf->Cell(83,6,$row->stok,1,1);
           
        }
        $pdf->Output();
    }

   /* function data_siswa(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $no=1;
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH PERTAMA NEGERI 36 MUARO JAMBI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat

        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(35,6,'Nomor Induk Siswa',1,0);
        $pdf->Cell(35,6,'Nama Lengkap',1,0);
        $pdf->Cell(27,6,'Tempat Lahir',1,0);
        $pdf->Cell(26,6,'Tanggal lahir',1,0);
        $pdf->Cell(18,6,'Agama',1,0);
        $pdf->Cell(26,6,'Jenis Kelamin',1,0);
        $pdf->Cell(20,6,'Kelas',1,1);
        $pdf->SetFont('Arial','',10);
        $siswa = $this->db->get('siswa')->result();
        foreach ($siswa as $row){
            $pdf->Cell(10,6,$no++,1,0,'C');
            $pdf->Cell(35,6,$row->nis,1,0);
            $pdf->Cell(35,6,$row->nama,1,0);
            $pdf->Cell(27,6,$row->tempat_lahir,1,0);
            $pdf->Cell(26,6,$row->tanggal_lahir,1,0); 
            $pdf->Cell(18,6,$row->agama,1,0);
            $pdf->Cell(26,6,$row->jenis_kelamin,1,0);
            $pdf->Cell(20,6,$row->kelas,1,1);
        }
        $pdf->Output();
    }


     function data_guru(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $no=1;
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Image('image/muaro.png' ,10,10,15,20);
        $pdf->Cell(210,7,'SEKOLAH MENENGAH PERTAMA NEGERI 36 MUARO JAMBI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(270,7,'DAFTAR GURU',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat

        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(40,6,'Nomor Induk Pegawai',1,0);
        $pdf->Cell(40,6,'Nama Lengkap',1,0);
        $pdf->Cell(27,6,'Jenis Kelamin',1,0);
        $pdf->Cell(26,6,'Tempat Lahir',1,0);
        $pdf->Cell(27,6,'Tanggal Lahir',1,0);
        $pdf->Cell(26,6,'Pendidikan',1,0);
        $pdf->Cell(35,6,'Jurusan',1,0);
         $pdf->Cell(29,6,'Jabatan',1,1);
        $pdf->SetFont('Arial','',10);
        $siswa = $this->db->get('guru')->result();
        foreach ($siswa as $row){
            $pdf->Cell(10,6,$no++,1,0,'C');
            $pdf->Cell(40,6,$row->nip,1,0);
            $pdf->Cell(40,6,$row->nama_lengkap,1,0);
            $pdf->Cell(27,6,$row->jenis_kelamin,1,0,'C');
            $pdf->Cell(26,6,$row->tempat_lahir,1,0); 
            $pdf->Cell(27,6,$row->tgl_lahir,1,0);
            $pdf->Cell(26,6,$row->pendidikan,1,0,'C');
            $pdf->Cell(35,6,$row->jurusan,1,0);
            $pdf->Cell(29,6,$row->jabatan,1,1);
        }
        $pdf->Output();
    }

     function data_kelas(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $no=1;
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH PERTAMA NEGERI 36 MUARO JAMBI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(190,7,'DAFTAR KELAS',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
      
       
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(40,6,'Kode Kelas',1,0);
        $pdf->Cell(40,6,'Kelas',1,1);
        $pdf->SetFont('Arial','',10);
        $siswa = $this->db->get('kelas')->result();
        foreach ($siswa as $row){
          
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(40,6,$row->kode_kelas,1,0);
            $pdf->Cell(40,6,$row->kelas,1,1);
        }
        $pdf->Output();
    }

function data_mapel(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $no=1;
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH PERTAMA NEGERI 36 MUARO JAMBI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(190,7,'DAFTAR MATA PELAJARAN',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
      
       
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(60,6,'Kode MATA PELAJARAN',1,0);
        $pdf->Cell(60,6,'NAMA MATA PELAJARAN',1,1);
        $pdf->SetFont('Arial','',10);
        $siswa = $this->db->get('mata_pelajaran')->result();
        foreach ($siswa as $row){
          
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(60,6,$row->kode_mapel,1,0);
            $pdf->Cell(60,6,$row->nama_mapel,1,1);
        }
        $pdf->Output();
    }

    function data_jadwal(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $no=1;
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH PERTAMA NEGERI 36 MUARO JAMBI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(190,7,'JADWAL PELAJARAN',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
      
       
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(30,6,'KELAS',1,0);
        $pdf->Cell(30,6,'HARI',1,0);
        $pdf->Cell(30,6,'JAM',1,0);
        $pdf->Cell(40,6,'MATA PELAJARAN',1,0);
        $pdf->Cell(50,6,'NAMA GURU',1,1);
        $pdf->SetFont('Arial','',10);
        $siswa = $this->db->get('jadwal_pelajaran')->result();
        foreach ($siswa as $row){
          
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$row->kelas,1,0);
            $pdf->Cell(30,6,$row->hari,1,0);
            $pdf->Cell(30,6,$row->jam,1,0);
            $pdf->Cell(40,6,$row->nama_pelajaran,1,0);
            $pdf->Cell(50,6,$row->nama_guru,1,1);
        }
        $pdf->Output();
    }*/
}

