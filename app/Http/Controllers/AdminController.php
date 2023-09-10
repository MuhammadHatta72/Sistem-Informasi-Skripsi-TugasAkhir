<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dosen;
use PDF;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class AdminController extends Controller
{
    public function surat_tugas()
    {
        $dosens = Dosen::has('user')
                ->get();
        $data = ['dosens' => $dosens];
        return view('admin.surat_tugas_dosen', $data);
    }
    public function print_surat_tugas($id, Request $request)
    {
        $rules = [
            'pilihan_cetak' => 'required',
        ];
        $customMessages = [
            'required' => 'Pilihan sebagai harus diisi.',
        ];
        $this->validate($request, $rules, $customMessages);

        $dosen = Dosen::find($id);
        $data = [
            'dosen' => $dosen,
        ];
        //   $pdf = PDF::loadView('pdf.surat_tugas', $data);
        //   // download PDF file with download method
        //   return $pdf->download('Surat Tugas ?.pdf');

        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('assets/docs/template_surat_tugas.docx'));

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('Surat Tugas Dosen '.$dosen->nama.'.pdf')); 
        return response()->download(public_path('Surat Tugas Dosen '.$dosen->nama.'.pdf'))->deleteFileAfterSend(true);
    }
}
