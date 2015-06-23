<?php
class GenericUtils {
	//Singleton en PHP
	private static $instance = null;
	private function __construct(){}
	public static function getInstance(){
		if (!self::$instance instanceof self){
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Formatea un String de fecha de entrada para transformarlo en un formato valido de mysql.
	 * @param unknown $strDate Date String de entrada
	 * @return String formateado a SQL Date
	 */
	public function getFormatDateIn($strDate){
		$strDate = str_replace("/", "-", $strDate);
		$timeStamp = strtotime($strDate);
		$newDate = date("Y/m/d", $timeStamp);
		return $newDate;
	}
	/**
	 * Obtiene la diferencia de años entre la fecha de hoy y la ingresada.
	 * @param unknown $strFechaNac 
	 */
	public function getYears($strFechaNac){
		$strFechaNac = str_replace("/", "-", $strFechaNac);
		$fechaActual = new DateTime();
		$fechaNac = new DateTime($strFechaNac);
		$edad = $fechaActual->diff($fechaNac);
		return $edad->y;
	}
	/**
	 * Formatea un String de fecha de salida para transformarlo en un formato valido de la app.
	 * @param unknown $strDate Date String de entrada
	 * @return String formateado a el formato de la app
	 */
	public function getFormatDateOut($strDate){
		$timeStamp = strtotime($strDate);
		$newDate = date("d/m/Y", $timeStamp);
		return $newDate;
	}
	/**
	 * 
	 * @param unknown $strDate String de fecha de entrada a validar.
	 * @return boolean retorna true si el string de fecha cumple con el patron de fecha, retorna false en caso contrario.
	 */
	public function isFechaValida($strDate){
		$strDate = str_replace("/", "-", $strDate);
		$timeStamp = strtotime($strDate);
		if($timeStamp == false){
			return false;
		}
		return true;
	} 
}