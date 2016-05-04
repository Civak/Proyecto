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
            
        $this->conectar(0);
        $sql = "SELECT pro.codbar as cod, apa.seccion as sec, sub.subcategoria as sub, pro.existencia as exi, pro.precio as pre FROM productos AS pro INNER JOIN apartado AS apa ON pro.idapartado = apa.id INNER JOIN subcategorias as sub ON pro.idsubcategoria = sub.id";
        $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $file = fopen("visitas.txt", "w+");
                while($row = $result->fetch_assoc())
                {
                    fwrite($file, $row['cod'].";".$row['sec'].";".$row['sub'].";".$row['exi'].";".$row['pre'].PHP_EOL);
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
    $w = array(60, 35, 35, 25, 25);
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
        $this->Cell($w[1],6,iconv("UTF-8","windows-1252", $row[1]),'LR',0,'C',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
		$this->Cell($w[4],6,'$'.$row[4].'.00','LR',0,'C',$fill);
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
$header = array('Codigo', 'Seccion', 'Apartado','Cantidad','Precio');
// Carga de datos
$data = $pdf->LoadData('visitas.txt');
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->Cell(0,10,'Reporte de Inventario Actual.',0,1);
$pdf->Cell(0,10,date('l jS \of F Y h:i:s A'),0,1);
$pdf->FancyTable($header,$data);
$pdf->Output();
?>