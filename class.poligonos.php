<?php
/**
 * Poligono Class
 * this class output random polygons as SVG  
 * inputs: 
 * color paleta, maximum size of the polygon, number of vertices, iteration of polygons, scale
 * @author Jean Paul Delaye 
 */

class Poligono  {
	
  public $paleta="";
  public $maxsize="";
  public $vertices="";
  public $iteration="1";
  public $scale="2";
 
 public function __construct( $paleta, $maxsize, $vertices, $iteration, $scale ) {
    
	$this->paleta = $paleta;
        $this->maxsize = $maxsize;
	$this->vertices = $vertices;
	$this->iteration = $iteration;
	$this->scale = $scale;
	 
  }
   
 public function get_color() {	  
	 
        $colores["leslie"] = array(
           '#0f2649',
           '#1e2870',
       	   '#541c68',
       	   '#9e266b',
           '#ef5b66',
        );
        $colores["polaroid"] = array(
   	   '#fdb7ba',
           '#f9e2d9',
           '#9ec7bd',
           '#2082a6',
           '#175187',
        );
	$colores["rosita"] = array(
           '#ffb0b0',
           '#ffc3c3',
           '#ffd8d8',
           '#ffbfd0',
           '#ffacc2',
        );
	 
	return $colores[$this->paleta][rand(0, 4)];
	 
  }
	
 public function get_size() { 
    return  $this->maxsize;
 }
	
 public function get_rotation() { 
    return  $this->maxrotation;
 }
	
 public function get_vertices(){
    $xy="";
	for ($i = 1; $i <= $this->vertices; $i++) {
        $xy.=rand(0,  $this->maxsize).",".rand(0,  $this->maxsize)." ";
	}
	          return $xy;
	}
		
 public function get_poligono(){
     
	$out="";
	for ($ima = 1; $ima <= $this->iteration; $ima++) {	
  
	         $puntos = self::get_vertices();
		 $color = self::get_color();
		 $rotacion= rand(0, 360);	
		 $posicionX= rand(0, 1920);
		 $posicionY= rand(0, 550);		 
	 
	         $out.= '<polygon points="'.$puntos.'"  style="fill:'.$color.';"  transform="translate('.$posicionX.','.$posicionY.') scale('.$this->scale.')   " />' ;
		
	 }	 
		
	         return $out;
	      
	 }
	 	 
 function __destruct() { 	
	   
  	echo  '<div id="dibujo"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1080">'.self::get_poligono(). "</svg></div>"; 
	 
  }
  
 }

?>
