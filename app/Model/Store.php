<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Store extends AppModel {

   //  public $useDbConfig = 'infor';
      public $useTable = false;

    //ricerca pezzo in eam vista CUST_BC_ARTICOLI
   public function cerca($dati=null){

		$myquery = "SELECT ARTICOLO, DESCRIZIONE, MAGAZZINO, SCOMPARTO, QTA FROM CUST_BC_ARTICOLI where MAGAZZINO = '".$dati['magazzino']."' and (ARTICOLO = '".$dati['codice']."' or BARCODE = '".$dati['codice']."') ";
   $risu = $this->dbeamselect($myquery);

if(empty($risu)){
	$codice_pulito = str_replace('.', '', $dati['codice']);
	$codice_pulito = str_replace('-', '', $codice_pulito);
	$myquery = "SELECT ARTICOLO, DESCRIZIONE, MAGAZZINO, SCOMPARTO, QTA FROM CUST_BC_ARTICOLI where MAGAZZINO = '".$dati['magazzino']."' and (ARTICOLO = '".$codice_pulito."' or BARCODE = '".$dati['codice']."') ";
   $risu = $this->dbeamselect($myquery);
	}
	// print_r($risu); //debug
   return $risu;
	     }

	public function cercatutti($dati=null){

		$myquery = "SELECT ARTICOLO, DESCRIZIONE, MAGAZZINO, SCOMPARTO, QTA FROM CUST_BC_ARTICOLI where ARTICOLO = '".$dati['codice']."' or BARCODE = '".$dati['codice']."' ";
   $risu = $this->dbeamselect($myquery);

if(empty($risu)){
	$codice_pulito = str_replace('.', '', $dati['codice']);
	$codice_pulito = str_replace('-', '', $codice_pulito);
	/// echo $codice_pulito; //debug
	$myquery = "SELECT ARTICOLO, DESCRIZIONE, MAGAZZINO, SCOMPARTO, QTA FROM CUST_BC_ARTICOLI where ARTICOLO = '".$codice_pulito."' or BARCODE = '".$dati['codice']."' ";
   $risu = $this->dbeamselect($myquery);
	}
	// print_r($risu); //debug
   return $risu;
	     }




   //--carico i dettagli di un ordine ($order_num)
   public function dettagli_ordine_aftersales($order_num=null){
                     $myquery = "";
                     $myquery .= " select ";
                     $myquery .= " AFS_PREVENTIVI.ID, DESCRIZIONE, TIPO_SPEDIZIONE,  ";
                     $myquery .= " COD_ARTICOLO as codice, ";
                     $myquery .= " QTY as qta, ";
                     $myquery .= " DATA_CONSEGNA, ";
                     $myquery .= " PAR_DESC as descrizione, ";
                     $myquery .= " BIS_BIN as ubicazione ";
                     $myquery .= " from AFS_PREVENTIVI left join AFS_PREVENTIVI_RELATIONSHIP on  AFS_PREVENTIVI.ID = AFS_PREVENTIVI_RELATIONSHIP.PREVENTIVO_ID ";
                     $myquery .= " JOIN R5PARTS ON COD_ARTICOLO COLLATE LATIN1_GENERAL_BIN = PAR_CODE ";
                     $myquery .= " LEFT JOIN R5BINSTOCK ON PAR_CODE = BIS_PART ";
                     $myquery .= " where AFS_PREVENTIVI.ID = '".$order_num."' ";

                     /*
                     $myquery = "";
                     $myquery .= " select AFS_PREVENTIVI.ID, DESCRIZIONE, TIPO_SPEDIZIONE, COD_ARTICOLO, QTY, DATA_CONSEGNA ";
                     $myquery .= " from AFS_PREVENTIVI ";
                     $myquery .= " left join AFS_PREVENTIVI_RELATIONSHIP on  AFS_PREVENTIVI.ID = AFS_PREVENTIVI_RELATIONSHIP.PREVENTIVO_ID ";
                     $myquery .= " where AFS_PREVENTIVI.ID = '".$order_num."' ";
                     */

                     $output = $this->dbeamselect($myquery);
                     return $output;
                     }//dettagli_ordine_aftersales





	//scrivi movimento in eam passo array di dati
   public function scrivimovimento($dati=null){
	     $pz_queryone = "INSERT INTO CUST_BC_MOV (CBM_CAUSALE, CBM_DATA, CBM_ARTICOLO, CBM_QTY, CBM_MAGAZZINO1, CBM_SCOMPARTO1, CBM_MAGAZZINO2, CBM_SCOMPARTO2, CBM_BARCODE, CBM_ORDINE, CBM_UTENTE, CBM_ELABORATO) VALUES ";
		 if(!empty($dati)){
			 $err=0;
			  foreach($dati as $art){
				  $pz_art= "INSERT INTO CUST_BC_MOV (CBM_CAUSALE, CBM_DATA, CBM_ARTICOLO, CBM_QTY, CBM_MAGAZZINO1, CBM_SCOMPARTO1, CBM_MAGAZZINO2, CBM_SCOMPARTO2, CBM_BARCODE, CBM_ORDINE, CBM_UTENTE, CBM_ELABORATO) VALUES ('".$art['CBM_CAUSALE']."', GETDATE(), '".$art['CBM_ARTICOLO']."', ".$art['CBM_QTY'].", '".$art['CBM_MAGAZZINO1']."', '".$art['CBM_SCOMPARTO1']."', '".$art['CBM_MAGAZZINO2']."', '".$art['CBM_SCOMPARTO2']."','".$art['CBM_BARCODE']."', '".$art['CBM_ORDINE']."', '".$art['CBM_UTENTE']."','".$art['CBM_ELABORATO']."' )";
				  $result_articoli =   $this->dbeaminsert($pz_art);
				 if ($result_articoli){

                  }
                  else{
                     $err++;
                   }
				  //  echo $pz_art; exit; //debug
				  }//fine foreach
				 // $pz_querytwo = implode($pz_art);
                 // $pz_querytwo = substr($pz_querytwo, 0, strlen($pz_querytwo)-1);
				 // $querytot =  $pz_queryone.$pz_querytwo;
				 //  echo $querytot; exit; //debug
				 if($err==0){
					 return true;
					 }
					else{
					 return false;
						}
			 }//fine if dati
	   }


	//ricerca magazzini in eam
   public function magazzini($dati=null){

		$myquery = "SELECT * FROM CUST_STORES_AFS";
   $risu = $this->dbeamselect($myquery);
   $lista = array();
   foreach($risu as $lst){
	  $lista[$lst['CODICE']]=$lst['DESCRIZIONE'];
	   }
	   $risultati = array('liste'=>$lista, 'tutti'=>$risu);
   return $risultati;
	     }

	//ricerca scomparti in eam
   public function scomparti($dati=null){
		$myquery = "SELECT MAGAZZINO, UBICAZIONE, DESCRIZIONE FROM CUST_SCOMPARTI where MAGAZZINO = '".$dati['magazzino']."' ";
   $risu = $this->dbeamselect($myquery);
   $lista = array();
   foreach($risu as $lst){
	  $lista[$lst['UBICAZIONE']]=$lst['DESCRIZIONE'];
	   }
	   $risultati = array('liste'=>$lista, 'tutti'=>$risu);
   return $risultati;
	     }


	//---------------------------------CONNESSIONE DB EAM KATA --------------------------------------

	function dbeamconnect(){
		$server = '54.75.229.253';
       //$nome_db = 'EAMTEST';
       $nome_db = 'EAM';
       $usr = 'EAMREAD';
       $pwd = 'EAMREAD';

      $cnn = array('server'=>$server,'db'=>$nome_db,'user'=>$usr, 'pass'=>$pwd);
		  return $cnn;
		}
                     //funzione di selezione da dbeam  passo query SQL
function dbeamselect($myquery){
       $conn = $this->dbeamconnect();
			   // Connect to MSSQL
		$link = mssql_connect($conn['server'], $conn['user'], $conn['pass']);
		if (!$link) {
				die('Something went wrong while connecting to MSSQL');
			}
			 $conn_act =  mssql_select_db($conn['db'],$link);
			   $result = mssql_query($myquery) or die("Errori nella query:".$myquery);
			   $array_ris = array();
					  $i=0;
								//$row = mssql_fetch_row($result);
								   // echo '<tr>';
											  while ($row = mssql_fetch_array($result, MSSQL_ASSOC))
													{
														   $array_ris[$i] = $row;
														   $i++;
													}
			   return $array_ris;

}

//funzione di scrittura su dbeam  passo query SQL
function dbeaminsert($myquery){
        $conn = $this->dbeamconnect();
			   // Connect to MSSQL
		$link = mssql_connect($conn['server'], $conn['user'], $conn['pass']);
		if (!$link) {
				die('Something went wrong while connecting to MSSQL');
			}
			 $conn_act =  mssql_select_db($conn['db'],$link);
       $result    = mssql_query($myquery) or die("Errori nella query:".$myquery.' '.mssql_get_last_message());

       return $result;
}//dbeaminsert



}
