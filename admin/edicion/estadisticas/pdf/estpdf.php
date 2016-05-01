<?php

 class Archivo
    {//----------------- inicia clase Tienda
        
        private $conn;
        
        public function conectar($dirarchivo)
        {
        if($dirarchivo == 0) include('../../php/datos.php');
        else include('../php/datos.php');
        
           $this -> conn = new mysqli($host, $user, $pw, $db);
           $this->conn->set_charset('utf8');
        if (mysqli_connect_error()) {
            die("Error en conexión, intenta de nuevo.");
        }
        
        }
        
    
    function datos()
        {
            $fechas = $_COOKIE['fechas'];
            $fechasc =  $feciniarray = explode(";", $fechas);
            
            $fecini = $fechasc[0];
            $feciniarray = explode("/", $fecini);
            $fecini = $feciniarray[2]."-".$feciniarray[1]."-".$feciniarray[0];
            
            $fecfin = $fechasc[1];
            $fecfinarray = explode("/", $fecfin);
            $fecfin = $fecfinarray[2]."-".$fecfinarray[1]."-".$fecfinarray[0];
            

        $this->conectar(0);
        $sql = "SELECT seccion, COUNT(*) as contador FROM Visitas INNER JOIN Apartado ON Visitas.idseccion = Apartado.id WHERE  fecha BETWEEN '".$fecini." 00:00:01' AND '".$fecfin." 23:59:59'GROUP BY idseccion";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $file = fopen("visitas.txt", "w+");
                while($row = $result->fetch_assoc())
                {
                    fwrite($file, $row['seccion'].";".$row['contador'].PHP_EOL);
                }
                fclose($file);
            }
            
            $this->conn->close();
            unset($this->conn);
        }
    }

$arch = new Archivo();
$arch->datos();

require('fpdf.php');

class PDF extends FPDF
{
// Cargar los datos
function LoadData($file)
{
    // Leer las líneas del fichero
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

function Header()
{
    // Logo
    //$this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(60,10,'Casa Varcheli',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Tabla coloreada
function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(60, 35);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;

    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
        $this->Ln();
        $fill = !$fill;

    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
}

date_default_timezone_set('UTC');
setlocale(LC_ALL,"es_ES");


$pdf = new PDF();
// Títulos de las columnas
$header = array('Apartados', 'Visitas');
// Carga de datos
$data = $pdf->LoadData('visitas.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Cell(0,10,'Reporte de visitas en los diferentes apartados.'.$i,0,1);
$pdf->Cell(0,10,date('l jS \of F Y h:i:s A').$i,0,1);
$pdf->FancyTable($header,$data);
$pdf->Output();
?>