<?php

class StarWarsApi
{
    //URL para comunicação com API, com base na Starships
    public $url = 'https://swapi.co/api/starships/';
    
    public function getStarship()
    {
        //Comunicação setada utilizando o CURL
        $curl = curl_init(); 
        curl_setopt ($curl,CURLOPT_SSL_VERIFYPEER , false ); 
        curl_setopt ($curl,CURLOPT_RETURNTRANSFER , true ); 
        curl_setopt ($curl,CURLOPT_URL , $this->url ); 
        curl_setopt ($curl,CURLINFO_HEADER_OUT , true ); 
        $result = curl_exec ($curl); 
        curl_close ($curl);
        return $result;
    }
    
    public function getsMglt($post)
    {
       
        //Transformei o retorno em Json em array        
        $response = json_decode($this->getStarship(), true);
        //A requisição informa o Count, assim consigo verificar todas
        for ($i=0; $i<=$response['count']; $i++)
        {
            //Caso retorne na consulta valores sem nave
            if(!empty($response['results'][$i]['name']))
            {
                $mglt = $response['results'][$i]['MGLT'];
               
                //Verifico a data (hoje + dias, semanas, meses que a nave pode viajar sem paradas)
                $data =  date('d-m-Y', strtotime($response['results'][$i]['consumables']));
                $data_inicio = date_create(date('d-m-Y'));
                $data_fim = date_create($data);
                
                //Retorna a diferença em dias de hoje até a data máxima
                $diff=date_diff($data_inicio,$data_fim);
                //Retorna a quantia de MGLT que a nave consegue rodar sem parar
                $consumables = $diff->format("%a")*24*$mglt;
                
                //Retorna o total de paradas necessárias
                $total = intval($post/$consumables);
                 echo '<tr>
                            <td>'.$response['results'][$i]['name'].'</td>
                            <td>'.$response['results'][$i]['model'].'</td>
                            <td>'.$response['results'][$i]['manufacturer'].'</td>
                            <td>'.$total.'</td>
                       </tr>';
               
            }
        }

    }
}
