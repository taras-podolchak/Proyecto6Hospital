<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\EmpRepository;
use Symfony\Component\HttpFoundation\Request;



// ESPACIOS DE NOMBRES DE LA BIBLIOTECA DOMPDF

use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends AbstractController
{

    #[Route('/generatePDF', name: 'generatePDF')]
    public function generatePDF()
    {


        // Existen muchas configuraciones para Dompdf. Incluimos una de las muchas que tiene
        // por ejemplo asignar el tipo de letra
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Crea una instancia de Dompdf con nuestras opciones
        $dompdf = new Dompdf($pdfOptions);

        // Preparamos la página HTML para generar PDF
        $html = $this->renderView('pdf/figurasPDF.html.twig', [
            'autor' => "Benito Floro"
        ]);

        // Ahora se carga la página HTML en Dompdf
        $dompdf->loadHtml($html);

        // También podemos de forma opcional indicar el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el HTML como PDF
        $dompdf->render();

        // Envíe el PDF generado al navegador. ¡DESCARGA FORZADA!
        $dompdf->stream("pdf/figuras.pdf", [
            "Attachment" => false
        ]);
    }

    #[Route('/generatePDF_Empleado', name: 'generatePDF_Empleado')]
    public function generatePDF_Empleado(EmpRepository $repoEmp,Request $request)
    {
        // Existen muchas configuraciones para Dompdf. Incluimos una de las muchas que tiene
        // por ejemplo asignar el tipo de letra
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Crea una instancia de Dompdf con nuestras opciones
        $dompdf = new Dompdf($pdfOptions);

        // Preparamos la página HTML para generar PDF
        $html = $this->renderView('emp_/empleado.html.twig', [
            'empleado' => $repoEmp->getEmpFromEmpNo($request->query->get('id'))
        ]);

        // Ahora se carga la página HTML en Dompdf
        $dompdf->loadHtml($html);

        // También podemos de forma opcional indicar el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el HTML como PDF
        $dompdf->render();

        // Envíe el PDF generado al navegador. ¡DESCARGA FORZADA!
        $dompdf->stream("Empleado.pdf", [
            "Attachment" => false
        ]); 
    }
}
